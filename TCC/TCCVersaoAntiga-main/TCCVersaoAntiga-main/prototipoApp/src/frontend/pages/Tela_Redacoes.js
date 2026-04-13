import React, { useState, useCallback, useRef } from "react";
import {
  View,
  Text,
  StyleSheet,
  TouchableOpacity,
  ScrollView,
  ActivityIndicator,
  SafeAreaView,
  TextInput,
  Modal,
  Alert,
  Keyboard,
  FlatList,
} from "react-native";

import * as Animatable from "react-native-animatable";
import { MaterialIcons } from "@expo/vector-icons";
import { LinearGradient } from "expo-linear-gradient";
import { useFocusEffect, useNavigation } from "@react-navigation/native";

import TopNavbar from "../components/TopNavbar";
import MenuBar from "../components/MenuBar";
import RedacaoService from "../services/RedacaoService";
import UsuarioService from "../services/UsuarioService";
import FeedbackCard from "../components/FeedbackCard";

const CorrecaoView = ({ onCancel, onSaveSuccess, user }) => {
  const [textoRedacao, setTextoRedacao] = useState("");
  const [tema, setTema] = useState("");
  const [titulo, setTitulo] = useState("");
  const [loading, setLoading] = useState(false);
  const [resultado, setResultado] = useState(null);
  const [modalVisible, setModalVisible] = useState(false);
  const [competenciaSelecionada, setCompetenciaSelecionada] = useState(null);

  const enviar = async () => {
    if (!textoRedacao.trim()) return Alert.alert("Erro", "Escreva algo!");
    Keyboard.dismiss();
    setLoading(true);

    try {
      const response = await RedacaoService.corrigir(textoRedacao);
      const competencias = response.data.competencias;
      const nota_total = response.data.nota_total;
      const resumo = response.data.resumo;

      const resultado = {
        competencias,
        nota_total,
        resumo,
      };

      const payload = {
        aluno_id: user.id,
        tema: tema || null,
        titulo: titulo || "Minha Redação",
        texto: textoRedacao,
        competencias: resultado.competencias,
        resultado_ia: resultado.nota_total,
        feedback: resultado.resumo,
      };

      try {
        const novaRedacao = await RedacaoService.salvar(payload);
        setResultado(resultado);
        console.log(novaRedacao);
      } catch (error) {
        console.log(error);
      }
    } catch (error) {
      console.error(error);
      Alert.alert("Erro", "Falha ao corrigir/salvar.");

      if (error.response) {
        if (error.response.status == 400) {
          Alert.alert("Erro de Texto", error.response.data.detail);
        } else if (error.response.status == 500) {
          Alert.alert("Erro inesperado. tente novamente mais tarde!");
        } else {
          Alert.alert("Erro", "Falha ao corrigir/salvar.");
        }
      }
    } finally {
      setLoading(false);
    }
  };

  const fecharTela = () => {
    if (resultado) onSaveSuccess();
    else onCancel();
  };

  const getCorNota = (n) =>
    n >= 200 ? "#4CAF50" : n >= 120 ? "#FFC107" : "#F44336";

  return (
    <ScrollView contentContainerStyle={{ paddingBottom: 100 }}>
      <View style={styles.headerRow}>
        <TouchableOpacity onPress={fecharTela}>
          <MaterialIcons name="arrow-back" size={30} color="#333" />
        </TouchableOpacity>
        <Text style={styles.pageTitleInternal}>Nova Redação</Text>
        <View style={{ width: 30 }} />
      </View>

      {!resultado ? (
        <Animatable.View animation="fadeInUp" style={styles.mainCard}>
          <Text style={styles.label}>Título</Text>
          <TextInput
            style={styles.inputTema}
            value={titulo}
            onChangeText={setTitulo}
            placeholder="Ex: Vencerás pela educação"
          />

          <Text style={styles.label}>Tema</Text>
          <TextInput
            style={styles.inputTema}
            value={tema}
            onChangeText={setTema}
            placeholder="Ex: Desafios da educação no Brasil"
          />

          <Text style={styles.label}>Texto</Text>
          <View style={styles.textAreaContainer}>
            <TextInput
              style={styles.textArea}
              multiline
              value={textoRedacao}
              onChangeText={setTextoRedacao}
              placeholder="Escreva aqui..."
              textAlignVertical="top"
            />
          </View>

          {loading ? (
            <ActivityIndicator
              size="large"
              color="#0b4e91"
              style={{ marginTop: 20 }}
            />
          ) : (
            <TouchableOpacity onPress={enviar}>
              <LinearGradient
                colors={["#0b4e91", "#093a6b"]}
                style={styles.btnCorrigir}
              >
                <MaterialIcons name="auto-fix-high" size={24} color="#fff" />
                <Text style={styles.btnText}>Corrigir Agora</Text>
              </LinearGradient>
            </TouchableOpacity>
          )}
        </Animatable.View>
      ) : (
        <Animatable.View animation="fadeIn" style={styles.mainCard}>
          <View style={styles.scoreContainer}>
            <Text style={styles.scoreValue}>{resultado.nota_total}</Text>
            <Text style={styles.scoreLabel}>Nota Final</Text>
          </View>
          <View style={styles.summaryBox}>
            <Text style={styles.summaryTitle}>Feedback Geral</Text>
            <Text style={styles.summaryText}>{resultado.resumo}</Text>
          </View>

          {resultado.competencias.map((c) => (
            <TouchableOpacity
              key={c.id}
              style={styles.compCard}
              onPress={() => {
                setCompetenciaSelecionada(c);
                setModalVisible(true);
              }}
            >
              <View
                style={{
                  flexDirection: "row",
                  justifyContent: "space-between",
                }}
              >
                <Text style={styles.compTitle}>Competência {c.id}</Text>
                <Text style={{ color: getCorNota(c.nota), fontWeight: "bold" }}>
                  {c.nota}
                </Text>
              </View>
              <Text style={styles.compName}>{c.nome}</Text>
            </TouchableOpacity>
          ))}

          <TouchableOpacity
            onPress={fecharTela}
            style={[
              styles.btnCorrigir,
              { marginTop: 20, backgroundColor: "#4CAF50" },
            ]}
          >
            <Text style={styles.btnText}>Voltar para Redações</Text>
          </TouchableOpacity>
        </Animatable.View>
      )}

      <Modal
        visible={modalVisible}
        transparent
        animationType="slide"
        onRequestClose={() => setModalVisible(false)}
      >
        <View style={styles.modalOverlay}>
          <View style={styles.modalContent}>
            <Text style={styles.modalTitle}>
              {competenciaSelecionada?.nome}
            </Text>
            <Text style={{ marginTop: 10, lineHeight: 22 }}>
              {competenciaSelecionada?.feedback}
            </Text>
            <TouchableOpacity
              onPress={() => setModalVisible(false)}
              style={styles.modalBtnClose}
            >
              <Text style={{ color: "#fff", fontWeight: "bold" }}>Fechar</Text>
            </TouchableOpacity>
          </View>
        </View>
      </Modal>
    </ScrollView>
  );
};

export default function Tela_Redacoes() {
  const navigation = useNavigation();
  const [historico, setHistorico] = useState([]);
  const [loading, setLoading] = useState(true);
  const [viewMode, setViewMode] = useState("list");
  const [user, setUser] = useState(null);
  const [redacaoSelecionada, setRedacaoSelecionada] = useState(null);

  const carregarDados = async () => {
    setLoading(true);
    try {
      const id = await UsuarioService.getUsuarioId();
      if (id) {
        setUser({ id });
        const res = await RedacaoService.listarPorAluno(id);
        console.log(res);
        setHistorico(res.data);

        if (res.data.length === 0) {
          setViewMode("create");
        } else {
          setViewMode("list");
        }
      }
    } catch (error) {
      console.log(error);
    } finally {
      setLoading(false);
    }
  };

  useFocusEffect(
    useCallback(() => {
      carregarDados();
    }, [])
  );

  if (loading) {
    return (
      <View style={styles.loadingContainer}>
        <ActivityIndicator size="large" color="#0b4e91" />
      </View>
    );
  }
  const mapRedacaoToResultado = (redacao) => {
    if (!redacao) return null;
    return {
      competencias: [
        {
          id: 1,
          nome: "Competência 1",
          nota: redacao.c1,
          feedback: redacao.feedback,
        },
        {
          id: 2,
          nome: "Competência 2",
          nota: redacao.c2,
          feedback: redacao.feedback,
        },
        {
          id: 3,
          nome: "Competência 3",
          nota: redacao.c3,
          feedback: redacao.feedback,
        },
        {
          id: 4,
          nome: "Competência 4",
          nota: redacao.c4,
          feedback: redacao.feedback,
        },
        {
          id: 5,
          nome: "Competência 5",
          nota: redacao.c5,
          feedback: redacao.feedback,
        },
      ],
      nota_total: redacao.nota_ia,
      resumo: redacao.feedback,
    };
  };

  return (
    <SafeAreaView style={styles.safeArea}>
      <Animatable.View animation="fadeInDown" style={styles.headerAnim}>
        <SafeAreaView style={{ flex: 1, backgroundColor: "#0b4e91" }}>
          <TopNavbar />
        </SafeAreaView>
      </Animatable.View>

      {viewMode === "create" ? (
        <CorrecaoView
          user={user}
          onCancel={() => {
            if (historico.length > 0) setViewMode("list");
            else navigation.navigate("Principal");
          }}
          onSaveSuccess={() => {
            carregarDados();
          }}
        />
      ) : (
        <View style={{ flex: 1 }}>
          <TopNavbar />
          <View style={styles.listHeader}>
            <Text style={styles.pageTitle}>Minhas Redações</Text>
            <TouchableOpacity
              onPress={() => setViewMode("create")}
              style={styles.btnNewSmall}
            >
              <MaterialIcons name="add" size={20} color="#fff" />
              <Text
                style={{ color: "#fff", fontWeight: "bold", marginLeft: 4 }}
              >
                Nova
              </Text>
            </TouchableOpacity>
          </View>

          <FlatList
            data={historico}
            keyExtractor={(item) => item.id.toString()}
            contentContainerStyle={{ padding: 15, paddingBottom: 100 }}
            renderItem={({ item }) => (
              <Animatable.View
                animation="fadeInUp"
                duration={600}
                style={styles.cardHistory}
              >
                <View style={styles.cardHeader}>
                  <Text style={styles.cardDate}>
                    {new Date(item.data).toLocaleDateString()}
                  </Text>
                  <View
                    style={[
                      styles.scoreBadge,
                      {
                        backgroundColor:
                          item.nota_ia >= 800 ? "#E6F8EF" : "#FFF3CD",
                      },
                    ]}
                  >
                    <Text
                      style={[
                        styles.scoreText,
                        { color: item.nota_ia >= 800 ? "#00B37E" : "#D97706" },
                      ]}
                    >
                      {item.nota_ia || 0} pts
                    </Text>
                  </View>
                </View>
                <Text style={styles.cardTitle} numberOfLines={1}>
                  {item.titulo || "Sem título"}
                </Text>
                <Text style={styles.cardTheme} numberOfLines={1}>
                  {item.tema}
                </Text>

                <View style={styles.cardFooter}>
                  <Text style={{ fontSize: 12, color: "#888" }}>
                    Corrigida por IA
                  </Text>
                  <TouchableOpacity
                    style={{ flexDirection: "row", alignItems: "center" }}
                    onPress={() => setRedacaoSelecionada(item)}
                  >
                    <Text
                      style={{
                        color: "#0b4e91",
                        fontWeight: "bold",
                        marginRight: 5,
                      }}
                    >
                      Ver detalhes
                    </Text>
                    <MaterialIcons
                      name="arrow-forward"
                      size={16}
                      color="#0b4e91"
                    />
                  </TouchableOpacity>
                </View>
              </Animatable.View>
            )}
          />

          {redacaoSelecionada && (
            <Modal
              visible={!!redacaoSelecionada}
              transparent
              animationType="fade"
              onRequestClose={() => setRedacaoSelecionada(null)}
            >
              <View style={styles.modalOverlay}>
                <View style={styles.modalContent}>
                  <FeedbackCard
                    resultado={mapRedacaoToResultado(redacaoSelecionada)}
                    onClose={() => setRedacaoSelecionada(null)}
                  />
                </View>
              </View>
            </Modal>
          )}
        </View>
      )}

      <View style={styles.menuBarContainer}>
        <MenuBar />
      </View>
    </SafeAreaView>
  );
}

const styles = StyleSheet.create({
  safeArea: { flex: 1, backgroundColor: "#0b4e91ff" },
  headerAnim: { backgroundColor: "#fff", elevation: 4, marginBottom: 0 },
  loadingContainer: {
    flex: 1,
    justifyContent: "center",
    alignItems: "center",
    backgroundColor: "#0b4e91",
  },
  menuBarContainer: {
    position: "absolute",
    bottom: 0,
    left: 0,
    right: 0,
    height: 70,
  },

  listHeader: {
    flexDirection: "row",
    justifyContent: "space-between",
    alignItems: "center",
    padding: 20,
    backgroundColor: "#fff",
    borderRadius: 20,
    margin: 15,
  },
  pageTitle: { fontSize: 22, fontWeight: "bold", color: "#0b4e91" },
  btnNewSmall: {
    flexDirection: "row",
    backgroundColor: "#0b4e91",
    paddingHorizontal: 12,
    paddingVertical: 8,
    borderRadius: 20,
    alignItems: "center",
  },

  cardHistory: {
    backgroundColor: "#fff",
    borderRadius: 12,
    padding: 16,
    marginBottom: 12,
    borderWidth: 1,
    borderColor: "#eee",
    elevation: 2,
  },
  cardHeader: {
    flexDirection: "row",
    justifyContent: "space-between",
    marginBottom: 8,
  },
  cardDate: { color: "#888", fontSize: 12 },
  scoreBadge: { paddingHorizontal: 8, paddingVertical: 4, borderRadius: 8 },
  scoreText: { fontWeight: "bold", fontSize: 12 },
  cardTitle: {
    fontSize: 16,
    fontWeight: "bold",
    color: "#333",
    marginBottom: 4,
  },
  cardTheme: { fontSize: 14, color: "#666", marginBottom: 12 },
  cardFooter: {
    flexDirection: "row",
    justifyContent: "space-between",
    alignItems: "center",
    borderTopWidth: 1,
    borderTopColor: "#f0f0f0",
    paddingTop: 10,
  },

  headerRow: { flexDirection: "row", alignItems: "center", padding: 20 },
  pageTitleInternal: {
    fontSize: 20,
    fontWeight: "bold",
    color: "#333",
    marginLeft: 10,
  },
  mainCard: {
    backgroundColor: "#fff",
    margin: 15,
    borderRadius: 20,
    padding: 20,
    elevation: 3,
  },
  label: {
    fontSize: 16,
    fontWeight: "bold",
    color: "#0b4e91",
    marginBottom: 8,
    marginTop: 10,
  },
  inputTema: {
    backgroundColor: "#f9f9f9",
    borderRadius: 12,
    padding: 12,
    borderWidth: 1,
    borderColor: "#ddd",
  },
  textAreaContainer: {
    backgroundColor: "#f9f9f9",
    borderRadius: 15,
    borderWidth: 1,
    borderColor: "#ddd",
    padding: 5,
    height: 250,
    marginTop: 5,
  },
  textArea: { flex: 1, padding: 10, fontSize: 16, color: "#333" },
  btnCorrigir: {
    marginTop: 25,
    paddingVertical: 15,
    borderRadius: 15,
    alignItems: "center",
    elevation: 4,
    backgroundColor: "#0b4e91",
  },
  btnText: { color: "#fff", fontSize: 18, fontWeight: "bold" },

  scoreContainer: {
    alignItems: "center",
    padding: 20,
    borderBottomWidth: 1,
    borderColor: "#eee",
  },
  scoreValue: { fontSize: 48, fontWeight: "bold", color: "#0b4e91" },
  scoreLabel: { fontSize: 14, color: "#777" },
  summaryBox: {
    backgroundColor: "#e3f2fd",
    padding: 15,
    borderRadius: 12,
    marginVertical: 20,
  },
  summaryTitle: { fontWeight: "bold", color: "#0b4e91", marginBottom: 5 },
  summaryText: { color: "#333", lineHeight: 20 },
  compCard: {
    backgroundColor: "#fff",
    borderRadius: 12,
    padding: 12,
    marginBottom: 10,
    borderWidth: 1,
    borderColor: "#eee",
  },
  compTitle: { fontWeight: "600", color: "#555" },
  compName: { fontSize: 16, fontWeight: "bold", color: "#333", marginTop: 4 },

  modalOverlay: {
    flex: 1,
    backgroundColor: "rgba(0,0,0,0.5)",
    justifyContent: "center",
    alignItems: "center",
  },
  modalContent: {
    width: "85%",
    backgroundColor: "#fff",
    borderRadius: 20,
    padding: 20,
    elevation: 10,
  },
  modalTitle: { fontSize: 18, fontWeight: "bold", color: "#0b4e91" },
  modalBtnClose: {
    backgroundColor: "#0b4e91",
    padding: 12,
    borderRadius: 10,
    alignItems: "center",
    marginTop: 20,
  },
});
import React, { useEffect, useState } from "react";
import {
  View,
  Text,
  TouchableOpacity,
  StyleSheet,
  ScrollView,
  SafeAreaView,
  Image,
  LayoutAnimation,
  UIManager,
  Platform,
} from "react-native";
import * as Animatable from "react-native-animatable";
import { MaterialIcons } from "@expo/vector-icons";
import TopNavbar from "../components/TopNavbar";
import MenuBar from "../components/MenuBar";
import ProfessorService from "../services/ProfessorService";

if (
  Platform.OS === "android" &&
  UIManager.setLayoutAnimationEnabledExperimental
) {
  UIManager.setLayoutAnimationEnabledExperimental(true);
}

export default function Tela_RedacoesPendentes({ navigation }) {
  const [redacoes, setRedacoes] = useState([]);
  const [expanded, setExpanded] = useState(null);

  useEffect(() => {
    carregarRedacoes();
  }, []);

  const carregarRedacoes = async () => {
    try {
      const response = await ProfessorService.listarRedacoesPendentes();
      setRedacoes(response.data);
    } catch (err) {
      console.log("Erro ao buscar redações pendentes:", err);
    }
  };

  const toggleExpand = (id) => {
    LayoutAnimation.configureNext(LayoutAnimation.Presets.easeInEaseOut);
    setExpanded(expanded === id ? null : id);
  };

  return (
    <SafeAreaView style={styles.safeArea}>
      {/* TopNavbar */}
      <Animatable.View animation="fadeInDown" delay={100} style={styles.header}>
        <TopNavbar />
      </Animatable.View>

      {/* CONTAINER CENTRAL */}
      <Animatable.View
        animation="fadeInUp"
        delay={150}
        style={styles.whiteContainer}
      >
        {/* Voltar + título */}
        <View style={styles.topRow}>
          <TouchableOpacity onPress={() => navigation.goBack()}>
            <MaterialIcons name="arrow-back" size={30} color="black" />
          </TouchableOpacity>
          <Text style={styles.title}>Redações dos Alunos</Text>
        </View>

        <ScrollView
          showsVerticalScrollIndicator={false}
          style={{ marginTop: 10 }}
        >
          {redacoes.map((item, index) => (
            <Animatable.View
              key={index}
              animation="fadeInUp"
              delay={index * 80}
            >
              {/* CARD FECHADO */}
              <TouchableOpacity
                style={styles.card}
                onPress={() => toggleExpand(item.id)}
              >
                <Text style={styles.cardTitulo}>{item.titulo}</Text>
                <Text style={styles.cardAluno}>{item.nomeAluno}</Text>
              </TouchableOpacity>

              {/* CARD ABERTO */}
              {expanded === item.id && (
                <View style={styles.cardExpanded}>
                  {/* Dados iniciais */}
                  <Text style={styles.info}>Tema: {item.tema}</Text>
                  <Text style={styles.info}>Nota: -</Text>
                  <Text style={styles.info}>Tempo: {item.tempo}</Text>
                  <Text style={styles.info}>Data: {item.data}</Text>

                  <View style={styles.line} />

                  {/* Competências */}
                  <View style={styles.competencias}>
                    <View>
                      <Text>Comp. 1 (?):</Text>
                      <Text>Comp. 2 (?):</Text>
                      <Text>Comp. 3 (?):</Text>
                    </View>
                    <View>
                      <Text>Comp. 4 (?):</Text>
                      <Text>Comp. 5 (?):</Text>
                    </View>
                  </View>

                  <View style={styles.line} />

                  {/* TEXTO */}
                  <Text style={styles.textoRedacao}>{item.texto}</Text>

                  {/* Botão corrigir */}
                  <TouchableOpacity
                    style={styles.btnCorrigir}
                    onPress={() =>
                      navigation.navigate("CorrigirRedacao", { redacao: item })
                    }
                  >
                    <Text style={styles.btnCorrigirText}>Corrigir</Text>
                  </TouchableOpacity>
                </View>
              )}
            </Animatable.View>
          ))}

          <View style={{ height: 120 }} />
        </ScrollView>
      </Animatable.View>

      {/* MenuBar */}
      <View style={styles.menuContainer}>
        <MenuBar />
      </View>
    </SafeAreaView>
  );
}

const styles = StyleSheet.create({
  safeArea: {
    flex: 1,
    backgroundColor: "#0b4e91",
  },
  header: {
    backgroundColor: "#fff",
    elevation: 5,
  },
  whiteContainer: {
    flex: 1,
    margin: 20,
    backgroundColor: "#ececec",
    borderRadius: 20,
    padding: 15,
  },
  topRow: {
    flexDirection: "row",
    alignItems: "center",
  },
  iconVoltar: {
    width: 30,
    height: 30,
    marginRight: 10,
  },
  title: {
    fontSize: 22,
    fontWeight: "700",
    color: "#0b4e91",
    marginLeft: 10,
  },
  card: {
    backgroundColor: "#fff",
    padding: 14,
    borderRadius: 14,
    elevation: 3,
    marginVertical: 10,
  },
  cardTitulo: {
    fontSize: 20,
    fontWeight: "700",
    color: "#0b4e91",
  },
  cardAluno: {
    fontSize: 15,
    color: "#555",
  },
  cardExpanded: {
    backgroundColor: "#fff",
    borderRadius: 14,
    padding: 14,
    marginBottom: 15,
    elevation: 2,
  },
  info: {
    fontSize: 14,
    marginBottom: 2,
  },
  line: {
    height: 1,
    width: "100%",
    backgroundColor: "#ccc",
    marginVertical: 10,
  },
  competencias: {
    flexDirection: "row",
    justifyContent: "space-between",
  },
  textoRedacao: {
    marginTop: 10,
    fontSize: 15,
    color: "#333",
  },
  btnCorrigir: {
    backgroundColor: "#0b4e91",
    marginTop: 12,
    paddingVertical: 10,
    borderRadius: 10,
  },
  btnCorrigirText: {
    color: "#fff",
    fontWeight: "700",
    textAlign: "center",
    fontSize: 16,
  },
  menuContainer: {
    position: "absolute",
    bottom: 0,
    left: 0,
    right: 0,
  },
});
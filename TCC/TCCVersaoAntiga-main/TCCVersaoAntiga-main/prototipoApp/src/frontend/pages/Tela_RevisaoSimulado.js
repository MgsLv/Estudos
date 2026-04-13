import React, { useState } from "react";
import { View, Text, TouchableOpacity, ScrollView, StyleSheet, SafeAreaView, Dimensions } from "react-native";
import { MaterialIcons } from "@expo/vector-icons";
import TopNavbar from "../components/TopNavbar";
import MenuBar from "../components/MenuBar";

const { height } = Dimensions.get("window");

export default function RevisaoSimulado({ navigation, route }) {
    const { respostasUsuario, questoes } = route.params;

    const [index, setIndex] = useState(0);

    const questaoAtual = questoes[index];

    const voltar = () => {
        if (index > 0) setIndex(index - 1);
    };

    const avancar = () => {
        if (index < questoes.length - 1) setIndex(index + 1);
    };

    return (
        <SafeAreaView style={styles.background}>

            <View style={styles.header}>
                <TopNavbar />
            </View>

            <ScrollView contentContainerStyle={styles.scrollContent}>
                <View style={styles.whiteContainer}>

                    <View style={styles.row}>
                        <TouchableOpacity onPress={() => navigation.goBack()}>
                            <MaterialIcons name="arrow-back" size={30} color="black" />
                        </TouchableOpacity>

                        <Text style={styles.pageTitle}>Revisão</Text>
                        <View style={{ width: 30 }} />
                    </View>

                    <Text style={styles.contador}>
                        Questão {index + 1} de {questoes.length}
                    </Text>

                    <Text style={styles.tituloQuestao}>{questaoAtual.titulo}</Text>

                    <Text style={styles.enunciado}>{questaoAtual.enunciado}</Text>

                    {questaoAtual.alternativas.map((alt, i) => {
                        const correta = alt.correta;
                        const escolhida = respostasUsuario[index] === alt.letra;

                        return (
                            <View
                                key={i}
                                style={[
                                    styles.alternativa,
                                    escolhida && !correta && styles.errada,
                                    correta && styles.correta
                                ]}
                            >
                                <Text style={styles.textAlternativa}>
                                    {alt.letra}) {alt.texto}
                                </Text>
                            </View>
                        );
                    })}

                    <View style={styles.bottomButtons}>
                        <TouchableOpacity
                            onPress={voltar}
                            disabled={index === 0}
                            style={[styles.botaoCinza, index === 0 && { opacity: 0.5 }]}
                        >
                            <Text>Voltar</Text>
                        </TouchableOpacity>

                        <TouchableOpacity
                            onPress={avancar}
                            disabled={index === questoes.length - 1}
                            style={[styles.botaoAzul, index === questoes.length - 1 && { opacity: 0.5 }]}
                        >
                            <Text style={{ color: "#fff", fontWeight: "bold" }}>Avançar</Text>
                        </TouchableOpacity>
                    </View>

                </View>
            </ScrollView>

            <View style={styles.menuBarContainer}>
                <MenuBar />
            </View>
        </SafeAreaView>
    );
}

const styles = StyleSheet.create({
    background: { flex: 1, backgroundColor: "#0b4e91" },
    header: { backgroundColor: "#fff", elevation: 4, marginBottom: 10 },

    scrollContent: {
        padding: 15,
        paddingBottom: 130,
    },

    whiteContainer: {
        backgroundColor: "white",
        width: "100%",
        borderRadius: 20,
        padding: 20,
        minHeight: height * 0.78,  // 🔥 Altura responsiva igual às outras telas
        marginBottom: 20,
        shadowColor: "#000",
        shadowOpacity: 0.15,
        shadowRadius: 6,
        elevation: 4,
    },

    row: {
        flexDirection: "row",
        justifyContent: "space-between",
        marginBottom: 20,
    },

    pageTitle: { fontSize: 22, fontWeight: "bold" },
    contador: { fontSize: 16, marginBottom: 10 },
    tituloQuestao: { fontSize: 18, fontWeight: "bold", marginBottom: 10 },
    enunciado: { fontSize: 16, marginBottom: 20 },

    alternativa: {
        padding: 12,
        borderRadius: 10,
        backgroundColor: "#f1f1f1",
        marginBottom: 10,
    },

    correta: { backgroundColor: "#4caf50" },
    errada: { backgroundColor: "#e53935" },

    textAlternativa: { color: "#000" },

    bottomButtons: {
        flexDirection: "row",
        justifyContent: "space-between",
        marginTop: 20,
    },

    botaoCinza: {
        padding: 12,
        backgroundColor: "#ddd",
        borderRadius: 10,
        width: "45%",
        alignItems: "center",
    },

    botaoAzul: {
        padding: 12,
        backgroundColor: "#0b4e91",
        borderRadius: 10,
        width: "45%",
        alignItems: "center",
    },

    menuBarContainer: {
        position: "absolute",
        bottom: 0,
        left: 0,
        right: 0,
        height: 70,
        backgroundColor: "#fff",
    },
});
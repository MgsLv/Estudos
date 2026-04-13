import React from "react";
import { View, Text, TouchableOpacity, ScrollView, StyleSheet, SafeAreaView } from "react-native";
import { MaterialIcons } from "@expo/vector-icons";
import TopNavbar from "../components/TopNavbar";
import MenuBar from "../components/MenuBar";

export default function ResultadoSimulado({ navigation, route }) {
    const { resultado, total, tempoGasto } = route.params;

    const porcentagem = ((resultado / total) * 100).toFixed(0);

    const formatarTempo = (segundos) => {
        if (!segundos) return "00:00";
        const m = Math.floor(segundos / 60);
        const s = String(segundos % 60).padStart(2, "0");
        return `${m}:${s}`;
    };

    return (
        <SafeAreaView style={styles.background}>
            
            {/* NAVBAR */}
            <View style={styles.header}>
                <TopNavbar />
            </View>

            <ScrollView contentContainerStyle={styles.scrollContent}>
                <View style={styles.whiteContainer}>

                    {/* VOLTAR + TÍTULO */}
                    <View style={styles.row}>
                        <TouchableOpacity onPress={() => navigation.goBack()}>
                            <MaterialIcons name="arrow-back" size={30} color="black" />
                        </TouchableOpacity>

                        <Text style={styles.pageTitle}>Resultados</Text>
                        <View style={{ width: 30 }} />
                    </View>

                    <Text style={styles.centerLabel}>Você acertou</Text>

                    <Text style={styles.bigNumber}>{resultado}</Text>

                    <Text style={styles.centerLabel}>de {total} questões</Text>

                    <Text style={styles.percent}>({porcentagem}%)</Text>

                    <Text style={styles.centerLabel}>Tempo total:</Text>
                    <Text style={styles.bigNumber}>{formatarTempo(tempoGasto)}</Text>

                    <Text style={styles.parabens}>Parabéns! 🎉</Text>

                    <Text style={styles.subText}>
                        Continue praticando para melhorar cada vez mais!
                    </Text>

                    {/* BOTÃO REVISAR */}
                    <TouchableOpacity
                        onPress={() =>
                            navigation.navigate("Revisao", {
                                respostasUsuario: route.params.respostasUsuario,
                                questoes: route.params.questoes
                            })
                        }
                        style={[styles.botao, { backgroundColor: "#0b4e91" }]}
                    >
                        <Text style={styles.botaoTexto}>Revisar Respostas</Text>
                    </TouchableOpacity>

                    {/* BOTÃO TENTAR NOVAMENTE */}
                    <TouchableOpacity
                        onPress={() => navigation.navigate("Simulados")}
                        style={[styles.botao, { backgroundColor: "#0b4e91" }]}
                    >
                        <Text style={styles.botaoTexto}>Tentar Novamente</Text>
                    </TouchableOpacity>

                    {/* BOTÃO MENU */}
                    <TouchableOpacity
                        onPress={() => navigation.navigate("Principal")}
                        style={[styles.botao, { backgroundColor: "#0b4e91" }]}
                    >
                        <Text style={styles.botaoTexto}>Voltar ao Menu</Text>
                    </TouchableOpacity>

                </View>
            </ScrollView>

            {/* MENUBAR */}
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
        minHeight: 200,
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

    pageTitle: {
        fontSize: 22,
        fontWeight: "bold",
        color: "#000",
    },

    centerLabel: {
        textAlign: "center",
        fontSize: 18,
        marginVertical: 5,
    },

    bigNumber: {
        textAlign: "center",
        fontSize: 40,
        fontWeight: "bold",
        marginVertical: 5,
        color: "#0b4e91",
    },

    percent: {
        textAlign: "center",
        fontSize: 22,
        fontWeight: "bold",
        marginVertical: 10,
    },

    parabens: {
        textAlign: "center",
        fontSize: 22,
        fontWeight: "bold",
        marginVertical: 15,
    },

    subText: {
        textAlign: "center",
        fontSize: 16,
        color: "#666",
        marginBottom: 20,
    },

    botao: {
        padding: 15,
        borderRadius: 12,
        alignItems: "center",
        marginTop: 10,
    },

    botaoTexto: {
        color: "#fff",
        fontSize: 18,
        fontWeight: "bold",
    },

    menuBarContainer: {
        position: "absolute",
        bottom: 0,
        left: 0,
        right: 0,
        height: 70,
        backgroundColor: "#fff",
        borderTopWidth: 1,
        borderTopColor: "#ccc",
        elevation: 10,
    },
});
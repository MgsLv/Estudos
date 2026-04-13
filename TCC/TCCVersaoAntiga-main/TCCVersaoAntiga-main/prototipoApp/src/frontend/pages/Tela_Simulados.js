import React, { useState } from "react";
import {
    View, Text, TextInput, TouchableOpacity, ScrollView,
    StyleSheet, SafeAreaView, Switch, Dimensions
} from "react-native";
import { MaterialIcons } from "@expo/vector-icons";
import TopNavbar from "../components/TopNavbar";
import MenuBar from "../components/MenuBar";
import SimuladoService from "../services/SimuladoService";

const { width } = Dimensions.get("window");

export default function TelaSimulados({ navigation }) {
    const [quantidade, setQuantidade] = useState("");
    const [tempo, setTempo] = useState("");

    const [ling, setLing] = useState("");
    const [mat, setMat] = useState("");
    const [hum, setHum] = useState("");
    const [nat, setNat] = useState("");

    const [adaptativo, setAdaptativo] = useState(false);

    const iniciar = async () => {
        const qnt = quantidade === "" ? 20 : Number(quantidade);

        const resposta = await SimuladoService.gerarSimulado(qnt, null);

        navigation.navigate("Questoes", {
            questoes: resposta.data,
            tipo: "simulado",
            tempo: tempo === "" ? 30 : Math.max(30, Number(tempo))
        });
    };

    return (
        <SafeAreaView style={styles.background}>
            <View style={styles.header}>
                <TopNavbar />
            </View>

            <ScrollView contentContainerStyle={styles.scrollContent}>
                <View style={styles.whiteContainer}>
                    
                    {/* TOPO */}
                    <View style={styles.row}>
                        <TouchableOpacity onPress={() => navigation.goBack()}>
                            <MaterialIcons name="arrow-back" size={30} color="black" />
                        </TouchableOpacity>

                        <Text style={styles.pageTitle}>Simulados</Text>

                        <View style={{ width: 30 }} />
                    </View>

                    {/* SWITCH ADAPTATIVO */}
                    <View style={styles.switchRow}>
                        <Text style={styles.switchText}>Adaptativo</Text>
                        <Switch
                            value={adaptativo}
                            onValueChange={setAdaptativo}
                            thumbColor={adaptativo ? "#0b4e91" : "#ccc"}
                            trackColor={{ true: "#0b4e91", false: "#aaa" }}
                        />
                    </View>

                    {/* CAMPOS ADAPTATIVOS */}
                    {adaptativo && (
                        <View style={styles.adaptativoBox}>
                            <Text style={styles.adaptativoTitulo}>Configurações do Adaptativo</Text>

                            <Text style={styles.label}>Quantidade de questões (mínimo 20):</Text>
                            <TextInput
                                keyboardType="numeric"
                                placeholder="20"
                                value={quantidade}
                                onChangeText={setQuantidade}
                                style={styles.input}
                            />

                            <Text style={styles.label}>Tempo limite (minutos):</Text>
                            <TextInput
                                keyboardType="numeric"
                                placeholder="30"
                                value={tempo}
                                onChangeText={setTempo}
                                style={styles.input}
                            />

                            {[ 
                                { label: "Linguagens", val: ling, set: setLing },
                                { label: "Matemática", val: mat, set: setMat },
                                { label: "Humanas", val: hum, set: setHum },
                                { label: "Natureza", val: nat, set: setNat }
                            ].map((i, x) => (
                                <TextInput
                                    key={x}
                                    keyboardType="numeric"
                                    placeholder={i.label}
                                    value={i.val}
                                    onChangeText={i.set}
                                    style={styles.input}
                                />
                            ))}
                        </View>
                    )}

                    {/* INSTRUÇÕES */}
                    <Text style={styles.instrucoes}>
                        • Prepare-se em um ambiente tranquilo{"\n"}
                        • Não use calculadora{"\n"}
                        • Foque apenas no simulado{"\n"}
                    </Text>

                    <Text style={styles.boaSorte}>Boa sorte! 🍀</Text>

                    <TouchableOpacity onPress={iniciar} style={styles.botao}>
                        <Text style={styles.botaoTexto}>Iniciar Simulado</Text>
                    </TouchableOpacity>

                </View>
            </ScrollView>

            <View style={styles.menuBarContainer}>
                <MenuBar />
            </View>
        </SafeAreaView>
    );
}

const styles = StyleSheet.create({
    background: {
        flex: 1,
        backgroundColor: "#0b4e91",
    },
    header: { backgroundColor: "#fff", elevation: 4, marginBottom: 10 },

    scrollContent: {
        alignItems: "center",
        paddingBottom: 120,
    },

    whiteContainer: {
        backgroundColor: "#fff",
        width: width * 0.92,
        borderRadius: 20,
        padding: 20,
        minHeight: 300,
        marginTop: 10,
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

    switchRow: {
        flexDirection: "row",
        justifyContent: "space-between",
        marginBottom: 15,
        paddingVertical: 5,
    },

    switchText: { fontSize: 18, fontWeight: "bold" },

    input: {
        width: "100%",
        backgroundColor: "#f1f1f1",
        padding: 12,
        borderRadius: 10,
        marginBottom: 12,
    },

    adaptativoBox: {
        backgroundColor: "#eef6ff",
        padding: 15,
        borderRadius: 12,
        marginVertical: 15,
    },

    adaptativoTitulo: {
        fontWeight: "bold",
        marginBottom: 10,
        fontSize: 16,
    },

    instrucoes: {
        marginTop: 10,
        fontSize: 14,
        color: "#555",
        lineHeight: 22,
    },

    boaSorte: {
        textAlign: "center",
        fontSize: 18,
        fontWeight: "bold",
        marginVertical: 12,
    },

    botao: {
        backgroundColor: "#0b4e91",
        padding: 15,
        borderRadius: 12,
        alignItems: "center",
        marginTop: 20,
        marginBottom: 20,
    },

    botaoTexto: { color: "#fff", fontSize: 18, fontWeight: "bold" },

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
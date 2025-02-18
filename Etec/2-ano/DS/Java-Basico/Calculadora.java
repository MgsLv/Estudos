import javax.swing.*;

public class Main {
    public static void main(String[] args) {
        Object[] equ = {"Soma", "Subtração", "Multiplicação", "Divisão"};
        String resp = (String) JOptionPane.showInputDialog(null, "Selecione uma operação:\n", "Pesquisar", JOptionPane.PLAIN_MESSAGE, null, equ, "Soma");

        if (resp == null) {
            JOptionPane.showMessageDialog(null, "Você pressionou Cancel");
            return;
        }

        if ("Soma".equals(resp)) {
            try {
                String v1 = JOptionPane.showInputDialog("Forneça um número para efetuar a operação: ");
                if (v1 == null) {
                    JOptionPane.showMessageDialog(null, "Número inválido, tente novamente.");
                    return;
                }
                float n1 = Float.parseFloat(v1);

                String v2 = JOptionPane.showInputDialog("Forneça outro número para efetuar a operação: ");
                if (v2 == null) {
                    JOptionPane.showMessageDialog(null, "Número inválido, tente novamente.");
                    return; // Termina a execução se o usuário pressionar Cancel
                }
                float n2 = Float.parseFloat(v2);

                float result = n1 + n2;
                JOptionPane.showMessageDialog(null, "O resultado da operação é: " + result);

            } catch (NumberFormatException erro) {
                JOptionPane.showMessageDialog(null, "Número inválido. Por favor, insira valores válidos.");
            }
        } else {

            if ("Subtração".equals(resp)) {
                try {
                    String v1 = JOptionPane.showInputDialog("Forneça um número para efetuar a operação: ");
                    if (v1 == null) {
                        JOptionPane.showMessageDialog(null, "Número inválido, tente novamente.");
                        return;
                    }
                    float n1 = Float.parseFloat(v1);

                    String v2 = JOptionPane.showInputDialog("Forneça outro número para efetuar a operação: ");
                    if (v2 == null) {
                        JOptionPane.showMessageDialog(null, "Número inválido, tente novamente.");
                        return;
                    }
                    float n2 = Float.parseFloat(v2);

                    float result = n1 - n2;
                    JOptionPane.showMessageDialog(null, "O resultado da operação é: " + result);

                } catch (NumberFormatException erro) {
                    JOptionPane.showMessageDialog(null, "Número inválido. Por favor, insira valores válidos.");
                }
            } else {
                    if ("Multiplicação".equals(resp)) {
                        try {
                            String v1 = JOptionPane.showInputDialog("Forneça um número para efetuar a operação: ");
                            if (v1 == null) {
                                JOptionPane.showMessageDialog(null, "Número inválido, tente novamente.");
                                return;
                            }
                            float n1 = Float.parseFloat(v1);

                            String v2 = JOptionPane.showInputDialog("Forneça outro número para efetuar a operação: ");
                            if (v2 == null) {
                                JOptionPane.showMessageDialog(null, "Número inválido, tente novamente.");
                                return;
                            }
                            float n2 = Float.parseFloat(v2);

                            float result = n1 * n2;
                            JOptionPane.showMessageDialog(null, "O resultado da operação é: " + result);

                        } catch (NumberFormatException erro) {
                            JOptionPane.showMessageDialog(null, "Número inválido. Por favor, insira valores válidos.");
                        }
                    } else {

                        if ("Divisão".equals(resp)) {
                            try {
                                String v1 = JOptionPane.showInputDialog("Forneça um número para efetuar a operação: ");
                                if (v1 == null) {
                                    JOptionPane.showMessageDialog(null, "Número inválido, tente novamente.");
                                    return;
                                }
                                float n1 = Float.parseFloat(v1);

                                String v2 = JOptionPane.showInputDialog("Forneça outro número para efetuar a operação: ");
                                if (v2 == null) {
                                    JOptionPane.showMessageDialog(null, "Número inválido, tente novamente.");
                                    return;
                                }
                                float n2 = Float.parseFloat(v2);

                                float result = n1 / n2;
                                JOptionPane.showMessageDialog(null, "O resultado da operação é: " + result);

                            } catch (NumberFormatException erro) {
                                JOptionPane.showMessageDialog(null, "Número inválido. Por favor, insira valores válidos.");
                            }

                        }
                    }
            }
        }
    }
}

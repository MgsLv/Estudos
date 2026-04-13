import javax.swing.JOptionPane;
public class InstrucaoThrows {
    public static void main(String[] args) throws Exception {
        // Caixa de execução com metodo throws(erro) Exeption(exceção)
        try {
            int idade = Integer.parseInt(JOptionPane.showInputDialog("Forneça sua idade"));
            /* Variavável idade, do tipo int, recebe valores do tipo String
            transportados para int pelo metodo parseInt

            Exibe mensagem de dialogo com o usuário
            */

            if (idade < 18) {
                throw new Exception("Menor de idade, entrada não permitida!");
                // Se idade for menor que 18, exibe na tela a mensagem de entreada não permitida

            } else {
                JOptionPane.showMessageDialog(null, "Idade válida, seja bem vindo(a)!");
                //Caso contrário, exibe na tela a mensagem de idade válida
            }

        } catch (Exception erro) {
            JOptionPane.showMessageDialog(null, erro.toString());
            // Caso haja algum erro, exibe na tela a mensagem de erro de exceção

        }
    }

}

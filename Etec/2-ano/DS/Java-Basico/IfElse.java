import javax.swing.*;
import javax.swing.JOptionPane;

public class If {
        public static void main(String[] args) {
            Object[] op = {"Masculino", "Feminino" };
            String resp = (String) JOptionPane.showInputDialog(null,
                "selecione o sexo:\n", "Pesquisar", JOptionPane.PLAIN_MESSAGE,
                null, op, "Masculino)" );
            if (resp == null) {
                JOptionPane.showMessageDialog(null, "Você presionou Cancel");
            }
            if (resp.equals("Masculino")) {
                JOptionPane.showMessageDialog(null, "Você é homem!");
            }
            if (resp.equals("Feminino")){
                JOptionPane.showMessageDialog(null, "Você é mulher!");
            }
            System.exit(0);
        }
}

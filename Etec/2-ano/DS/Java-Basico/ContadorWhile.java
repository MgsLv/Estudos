import javax.swing.JOptionPane;
public class ContadorWhile {
    public static void main(String[] args ) {
        // Caixa de execução

        try {
            int limite = Integer.parseInt(JOptionPane.showInputDialog("Digite a quantidade"));
            // Exibe na tela a mensagem de dialogo com o usuário

            int contador = limite;
            while (contador >= 0) {
                System.out.println(contador);
                contador--;

                /* Comando while(enquando) contador for maior ou igual a 0:
                Exibe na tela o valor da variável 'contador' recebido pelo usuário de forma regressiva
                 */
            }
            System.out.println("Fim do contador regressivo\n");
            // Exibe na tela a mensagem de que o contagem regressiva terminou

            contador = 0;
            // Muda o valor de 'contador' para 0

            do {
                System.out.println(contador);
                contador++;

                // Exibe na tela o valor da variável 'contador' recebido pelo usuário de forma progressiva


            } while (contador <= limite);
            System.out.println("Fim do contador progressivo");

            // Enquanto contador for menor ou igual ao limite, exibe na tela a mensagem de que o contador progressivo terminou

        } catch (NumberFormatException erro) {
            System.out.println("Não foi fornecido um número inteiro válido!\n"
                    + erro.toString());

            /*
             Se o usuário houver digitato qualquer caracter que não seja do tipo inteiro,
             exibe na tela a mensagem de erro por número inválido
             */
        }
        System.exit(0);

        // Comando que encerra a execução
    }
}

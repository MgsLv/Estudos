import java.sql.SQLOutput;
import java.util.Locale;
import java.util.Scanner;

public class ContaTerminal {
    public static void main(String[] args) throws Exception {

        Scanner scn = new Scanner(System.in);
        scn.useLocale(new Locale("pt", "BR"));

        System.out.println("Por favor, digite o seu nome!");
        String nomeCliente = scn.nextLine();

        System.out.println("Certo, agora digite o número da Agência!");
        int agencia = Integer.parseInt(scn.nextLine());

        System.out.println("Certo, agora digite o número da sua Conta! (Ex: 00012345-6 )");
        String conta = scn.nextLine();

        final double saldo = 500.00;

        System.out.println("Olá " + nomeCliente + ", obrigado por criar uma conta em nosso banco, " +
                "sua agência é " + agencia + ", conta " + conta +" e seu saldo de R$" + saldo + " já está disponível para saque");
    }
}

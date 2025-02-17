public class Main extends Conta{
    public static void main(String[] args){
        Conta conta = new Conta();

        conta.cliente = "Miguel Soares de Sousa";
        conta.saldo = 500.00;

        conta.depositar(5000.00);
        conta.exibeSaldo();

        Conta.destino = new Conta();
        destino.cliente = "Aninha";

        conta.transferirPara(destino, 500);

        destino.exibeSaldo();

        conta.sacar(100000000);
    }
}

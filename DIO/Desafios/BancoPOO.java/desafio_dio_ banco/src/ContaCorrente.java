
public class ContaCorrente extends Conta {

    public ContaCorrente(Cliente cliente, int agencia, double saldo) {
        super(cliente, agencia, saldo);
    }

    @Override
    public void imprimirExtrato() {
        System.out.println("=== Extrato Conta Corrente ===");
        super.imprimirInfosComuns();
    }

}
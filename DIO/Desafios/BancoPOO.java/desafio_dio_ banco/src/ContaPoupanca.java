
public class ContaPoupanca extends Conta {

    public ContaPoupanca(Cliente cliente, int agencia, double saldo) {
        super(cliente, agencia, saldo);
    }

    @Override
    public void imprimirExtrato() {
        System.out.println("=== Extrato Conta Poupança ===");
        super.imprimirInfosComuns();
    }
}
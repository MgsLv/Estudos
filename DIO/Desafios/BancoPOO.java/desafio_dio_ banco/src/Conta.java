
public abstract class Conta implements IConta  {

    private static int SEQUENCIAL = 1;

    protected int agencia;
    protected int numero;
    protected double saldo;
    protected Cliente cliente;


    public Conta(Cliente cliente, int agencia, double saldo) {
        this.agencia = agencia;
        this.numero = SEQUENCIAL++;
        this.saldo = saldo;
        this.cliente = cliente;
    }

    public int getAgencia() {
        return agencia;
    }
    public int getNumero() {
        return numero;
    }
    public double getSaldo() {
        return saldo;
    }

    @Override
    public void sacar(double valor) {
        if (valor > saldo) {
            System.out.println("Saldo insuficiente!");
        } else {
            saldo -= valor;
            System.out.println(String.format("Saque de R$ %.2f realizado com sucesso!", valor));
        }
    }

    @Override
    public void depositar(double valor) {
        if (valor <= 0) {
            System.out.println("Valor inválido para o depósito!");
        } else {
            saldo += valor;
            System.out.println(String.format("Depóstido de R$ %.2f realizado com sucesso!", valor));
        }
    }

    @Override
    public void transferir(double valor, IConta contaDestino) {
        if (valor <= 0) {
            System.out.println("Valor inválido para a transferência!");
        } else {
            this.sacar(valor);
            contaDestino.depositar(valor);
            Conta cnt = (Conta) contaDestino;
            System.out.println(String.format("Transferência de R$ %.2f realizada com sucesso para a conta %d", valor, cnt.getNumero()));
        }
    }

    protected void imprimirInfosComuns() {
        System.out.println(String.format("Titular: %s", this.cliente.getNome()));
        System.out.println(String.format("Agencia: %d", this.agencia));
        System.out.println(String.format("Numero: %d", this.numero));
        System.out.println(String.format("Saldo: %.2f", this.saldo));
    }
}
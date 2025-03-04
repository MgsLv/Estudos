
public class Main {

    public static void main(String[] args) {
        Banco bc = new Banco();

        Cliente c1 = new Cliente("Daniel");
        Cliente c2 = new Cliente("Rafaela");
        Cliente c3 = new Cliente("Bruno");
        Cliente c4 = new Cliente("Sofia");

        bc.adicionarConta(c1, 123456, 5000.0, false);
        bc.adicionarConta(c2, 654321, 10000.0, false);
        bc.adicionarConta(c3, 456123, 12000.0, true);
        bc.adicionarConta(c4, 123654, 3500.0, false);

        bc.listarContas();

        Conta cnt1 = bc.getContas().get(1);
        Conta cnt2 = bc.getContas().get(2);
        Conta cnt3 = bc.getContas().get(3);

        cnt1.sacar(500);
        cnt1.depositar(1500);

        cnt2.transferir(200, cnt3);

        bc.excluirConta(4);

        bc.listarContas();
    }

}
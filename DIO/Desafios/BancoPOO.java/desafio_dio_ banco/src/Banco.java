import java.util.ArrayList;
import java.util.List;

public class Banco {

    private String nome;
    private List<Conta> contas;

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public Banco() {
        this.contas = new ArrayList<>();
    }

    public List<Conta> getContas() {
        return contas;
    }

    public void adicionarConta(Cliente cliente,int agencia, double saldo, boolean ePoupanca) {
        Conta cnt;

        if (ePoupanca) {
            cnt = new ContaPoupanca(cliente, agencia, saldo);
        } else {
            cnt = new ContaCorrente(cliente, agencia, saldo);
        }

        contas.add(cnt);
    }

    public void excluirConta(int numero) {
        for (int i = 0; i < contas.size(); i++) {
            if (contas.get(i).getNumero() == numero) {
                contas.remove(i);
                System.out.println("Conta número " + numero + " removida com sucesso!");
                return;
            }
        }
        System.out.println("Conta número " + numero + " não encontrada.");
    }

    public void listarContas() {
        if (!contas.isEmpty()) {
            for (Conta c : contas) {
                c.imprimirExtrato();
            }
        } else {
            System.out.println("Nenhuma conta cadastrada!");
        }
    }

}
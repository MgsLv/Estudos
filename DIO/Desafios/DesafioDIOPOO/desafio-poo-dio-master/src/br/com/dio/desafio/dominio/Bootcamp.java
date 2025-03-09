package br.com.dio.desafio.dominio;

import java.util.*;

public class Bootcamp {
    private String nome;
    private String descricao;
    private final Set<Conteudo> conteudos = new LinkedHashSet<>();
    private final Set<Dev> devsInscritos = new HashSet<>();

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getDescricao() {
        return descricao;
    }

    public void setDescricao(String descricao) {
        this.descricao = descricao;
    }

    public Set<Conteudo> getConteudos() {
        return conteudos;
    }

    public Set<Dev> getDevsInscritos() {
        return devsInscritos;
    }

    public void exibirRanking() {
        List<Dev> ranking = new ArrayList<>(devsInscritos);
        ranking.sort(Comparator.comparingDouble(Dev::calcularTotalXp).reversed());

        System.out.println("\n=== Ranking do Bootcamp " + nome + " ===");
        int posicao = 1;
        for (Dev dev : ranking) {
            System.out.println(posicao++ + ". " + dev.getNome() + " - XP: " + dev.calcularTotalXp());
        }
    }
}

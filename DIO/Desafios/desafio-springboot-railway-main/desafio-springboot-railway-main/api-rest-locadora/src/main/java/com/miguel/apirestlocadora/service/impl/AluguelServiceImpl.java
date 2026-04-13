package com.miguel.apirestlocadora.service.impl;

import com.miguel.apirestlocadora.domain.model.Aluguel;
import com.miguel.apirestlocadora.domain.model.Cliente;
import com.miguel.apirestlocadora.domain.model.Jogo;
import com.miguel.apirestlocadora.domain.repository.AluguelRepository;
import com.miguel.apirestlocadora.domain.repository.ClienteRepository;
import com.miguel.apirestlocadora.domain.repository.JogoRepository;
import com.miguel.apirestlocadora.service.AluguelService;
import org.springframework.stereotype.Service;

import java.time.LocalDate;
import java.util.NoSuchElementException;

@Service
public class AluguelServiceImpl implements AluguelService {

    private final AluguelRepository aluguelRepository;
    private final ClienteRepository clienteRepository;
    private final JogoRepository jogoRepository;

    public AluguelServiceImpl(AluguelRepository aluguelRepository, ClienteRepository clienteRepository, JogoRepository jogoRepository) {
        this.aluguelRepository = aluguelRepository;
        this.clienteRepository = clienteRepository;
        this.jogoRepository = jogoRepository;
    }

    @Override
    public Aluguel findById(Long id) {
        return null;
    }

    @Override
    public Aluguel realizarAluguel(Aluguel aluguel) {
        // Carregar Cliente e Jogo antes de associá-los
        Cliente cliente = clienteRepository.findById(aluguel.getCliente().getId())
                .orElseThrow(() -> new NoSuchElementException("Cliente não encontrado"));
        Jogo jogo = jogoRepository.findById(aluguel.getJogo().getId())
                .orElseThrow(() -> new NoSuchElementException("Jogo não encontrado"));

        // Associando as entidades ao Aluguel
        aluguel.setCliente(cliente);
        aluguel.setJogo(jogo);

        return aluguelRepository.save(aluguel);
    }

    @Override
    public Aluguel registrarDevolucao(Long idAluguel) {
        return null;
    }
}

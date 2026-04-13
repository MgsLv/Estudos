package com.miguel.apirestlocadora.service.impl;

import com.miguel.apirestlocadora.domain.model.Jogo;
import com.miguel.apirestlocadora.domain.repository.JogoRepository;
import com.miguel.apirestlocadora.service.JogoService;
import org.springframework.stereotype.Service;

import java.util.Optional;

@Service
public class JogoServiceImpl implements JogoService {

    private final JogoRepository jogoRepository;

    public JogoServiceImpl(JogoRepository jogoRepository) {
        this.jogoRepository = jogoRepository;
    }

    @Override
    public Jogo findById(Long id) {
        return jogoRepository.findById(id).orElse(null);
    }

    @Override
    public Jogo create(Jogo jogo) {
        jogo.setId(null); // Garante que o Hibernate entenda como novo objeto
        return jogoRepository.save(jogo);
    }

    @Override
    public Jogo update(Long id, Jogo jogoToUpdate) {
        Optional<Jogo> optionalJogo = jogoRepository.findById(id);
        if (optionalJogo.isPresent()) {
            Jogo jogo = optionalJogo.get();
            jogo.setTitulo(jogoToUpdate.getTitulo());
            jogo.setGenero(jogoToUpdate.getGenero());
            jogo.setDisponivel(jogoToUpdate.isDisponivel());
            // outros campos se houver
            return jogoRepository.save(jogo);
        }
        return null;
    }

    @Override
    public boolean delete(Long id) {
        if (jogoRepository.existsById(id)) {
            jogoRepository.deleteById(id);
            return true;
        }
        return false;
    }
}

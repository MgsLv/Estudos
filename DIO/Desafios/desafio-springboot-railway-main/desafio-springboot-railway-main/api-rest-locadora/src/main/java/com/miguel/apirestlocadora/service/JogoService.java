package com.miguel.apirestlocadora.service;

import com.miguel.apirestlocadora.domain.model.Jogo;

public interface JogoService {
    Jogo findById(Long id);
    Jogo create(Jogo jogoToCreate);
    Jogo update(Long id, Jogo jogoToUpdate);
    boolean delete(Long id);
}
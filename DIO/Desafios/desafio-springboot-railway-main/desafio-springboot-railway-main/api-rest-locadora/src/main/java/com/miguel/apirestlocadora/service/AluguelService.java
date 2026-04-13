package com.miguel.apirestlocadora.service;

import com.miguel.apirestlocadora.domain.model.Aluguel;

public interface AluguelService {
    Aluguel findById(Long id);
    Aluguel realizarAluguel(Aluguel aluguel);
    Aluguel registrarDevolucao(Long idAluguel);
}
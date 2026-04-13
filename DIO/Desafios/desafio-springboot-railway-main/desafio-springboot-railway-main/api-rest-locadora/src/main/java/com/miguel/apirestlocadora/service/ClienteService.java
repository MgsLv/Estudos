package com.miguel.apirestlocadora.service;

import com.miguel.apirestlocadora.domain.model.Cliente;
import com.miguel.apirestlocadora.domain.model.Jogo;

public interface ClienteService {
    Cliente findById(Long id);
    Cliente create(Cliente clienteToCreate);

    Jogo update(Long id, Jogo jogoToUpdate);

    Cliente update(Long id, Cliente clienteToUpdate);

    boolean delete(Long id);
}
package com.miguel.apirestlocadora.service.impl;

import com.miguel.apirestlocadora.domain.model.Cliente;
import com.miguel.apirestlocadora.domain.model.Jogo;
import com.miguel.apirestlocadora.domain.repository.ClienteRepository;
import com.miguel.apirestlocadora.service.ClienteService;
import org.springframework.stereotype.Service;

import java.util.NoSuchElementException;
import java.util.Optional;

@Service
public class ClienteServiceImpl implements ClienteService {

    private final ClienteRepository clienteRepository;

    public ClienteServiceImpl(ClienteRepository clienteRepository) {
        this.clienteRepository = clienteRepository;
    }

    @Override
    public Cliente findById(Long id) {
        return clienteRepository.findById(id)
                .orElseThrow(() -> new NoSuchElementException("Cliente com ID " + id + " não encontrado."));
    }

    @Override
    public Cliente create(Cliente clienteToCreate) {
        if (clienteRepository.existsByEmail(clienteToCreate.getEmail())) {
            throw new IllegalArgumentException("Este e-mail já está cadastrado.");
        }
        clienteToCreate.setId(null);
        return clienteRepository.save(clienteToCreate);
    }

    @Override
    public Jogo update(Long id, Jogo jogoToUpdate) {
        return null;
    }

    @Override
    public Cliente update(Long id, Cliente clienteToUpdate) {
        Optional<Cliente> optionalCliente = clienteRepository.findById(id);
        if (optionalCliente.isPresent()) {
            Cliente cliente = optionalCliente.get(); // Aqui você obtém o cliente de optional
            cliente.setNome(clienteToUpdate.getNome());
            cliente.setEmail(clienteToUpdate.getEmail());
            cliente.setTelefone(clienteToUpdate.getTelefone());
            // outros campos se houver
            return clienteRepository.save(cliente);
        }
        throw new NoSuchElementException("Cliente com ID " + id + " não encontrado.");
    }

    @Override
    public boolean delete(Long id) {
        if (clienteRepository.existsById(id)) {
            clienteRepository.deleteById(id);
            return true;
        }
        return false;
    }
}
package com.miguel.apirestlocadora.controller;

import com.miguel.apirestlocadora.domain.model.Cliente;
import com.miguel.apirestlocadora.domain.model.Jogo;
import com.miguel.apirestlocadora.service.ClienteService;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.support.ServletUriComponentsBuilder;

import java.net.URI;

@RestController
@RequestMapping("/clientes")
public class ClienteController {

    private final ClienteService clienteService;

    public ClienteController(ClienteService clienteService) {
        this.clienteService = clienteService;
    }

    @GetMapping("/{id}")
    public ResponseEntity<Cliente> findById(@PathVariable Long id) {
        var cliente = clienteService.findById(id);
        return ResponseEntity.ok(cliente);
    }

    @PostMapping
    public ResponseEntity<Cliente> create(@RequestBody Cliente clienteToCreate) {
        var clienteCreated = clienteService.create(clienteToCreate);
        URI location = ServletUriComponentsBuilder.fromCurrentRequest()
                .path("/{id}")
                .buildAndExpand(clienteCreated.getId())
                .toUri();
        return ResponseEntity.created(location).body(clienteCreated);
    }

    @PutMapping("/{id}")
    public ResponseEntity<Jogo> update(@PathVariable Long id, @RequestBody Jogo jogoToUpdate) {
        var jogoUpdated = clienteService.update(id, jogoToUpdate);
        if (jogoUpdated == null) {
            return ResponseEntity.notFound().build();  // 404 se o Jogo não for encontrado
        }
        return ResponseEntity.ok(jogoUpdated);
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> delete(@PathVariable Long id) {
        boolean deleted = clienteService.delete(id);
        if (!deleted) {
            return ResponseEntity.notFound().build();  // 404 se não encontrado para deletar
        }
        return ResponseEntity.noContent().build();  // 204 N
    }
}

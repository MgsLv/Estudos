package com.miguel.apirestlocadora.controller;

import com.miguel.apirestlocadora.domain.model.Jogo;
import com.miguel.apirestlocadora.service.JogoService;
import jakarta.validation.Valid;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.support.ServletUriComponentsBuilder;

import java.net.URI;

@RestController
@RequestMapping("/jogos")
public class JogoController {

    private final JogoService jogoService;

    public JogoController(JogoService jogoService) {
        this.jogoService = jogoService;
    }

    @GetMapping("/{id}")
    public ResponseEntity<Jogo> findById(@PathVariable Long id) {
        var jogo = jogoService.findById(id);
        if (jogo == null) {
            return ResponseEntity.status(HttpStatus.NOT_FOUND).build();
        }
        return ResponseEntity.ok(jogo);
    }

    @PostMapping
    public ResponseEntity<Jogo> create(@RequestBody @Valid Jogo jogoToCreate) {
        var jogoCreated = jogoService.create(jogoToCreate);
        URI location = ServletUriComponentsBuilder.fromCurrentRequest()
                .path("/{id}")
                .buildAndExpand(jogoCreated.getId())
                .toUri();
        return ResponseEntity.created(location).body(jogoCreated);
    }

    @PutMapping("/{id}")
    public ResponseEntity<Jogo> update(@PathVariable Long id, @RequestBody Jogo jogoToUpdate) {
        var jogoUpdated = jogoService.update(id, jogoToUpdate);
        if (jogoUpdated == null) {
            return ResponseEntity.notFound().build();
        }
        return ResponseEntity.ok(jogoUpdated);
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Void> delete(@PathVariable Long id) {
        boolean deleted = jogoService.delete(id);
        if (!deleted) {
            return ResponseEntity.notFound().build();
        }
        return ResponseEntity.noContent().build();
    }
}

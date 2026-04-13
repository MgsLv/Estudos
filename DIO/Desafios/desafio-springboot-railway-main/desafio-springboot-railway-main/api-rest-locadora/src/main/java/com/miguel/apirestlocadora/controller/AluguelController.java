package com.miguel.apirestlocadora.controller;

import com.miguel.apirestlocadora.domain.model.Aluguel;
import com.miguel.apirestlocadora.service.AluguelService;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.support.ServletUriComponentsBuilder;

import java.net.URI;

@RestController
@RequestMapping("/alugueis")
public class AluguelController {

    private final AluguelService aluguelService;

    public AluguelController(AluguelService aluguelService) {
        this.aluguelService = aluguelService;
    }

    @GetMapping("/{id}")
    public ResponseEntity<Aluguel> findById(@PathVariable Long id) {
        var aluguel = aluguelService.findById(id);
        return ResponseEntity.ok(aluguel);
    }

    @PostMapping
    public ResponseEntity<Aluguel> realizarAluguel(@RequestBody Aluguel aluguelToCreate) {
        var aluguelCriado = aluguelService.realizarAluguel(aluguelToCreate);
        URI location = ServletUriComponentsBuilder.fromCurrentRequest()
                .path("/{id}")
                .buildAndExpand(aluguelCriado.getId())
                .toUri();
        return ResponseEntity.created(location).body(aluguelCriado);
    }

    @PutMapping("/{id}/devolucao")
    public ResponseEntity<Aluguel> registrarDevolucao(@PathVariable Long id) {
        var aluguelAtualizado = aluguelService.registrarDevolucao(id);
        return ResponseEntity.ok(aluguelAtualizado);
    }
}

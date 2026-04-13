package com.miguel.apirestlocadora.domain.repository;

import com.miguel.apirestlocadora.domain.model.Jogo;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface JogoRepository extends JpaRepository<Jogo, Long> {

    boolean existsByTitulo(String titulo);
}

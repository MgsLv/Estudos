package com.miguel.apirestlocadora.domain.repository;

import com.miguel.apirestlocadora.domain.model.Aluguel;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface AluguelRepository extends JpaRepository<Aluguel, Long> {

}

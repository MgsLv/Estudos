package com.miguel.apirestlocadora;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import io.swagger.v3.oas.annotations.OpenAPIDefinition;
import io.swagger.v3.oas.annotations.info.Info;
import org.springframework.boot.autoconfigure.domain.EntityScan;

@SpringBootApplication
@EntityScan(basePackages = "com.miguel.apirestlocadora.domain.model")
public class ApiRestLocadoraApplication {

	public static void main(String[] args) {
		SpringApplication.run(ApiRestLocadoraApplication.class, args);
	}
}
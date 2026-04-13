# API REST - Locadora de Jogos 🎮

Java RESTful API desenvolvida como estudo prático com base na Santander Dev Week 2023.

## 🚀 Tecnologias Utilizadas

| Tecnologia         | Descrição                                                                                                                                     |
|--------------------|------------------------------------------------------------------------------------------------------------------------------------------------|
| **Java 17**        | Utilizada a versão LTS mais recente do Java para aproveitar os recursos modernos e robustos da linguagem.                                     |
| **Spring Boot 3**  | Framework que agiliza o desenvolvimento com autoconfiguração, endpoints REST e injeção de dependência de forma simplificada.                  |
| **Spring Data JPA**| Facilita a comunicação com o banco de dados relacional, abstraindo a complexidade do acesso e manipulação dos dados com repositórios.        |
| **OpenAPI (Swagger)** | Utilizado para documentação clara, acessível e interativa dos endpoints da API.                                                            |
| **Railway**        | Plataforma utilizada para facilitar o deploy na nuvem, com suporte a bancos de dados como serviço e integração contínua (CI/CD).             |

---

## 🧠 Diagrama de Classes

```mermaid
erDiagram
    CLIENTE ||--o{ ALUGUEL : realiza
    JOGO ||--o{ ALUGUEL : alugado_por

    CLIENTE {
        int id
        string nome
        string email
        string telefone
    }

    JOGO {
        int id
        string titulo
        string plataforma
        string genero
        boolean disponivel
    }

    ALUGUEL {
        int id
        date dataAluguel
        date dataDevolucaoPrevista
        date dataDevolucaoReal
    }

CREATE DATABASE usuarioetimpwiii;
USE usuarioetimpwiii;
CREATE TABLE Usuarios(
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100)NOT NULL,
    senha VARCHAR(50) NOT NULL
);

CREATE DATABASE IF NOT EXISTS biblioteca CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE biblioteca;

CREATE TABLE autores (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nome VARCHAR(120) NOT NULL
);

CREATE TABLE categorias (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nome VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE utilizadores (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nome VARCHAR(120) NOT NULL,
 email VARCHAR(150) NOT NULL UNIQUE,
 senha VARCHAR(255) NOT NULL,
 tipo ENUM('admin','funcionario','leitor') NOT NULL DEFAULT 'leitor'
);

CREATE TABLE livros (
 id INT AUTO_INCREMENT PRIMARY KEY,
 titulo VARCHAR(180) NOT NULL,
 autor_id INT NOT NULL,
 categoria_id INT NOT NULL,
 ano INT,
 isbn VARCHAR(30),
 quantidade INT NOT NULL DEFAULT 1,
 quantidade_disponivel INT NOT NULL DEFAULT 1,
 FOREIGN KEY (autor_id) REFERENCES autores(id),
 FOREIGN KEY (categoria_id) REFERENCES categorias(id)
);

CREATE TABLE emprestimos (
 id INT AUTO_INCREMENT PRIMARY KEY,
 livro_id INT NOT NULL,
 utilizador_id INT NOT NULL,
 data_emprestimo DATE NOT NULL,
 data_prevista DATE NOT NULL,
 data_devolucao DATE NULL,
 estado ENUM('emprestado','devolvido') NOT NULL DEFAULT 'emprestado',
 FOREIGN KEY (livro_id) REFERENCES livros(id),
 FOREIGN KEY (utilizador_id) REFERENCES utilizadores(id)
);

INSERT INTO autores (nome) VALUES ('Mia Couto'), ('José Craveirinha');
INSERT INTO categorias (nome) VALUES ('Literatura'), ('Informática');

INSERT INTO utilizadores (nome,email,senha,tipo)
VALUES ('Administrador','admin@biblioteca.local', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llCj5dQ6uRjL4j8aJqK3W', 'admin');

INSERT INTO livros (titulo,autor_id,categoria_id,ano,isbn,quantidade,quantidade_disponivel)
VALUES ('Terra Sonâmbula',1,1,1992,'9789722900000',5,5),
       ('Obra Poética',2,1,2000,'9789720000000',3,3);

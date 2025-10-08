-- Criar banco
DROP DATABASE IF EXISTS pizzaria_domus;
CREATE DATABASE pizzaria_domus;
USE pizzaria_domus;

-- Tabela produtos
DROP TABLE IF EXISTS produtos;
CREATE TABLE produtos (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  preco DECIMAL(10,2) NOT NULL,
  quantidade INT(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela funcionario
DROP TABLE IF EXISTS funcionario;
CREATE TABLE funcionario (
  id_funcionario INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(100),
  turno VARCHAR(20),
  PRIMARY KEY (id_funcionario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela pizza
DROP TABLE IF EXISTS pizza;
CREATE TABLE pizza (
  id_pizza INT NOT NULL AUTO_INCREMENT,
  sabor VARCHAR(100),
  preco DECIMAL(6,2),
  PRIMARY KEY (id_pizza)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela bebida
DROP TABLE IF EXISTS bebida;
CREATE TABLE bebida (
  id_bebida INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(100),
  preco DECIMAL(6,2),
  PRIMARY KEY (id_bebida)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela pagamento
DROP TABLE IF EXISTS pagamento;
CREATE TABLE pagamento (
  id_pagamento INT NOT NULL AUTO_INCREMENT,
  tipo_pagamento VARCHAR(20),
  PRIMARY KEY (id_pagamento)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela pedido
DROP TABLE IF EXISTS pedido;
CREATE TABLE pedido (
  id_pedido INT NOT NULL AUTO_INCREMENT,
  id_funcionario INT,
  id_pagamento INT,
  data_pedido DATE,
  hora_pedido TIME,
  PRIMARY KEY (id_pedido),
  FOREIGN KEY (id_funcionario) REFERENCES funcionario(id_funcionario),
  FOREIGN KEY (id_pagamento) REFERENCES pagamento(id_pagamento)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela pedido_pizza
DROP TABLE IF EXISTS pedido_pizza;
CREATE TABLE pedido_pizza (
  id_pedido INT,
  id_pizza INT,
  quantidade INT,
  FOREIGN KEY (id_pedido) REFERENCES pedido(id_pedido),
  FOREIGN KEY (id_pizza) REFERENCES pizza(id_pizza)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela pedido_bebida
DROP TABLE IF EXISTS pedido_bebida;
CREATE TABLE pedido_bebida (
  id_pedido INT,
  id_bebida INT,
  quantidade INT,
  FOREIGN KEY (id_pedido) REFERENCES pedido(id_pedido),
  FOREIGN KEY (id_bebida) REFERENCES bebida(id_bebida)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela cliente
DROP TABLE IF EXISTS cliente;
CREATE TABLE cliente (
  id_cliente INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  telefone VARCHAR(20),
  senha VARCHAR(255),
  PRIMARY KEY (id_cliente)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Inserir dados funcionario
INSERT INTO funcionario VALUES
(1, 'Carlos Silva', 'Manhã'),
(2, 'Ana Lima', 'Tarde'),
(3, 'José Souza', 'Noite'),
(4, 'Maria Oliveira', 'Manhã'),
(5, 'Pedro Santos', 'Tarde'),
(6, 'Joana Costa', 'Noite'),
(7, 'Rafael Almeida', 'Manhã'),
(8, 'Fernanda Rocha', 'Tarde'),
(9, 'Bruno Martins', 'Noite'),
(10, 'Laura Ribeiro', 'Manhã');

-- Inserir dados pizza
INSERT INTO pizza VALUES
(1, 'Calabresa', 35.00),
(2, 'Mussarela', 32.00),
(3, 'Frango com Catupiry', 38.00),
(4, 'Portuguesa', 37.00),
(5, 'Marguerita', 36.00),
(6, 'Quatro Queijos', 39.00),
(7, 'Pepperoni', 40.00),
(8, 'Vegetariana', 34.00),
(9, 'Bacon', 38.00),
(10, 'Napolitana', 35.00);

-- Inserir dados bebida
INSERT INTO bebida VALUES
(1, 'Coca-Cola 2L', 10.00),
(2, 'Guaraná 1,5L', 9.00),
(3, 'Água 500ml', 3.00),
(4, 'Suco de Laranja', 6.00),
(5, 'Cerveja Lata', 5.50),
(6, 'Fanta 2L', 9.50),
(7, 'Pepsi 2L', 9.00),
(8, 'Chá Gelado', 4.50),
(9, 'Sprite 2L', 9.50),
(10, 'Água com Gás', 3.50);

-- Inserir dados pagamento
INSERT INTO pagamento VALUES
(1, 'PIX'),
(2, 'Cartão'),
(3, 'Dinheiro'),
(4, 'Cartão'),
(5, 'PIX'),
(6, 'Dinheiro'),
(7, 'PIX'),
(8, 'Cartão'),
(9, 'Dinheiro'),
(10, 'PIX');

-- Inserir dados pedido
INSERT INTO pedido VALUES
(1, 1, 1, '2025-08-20', '12:30:00'),
(2, 2, 2, '2025-08-20', '13:10:00'),
(3, 3, 3, '2025-08-20', '18:45:00'),
(4, 4, 1, '2025-08-20', '11:50:00'),
(5, 5, 2, '2025-08-20', '14:20:00'),
(6, 6, 3, '2025-08-20', '19:10:00'),
(7, 7, 1, '2025-08-20', '10:05:00'),
(8, 8, 2, '2025-08-20', '15:35:00'),
(9, 9, 3, '2025-08-20', '20:40:00'),
(10, 10, 1, '2025-08-20', '09:15:00');

-- Inserir dados pedido_pizza
INSERT INTO pedido_pizza VALUES
(1, 1, 1),
(2, 3, 2),
(3, 5, 1),
(4, 2, 1),
(5, 4, 1),
(6, 6, 2),
(7, 7, 1),
(8, 8, 1),
(9, 9, 2),
(10, 10, 1);

-- Inserir dados pedido_bebida
INSERT INTO pedido_bebida VALUES
(1, 1, 1),
(2, 3, 2),
(3, 4, 1),
(4, 5, 1),
(5, 2, 1),
(6, 6, 2),
(7, 7, 1),
(8, 8, 1),
(9, 9, 2),
(10, 10, 1);

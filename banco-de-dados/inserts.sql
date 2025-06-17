DROP DATABASE IF EXISTS unialfa_eventos;
CREATE DATABASE unialfa_eventos CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE unialfa_eventos;

-- TABELAS
CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  ra INT(13) UNIQUE,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  senha VARCHAR(50) NOT NULL,
  tipo INT(11) NOT NULL DEFAULT 2
);

CREATE TABLE cursos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL
);

CREATE TABLE eventos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(100) NOT NULL,
  descricao TEXT,
  data DATE,
  hora TIME,
  local VARCHAR(100),
  idCurso INT,
  idUsuarios INT,
  FOREIGN KEY (idCurso) REFERENCES cursos(id),
  FOREIGN KEY (idUsuarios) REFERENCES usuarios(id)
);

CREATE TABLE inscricoes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  raUsuarios INT,
  idEvento INT,
  FOREIGN KEY (raUsuarios) REFERENCES usuarios(ra),
  FOREIGN KEY (idEvento) REFERENCES eventos(id)
);

CREATE TABLE certificados (
  id INT AUTO_INCREMENT PRIMARY KEY,
  idInscricao INT UNIQUE,
  FOREIGN KEY (idInscricao) REFERENCES inscricoes(id)
);

-- Cursos
INSERT INTO cursos (nome) VALUES
('Pedagogia'), ('Sistemas para Internet'), ('Direito');

-- Usuários
INSERT INTO usuarios (id, ra, nome, email, senha, tipo) VALUES
(NULL, NULL, 'Ana Souza', 'ana@gmail.com', 'aninha123', 2), (NULL, NULL, 'Carlos Lima', 'carlos@gmail.com', 'limoeiro50', 2), (NULL, NULL, 'Fernanda Torres', 'fernandaTorres@gmail.com', 'oscarQmePerdeu25', 2), (NULL, NULL, 'João Mendes', 'joão@gmail.com', 'joãoMendes21', 2), (NULL, NULL, 'Luciana Rocha', 'luciana@gmail.com', 'lucasPedra34', 2), (NULL, 1001, 'Gabriel Silva', 'gameplays@gmail.com', 'Gabs2876', 1),
(NULL, 1002, 'Mariana Oliveira', 'marizinha857@gmail.com', 'MariMaria908', 1);

-- Eventos
INSERT INTO eventos (titulo, descricao, data, hora, local, idCurso, idUsuarios) VALUES
('Introdução à Didática', 'Conceitos iniciais de didática.', '2025-06-20', '14:00:00', 'Auditório A', 1, 1),
('Direito Digital', 'Aspectos jurídicos na era digital.', '2025-06-22', '10:00:00', 'Sala 12', 3, 2),
('Front-end Moderno', 'Explorando HTML, CSS e JS modernos.', '2025-06-25', '09:00:00', 'Lab 5', 2, 3),
('Psicologia da Educação', 'Como a mente influencia o aprendizado.', '2025-06-27', '15:30:00', 'Sala 8', 1, 4),
('Legislação Trabalhista', 'Mudanças recentes na CLT.', '2025-06-28', '11:00:00', 'Sala 3', 3, 2),
('Desenvolvimento Web com PHP', 'PHP moderno e integração.', '2025-06-29', '16:00:00', 'Lab 3', 2, 3),
('Tecnologia na Educação', 'Ferramentas digitais em sala.', '2025-07-01', '10:00:00', 'Auditório B', 1, 5),
('Ética Profissional', 'Debate sobre ética no trabalho.', '2025-07-03', '13:00:00', 'Sala 2', 3, 1),
('UX e Acessibilidade', 'Tornando a web mais acessível.', '2025-07-04', '14:00:00', 'Lab UX', 2, 4),
('Educação Inclusiva', 'Ensino para todos.', '2025-07-05', '08:30:00', 'Sala 9', 1, 5);

-- Inscrições (exemplo)
INSERT INTO inscricoes (raUsuarios, idEvento) VALUES
(1001, 1), (1002, 3);

-- Certificados (exemplo)
INSERT INTO certificados (idInscricao) VALUES
(1), (2);
DROP DATABASE IF EXISTS unialfa_eventos;
CREATE DATABASE unialfa_eventos CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE unialfa_eventos;

-- Tabela de Usuários
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ra INT(13) UNIQUE NOT NULL,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(50) NOT NULL,
    tipo INT(11) NOT NULL DEFAULT 2  -- 0=Admin, 1=Palestrante, 2=Aluno
);

-- Tabela de Cursos
CREATE TABLE cursos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

-- Tabela de Eventos
CREATE TABLE eventos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    descricao TEXT,
    data DATE,
    hora TIME,
    local VARCHAR(100),
    imagem VARCHAR(255) NULL,
    idCurso INT,
    idUsuarios INT,
    FOREIGN KEY (idCurso) REFERENCES cursos(id),
    FOREIGN KEY (idUsuarios) REFERENCES usuarios(id)
);

-- Tabela de Inscrições
CREATE TABLE inscricoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    raUsuarios INT NOT NULL,
    idEvento INT NOT NULL,
    FOREIGN KEY (raUsuarios) REFERENCES usuarios(ra),
    FOREIGN KEY (idEvento) REFERENCES eventos(id)
);

-- Tabela de Certificados
CREATE TABLE certificados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idInscricao INT UNIQUE,
    FOREIGN KEY (idInscricao) REFERENCES inscricoes(id)
);

-- INSERTS INICIAIS

-- Cursos
INSERT INTO cursos (nome) VALUES
('Pedagogia'),
('Sistemas para Internet'),
('Direito');

-- Usuários (Todos com RA ÚNICO)
INSERT INTO usuarios (id, ra, nome, email, senha, tipo) VALUES
(NULL, 1003, 'Ana Souza', 'ana@gmail.com', '', 2),
(NULL, 1004, 'Carlos Lima', 'carlos@gmail.com', '', 2),
(NULL, 1005, 'Fernanda Torres', 'fernandaTorres@gmail.com', '', 2),
(NULL, 1006, 'João Mendes', 'joao@gmail.com', '', 2),
(NULL, 1007, 'Luciana Rocha', 'luciana@gmail.com', '', 2),
(NULL, 1001, 'Gabriel Silva', 'gameplays@gmail.com', '', 1),
(NULL, 1002, 'Mariana Oliveira', 'marizinha857@gmail.com', '', 1),
(NULL, 1111, 'admin', 'teste@teste.com', 'adminadmin', 0); -- Usuário Admin

-- Eventos (Já com imagens de exemplo)
INSERT INTO eventos (titulo, descricao, data, hora, local, imagem, idCurso, idUsuarios) VALUES
('Introdução à Didática', 'Conceitos iniciais de didática.', '2025-06-20', '14:00:00', 'Auditório A', 'workshop.jpg', 1, 1),
('Direito Digital', 'Aspectos jurídicos na era digital.', '2025-06-22', '10:00:00', 'Sala 12', 'direito-digital.jpg', 3, 2),
('Front-end Moderno', 'Explorando HTML, CSS e JS modernos.', '2025-06-25', '09:00:00', 'Lab 5', 'maratona.jpg', 2, 3),
('Psicologia da Educação', 'Como a mente influencia o aprendizado.', '2025-06-27', '15:30:00', 'Sala 8', NULL, 1, 4),
('Legislação Trabalhista', 'Mudanças recentes na CLT.', '2025-06-28', '11:00:00', 'Sala 3', NULL, 3, 2),
('Desenvolvimento Web com PHP', 'PHP moderno e integração.', '2025-06-29', '16:00:00', 'Lab 3', NULL, 2, 3),
('Tecnologia na Educação', 'Ferramentas digitais em sala.', '2025-07-01', '10:00:00', 'Auditório B', NULL, 1, 5),
('Ética Profissional', 'Debate sobre ética no trabalho.', '2025-07-03', '13:00:00', 'Sala 2', NULL, 3, 1),
('UX e Acessibilidade', 'Tornando a web mais acessível.', '2025-07-04', '14:00:00', 'Lab UX', NULL, 2, 4),
('Educação Inclusiva', 'Ensino para todos.', '2025-07-05', '08:30:00', 'Sala 9', NULL, 1, 5);

-- Inscrições (exemplo)
INSERT INTO inscricoes (raUsuarios, idEvento) VALUES
(1001, 1),
(1002, 3);

-- Certificados (exemplo)
INSERT INTO certificados (idInscricao) VALUES
(1),
(2);

-- Execute esse script no banco de dados GremioGerencia

CREATE TABLE gestao (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    nome       VARCHAR(100)  NOT NULL,          -- Ex: "Gestão Avante"
    periodo    VARCHAR(50)   NOT NULL,           -- Ex: "01/2024 - 11/2024"
    descricao  TEXT          NOT NULL,
    foto1      VARCHAR(255)  DEFAULT NULL,       -- nome do arquivo da imagem 1
    foto2      VARCHAR(255)  DEFAULT NULL,       -- nome do arquivo da imagem 2 (opcional)
    --ordem      INT           NOT NULL DEFAULT 0  -- 0 = mais recente (exibida aberta), 1, 2, 3...
    atual     TINYINT(1)   NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE integrante (
    id        INT AUTO_INCREMENT PRIMARY KEY,
    gestao_id INT           NOT NULL,
    cargo     VARCHAR(150)  NOT NULL,
    nome      VARCHAR(255)  NOT NULL,
    FOREIGN KEY (gestao_id) REFERENCES gestao(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exemplo de inserção (Gestão Avante — gestão mais recente, ordem = 0)
INSERT INTO gestao (nome, periodo, descricao, foto1, foto2, atual) VALUES
(
    'Gestão Avante',
    '01/2024 - 11/2024',
    'A Gestão Avante marcou um período de renovação e engajamento estudantil, promovendo eventos culturais, esportivos e ações de sustentabilidade no campus.',
    'avante1.jpeg',
    'avante2.jpeg',
    0
);

SET @gestao_id = LAST_INSERT_ID();

INSERT INTO integrante (gestao_id, cargo, nome) VALUES
(@gestao_id, 'Presidente', 'Caio Franco Gonçalves'),
(@gestao_id, 'Vice-Presidente', 'Ana Clara Soares Albuquerque'),
(@gestao_id, 'Diretor Geral', 'Cauan Hermógenes Abreu'),
(@gestao_id, '1° Tesoureira', 'Lorena Silva Talma'),
(@gestao_id, '2° Tesoureiro', 'Arthur Emanuel Soares Lopes'),
(@gestao_id, '1° Secretária', 'Giovana Bertoldo de Jesus'),
(@gestao_id, '2° Secretária', 'Júlia Vieira Nazário'),
(@gestao_id, 'Diretor de Esportes', 'Gustavo Costa Torrezani'),
(@gestao_id, 'Diretora de Políticas Educacionais', 'Clara Muniz de Oliveira Misquita'),
(@gestao_id, 'Diretor de Cultura', 'Gabriel de Miranda Franco Martins'),
(@gestao_id, 'Diretora de Projetos', 'Isabel de Andrade Martins'),
(@gestao_id, 'Diretoria de Comunicação', 'Ana Laura Valeriano de Paula e Henrique Lelis Costa'),
(@gestao_id, 'Diretora de Sociedade e Sustentabilidade', 'Ana Laura Silva Gonçalves'),
(@gestao_id, 'Diretoria de Políticas do Noturno', 'Isabelle Karoline Alberici Silva, Victor Gabriel Oliveira Vilela Dourado Figueiredo e Mateus Henrique Martins Silva');
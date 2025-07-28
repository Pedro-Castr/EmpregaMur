/* Insert na tabela de cargos */
INSERT INTO cargo (descricao) VALUES
('Auxiliar Administrativo'),
('Analista de Sistemas'),
('Desenvolvedor Front-End'),
('Desenvolvedor Back-End'),
('Designer Gráfico'),
('Técnico de Suporte'),
('Atendente de Loja'),
('Estagiário de Marketing'),
('Gerente de Projetos'),
('Operador de Telemarketing'),
('Vendedor Interno'),
('Assistente Financeiro'),
('Motorista'),
('Recepcionista'),
('Auxiliar de Limpeza');

/* Insert na tabela de estabelecimentos */
INSERT INTO estabelecimento (nome, endereco, latitude, longitude, email) VALUES
('TechSoft Solutions', 'Av. Paulista, 1000 - São Paulo, SP', '-23.561414', '-46.655881', 'contato@techsoft.com'),
('Mercado Ideal', 'Rua das Flores, 123 - Curitiba, PR', '-25.428356', '-49.273251', 'rh@mercadoideal.com.br'),
('Escritório Ágil', 'Rua dos Programadores, 45 - Belo Horizonte, MG', '-19.919055', '-43.938668', 'vagas@escritorioagil.com'),
('Clínica Vida Mais', 'Av. Brasil, 200 - Rio de Janeiro, RJ', '-22.906847', '-43.172896', 'contato@vidamais.com'),
('Construtora Forte Base', 'Rua das Palmeiras, 50 - Recife, PE', '-8.047562', '-34.877001', 'rh@fortebase.com.br'),
('EducaMais Centro de Ensino', 'Av. Universitária, 77 - Fortaleza, CE', '-3.731862', '-38.526669', 'vagas@educamais.com'),
('Café Central', 'Rua do Comércio, 12 - Porto Alegre, RS', '-30.034647', '-51.217658', 'contato@cafecentral.com'),
('DesignX Studio', 'Rua Criativa, 88 - Florianópolis, SC', '-27.595377', '-48.548050', 'jobs@designxstudio.com'),
('LogExpress Transportes', 'Rodovia BR-116, Km 23 - São Bernardo do Campo, SP', '-23.691548', '-46.564598', 'recursos@logexpress.com'),
('Saúde Total Hospitalar', 'Rua Saúde, 99 - Salvador, BA', '-12.971607', '-38.501610', 'curriculos@saudetotal.com.br');

/* Insert na tabela de pessoas físicas */
INSERT INTO pessoa_fisica (nome, cpf, visitante_id) VALUES
('João da Silva',        '12345678901', NULL),
('Maria Oliveira',       '23456789012', NULL),
('Carlos Eduardo Lima',  '34567890123', NULL),
('Fernanda Souza',       '45678901234', NULL),
('Lucas Martins',        '56789012345', NULL),
('Ana Beatriz Rocha',    '67890123456', NULL),
('Gabriel Costa',        '78901234567', NULL),
('Juliana Pereira',      '89012345678', NULL),
('Rodrigo Alves',        '90123456789', NULL),
('Larissa Fernandes',    '01234567890', NULL);

/* Insert na tabela de vagas */
INSERT INTO vaga (cargo_id, descricao, sobreaVaga, modalidade, vinculo, dtInicio, dtFim, estabelecimento_id, statusVaga) VALUES
(1, 'Auxiliar Administrativo', 'Atuar com atendimento ao público, organização de documentos e apoio geral nas rotinas administrativas.', 1, 1, '2025-06-01', '2025-07-01', 1, 1),
(2, 'Desenvolvedor Front-End', 'Desenvolvimento de interfaces web responsivas usando HTML, CSS, JavaScript e frameworks modernos.', 2, 2, '2025-06-10', '2025-08-10', 2, 1),
(3, 'Técnico de Suporte', 'Prestar suporte técnico a usuários internos, instalar e configurar equipamentos e redes.', 1, 1, '2025-06-15', '2025-07-15', 3, 1),
(4, 'Estagiário de Marketing', 'Auxílio na criação de campanhas, postagens em redes sociais e monitoramento de resultados.', 3, 1, '2025-06-20', '2025-09-20', 4, 1),
(5, 'Analista de Sistemas', 'Análise e desenvolvimento de sistemas conforme as demandas de negócio, documentação e testes.', 3, 1, '2025-06-18', '2025-08-18', 5, 1);

/* Insert na tabela de escolaridade */
INSERT INTO escolaridade (descricao) VALUES
('Ensino Fundamental Incompleto'),
('Ensino Fundamental Completo'),
('Ensino Médio Incompleto'),
('Ensino Médio Completo'),
('Ensino Técnico'),
('Ensino Superior Incompleto'),
('Ensino Superior Completo'),
('Pós-graduação'),
('Mestrado'),
('Doutorado');

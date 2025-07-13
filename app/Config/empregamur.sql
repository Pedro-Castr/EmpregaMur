CREATE DATABASE empregamur;
USE empregamur;

CREATE TABLE estabelecimento (
  estabelecimento_id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(50) NOT NULL,
  endereco VARCHAR(200) DEFAULT NULL,
  latitude CHAR(12) NOT NULL,
  longitude CHAR(12) NOT NULL,
  email VARCHAR(150) DEFAULT NULL,
  PRIMARY KEY (estabelecimento_id),
  FULLTEXT INDEX ft_busca (nome)
);

CREATE TABLE categoria_estabelecimento (
  categoria_estabelecimento_id INT NOT NULL AUTO_INCREMENT,
  estabelecimento_id INT NOT NULL,
  categoria_id INT NOT NULL,
  PRIMARY KEY (categoria_estabelecimento_id),
  INDEX idx_categoria_estabelecimento (estabelecimento_id, categoria_id),
  FOREIGN KEY (estabelecimento_id) REFERENCES estabelecimento (estabelecimento_id)
);

CREATE TABLE cidade (
  cidade_id INT NOT NULL AUTO_INCREMENT,
  cidade VARCHAR(200) NOT NULL,
  uf CHAR(2) NOT NULL,
  PRIMARY KEY (cidade_id)
);

CREATE TABLE pessoa_fisica (
  pessoa_fisica_id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(150) NOT NULL,
  cpf CHAR(11) DEFAULT NULL,
  visitante_id INT DEFAULT NULL,
  PRIMARY KEY (pessoa_fisica_id)
);

CREATE TABLE usuario (
  usuario_id INT NOT NULL AUTO_INCREMENT,
  pessoa_fisica_id INT NOT NULL,
  estabelecimento_id INT NOT NULL,
  nome VARCHAR(150) NOT NULL,
  login VARCHAR(50) DEFAULT NULL,
  senha VARCHAR(50) DEFAULT NULL,
  tipo CHAR(2) NOT NULL,
  foto_perfil VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (usuario_id),
  INDEX idx_pessoa_fisica (pessoa_fisica_id),
  FOREIGN KEY (pessoa_fisica_id) REFERENCES pessoa_fisica (pessoa_fisica_id),
  FOREIGN KEY (estabelecimento_id) REFERENCES estabelecimento (estabelecimento_id)
);

CREATE TABLE telefone (
  telefone_id INT NOT NULL AUTO_INCREMENT,
  estabelecimento_id INT DEFAULT NULL,
  usuario_id INT DEFAULT NULL,
  numero CHAR(11) NOT NULL,
  tipo ENUM('m', 'f') NOT NULL COMMENT 'M: móvel F: fixo',
  PRIMARY KEY (telefone_id),
  INDEX idx_estabelecimento (estabelecimento_id),
  INDEX idx_usuario (usuario_id),
  FOREIGN KEY (estabelecimento_id) REFERENCES estabelecimento (estabelecimento_id),
  FOREIGN KEY (usuario_id) REFERENCES usuario (usuario_id)
);

CREATE TABLE curriculum (
  curriculum_id INT NOT NULL AUTO_INCREMENT,
  pessoa_fisica_id INT NOT NULL,
  logradouro VARCHAR(60) NOT NULL,
  numero VARCHAR(10),
  complemento VARCHAR(20),
  bairro VARCHAR(50) NOT NULL,
  cep VARCHAR(8) NOT NULL,
  cidade_id INT NOT NULL,
  celular VARCHAR(11) NOT NULL,
  dataNascimento DATE NOT NULL,
  sexo CHAR(1) NOT NULL,
  foto VARCHAR(100),
  email VARCHAR(120) NOT NULL,
  apresentacaoPessoal TEXT,
  PRIMARY KEY (curriculum_id),
  INDEX idx_cidade (cidade_id),
  INDEX idx_pessoa_fisica (pessoa_fisica_id),
  FOREIGN KEY (cidade_id) REFERENCES cidade (cidade_id),
  FOREIGN KEY (pessoa_fisica_id) REFERENCES pessoa_fisica (pessoa_fisica_id)
);

CREATE TABLE escolaridade (
  escolaridade_id INT NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(50) NOT NULL,
  PRIMARY KEY (escolaridade_id)
);

CREATE TABLE curriculum_escolaridade (
  curriculum_escolaridade_id INT NOT NULL AUTO_INCREMENT,
  curriculum_curriculum_id INT NOT NULL,
  inicioMes INT NOT NULL,
  inicioAno INT NOT NULL,
  fimMes INT NOT NULL,
  fimAno INT NOT NULL,
  descricao VARCHAR(60) NOT NULL,
  instituicao VARCHAR(60) NOT NULL,
  cidade_id INT NOT NULL,
  escolaridade_id INT NOT NULL,
  PRIMARY KEY (curriculum_escolaridade_id),
  INDEX idx_cidade (cidade_id),
  INDEX idx_curriculum (curriculum_curriculum_id),
  INDEX idx_escolaridade (escolaridade_id),
  FOREIGN KEY (cidade_id) REFERENCES cidade (cidade_id),
  FOREIGN KEY (curriculum_curriculum_id) REFERENCES curriculum (curriculum_id),
  FOREIGN KEY (escolaridade_id) REFERENCES escolaridade (escolaridade_id)
);

CREATE TABLE cargo (
  cargo_id INT NOT NULL AUTO_INCREMENT,
  descricao VARCHAR(50) NOT NULL,
  PRIMARY KEY (cargo_id)
);

CREATE TABLE curriculum_experiencia (
  curriculum_experiencia_id INT NOT NULL AUTO_INCREMENT,
  curriculum_id INT NOT NULL,
  inicioMes INT NOT NULL,
  inicioAno INT NOT NULL,
  fimMes INT,
  fimAno INT,
  estabelecimento VARCHAR(60),
  cargo_id INT,
  cargoDescricao VARCHAR(50),
  atividadesExercidas TEXT,
  PRIMARY KEY (curriculum_experiencia_id),
  INDEX idx_curriculum (curriculum_id),
  INDEX idx_cargo (cargo_id),
  FOREIGN KEY (curriculum_id) REFERENCES curriculum (curriculum_id),
  FOREIGN KEY (cargo_id) REFERENCES cargo (cargo_id)
);

CREATE TABLE curriculum_qualificacao (
  curriculum_qualificacao_id INT NOT NULL AUTO_INCREMENT,
  curriculum_id INT NOT NULL,
  mes INT NOT NULL,
  ano INT NOT NULL,
  cargaHoraria INT NOT NULL,
  descricao VARCHAR(60) NOT NULL,
  estabelecimento VARCHAR(60) NOT NULL,
  PRIMARY KEY (curriculum_qualificacao_id),
  INDEX idx_curriculum (curriculum_id),
  FOREIGN KEY (curriculum_id) REFERENCES curriculum (curriculum_id)
);

CREATE TABLE vaga (
  vaga_id INT NOT NULL AUTO_INCREMENT,
  cargo_id INT NOT NULL,
  descricao VARCHAR(60) NOT NULL,
  sobreaVaga TEXT NOT NULL,
  modalidade INT NOT NULL,
  vinculo INT NOT NULL,
  dtInicio DATE NOT NULL,
  dtFim DATE NOT NULL,
  estabelecimento_id INT NOT NULL,
  statusVaga INT NOT NULL,
  PRIMARY KEY (vaga_id),
  INDEX idx_cargo (cargo_id),
  INDEX idx_estabelecimento (estabelecimento_id),
  FOREIGN KEY (cargo_id) REFERENCES cargo (cargo_id),
  FOREIGN KEY (estabelecimento_id) REFERENCES estabelecimento (estabelecimento_id)
);

CREATE TABLE vaga_curriculum (
  vaga_id INT NOT NULL,
  curriculum_id INT NOT NULL,
  dateCandidatura DATETIME NOT NULL,
  PRIMARY KEY (vaga_id, curriculum_id),
  INDEX idx_curriculum (curriculum_id),
  INDEX idx_vaga (vaga_id),
  FOREIGN KEY (vaga_id) REFERENCES vaga (vaga_id),
  FOREIGN KEY (curriculum_id) REFERENCES curriculum (curriculum_id)
);

CREATE TABLE termodeuso (
  id INT NOT NULL AUTO_INCREMENT,
  textoTermo LONGTEXT NOT NULL,
  statusRegistro INT NOT NULL DEFAULT 1,
  rascunho INT DEFAULT 1,
  usuario_id INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (usuario_id) REFERENCES usuario (usuario_id)
);

CREATE TABLE termodeusoaceite (
  termodeuso_id INT NOT NULL,
  usuario_id INT NOT NULL,
  dataHoraAceite DATETIME NOT NULL,
  PRIMARY KEY (termodeuso_id, usuario_id),
  INDEX idx_usuario (usuario_id),
  INDEX idx_termodeuso (termodeuso_id),
  FOREIGN KEY (termodeuso_id) REFERENCES termodeuso (usuario_id),
  FOREIGN KEY (usuario_id) REFERENCES usuario (usuario_id)
);

CREATE TABLE postagem (
  postagem_id INT NOT NULL AUTO_INCREMENT,
  usuario_id INT NOT NULL,
  texto TEXT NOT NULL,
  imagem_url VARCHAR(255),
  data_criacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (postagem_id),
  FOREIGN KEY (usuario_id) REFERENCES usuario (usuario_id)
);

CREATE TABLE postagem_reacao (
  postagem_id INT NOT NULL,
  usuario_id INT NOT NULL,
  reacao_tipo ENUM('curtir', 'amei', 'haha', 'estrela') NOT NULL,
  data_reacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (postagem_id, usuario_id),
  FOREIGN KEY (postagem_id) REFERENCES postagem (postagem_id),
  FOREIGN KEY (usuario_id) REFERENCES usuario (usuario_id)
);

CREATE TABLE usuariorecuperasenha (
  id INT NOT NULL AUTO_INCREMENT,
  usuario_id INT NOT NULL,
  chave varchar(250) NOT NULL,
  statusRegistro int NOT NULL DEFAULT '1' COMMENT '1=Ativo;2=Inativo',
  created_at datetime NOT NULL,
  updated_at datetime DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY chave (chave),
  KEY FK1_usuariorecuperacaosenha (usuario_id) USING BTREE,
  FOREIGN KEY (usuario_id) REFERENCES usuario (usuario_id),
);

/*
Alterações feitas até agora:

1. Criação das tabelas postagem e psotagem_reacao, para guardar informações do feed.

2. Adição dos campos foto_perfil e nome na tabela de usuario.

3. Relacionamento entre a tabela de estabelecimento com a tabela de usuario.

4. Alteração do campo senha na tabela usuario para VARCHAR(255), para comportar o hash da senha criada.

5. Criei a tabela usuariorecuperasenha, para salvar as alterações de senha realizadas.
*/

-- MySQL Workbench Synchronization
-- Generated: 2017-08-11 00:50
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Juaka

CREATE SCHEMA IF NOT EXISTS cooperativa2 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

CREATE TABLE IF NOT EXISTS cooperativa2.endereco (
  id INT(11) NOT NULL AUTO_INCREMENT,
  rua VARCHAR(45) NULL DEFAULT NULL,
  numero INT(11) NULL DEFAULT NULL,
  bairro VARCHAR(45) NULL DEFAULT NULL,
  cidade VARCHAR(45) NULL DEFAULT NULL,
  uf CHAR(2) NULL DEFAULT NULL,
  PRIMARY KEY (id))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS cooperativa2.administrador (
  cpf CHAR(11) NOT NULL,
  nome VARCHAR(45) NOT NULL,
  telefone VARCHAR(45) NOT NULL,
  senha VARCHAR(45) NOT NULL,
  endereco_id INT(11) NOT NULL,
  PRIMARY KEY (cpf),
  INDEX fk_pessoa_endereco_idx (endereco_id ASC),
  CONSTRAINT fk_pessoa_endereco
    FOREIGN KEY (endereco_id)
    REFERENCES cooperativa2.endereco (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS cooperativa2.empresa (
  cnpj CHAR(14) NOT NULL,
  razao VARCHAR(45) NOT NULL,
  endereco_id INT(11) NOT NULL,
  PRIMARY KEY (cnpj),
  INDEX fk_empresa_endereco1_idx (endereco_id ASC),
  CONSTRAINT fk_empresa_endereco1
    FOREIGN KEY (endereco_id)
    REFERENCES cooperativa2.endereco (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS cooperativa2.colaborador (
  cpf CHAR(11) NOT NULL,
  nome VARCHAR(45) NOT NULL,
  telefone VARCHAR(45) NOT NULL,
  senha VARCHAR(45) NULL DEFAULT NULL,
  endereco_id INT(11) NOT NULL,
  PRIMARY KEY (cpf),
  INDEX fk_pessoa_endereco_idx (endereco_id ASC),
  CONSTRAINT fk_pessoa_endereco0
    FOREIGN KEY (endereco_id)
    REFERENCES cooperativa2.endereco (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS cooperativa2.observacao (
  id INT(11) NOT NULL AUTO_INCREMENT,
  data DATE NOT NULL,
  descricao VARCHAR(45) NOT NULL,
  endereco_id INT(11) NOT NULL,
  col_cpf CHAR(11) NOT NULL,
  lida TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  INDEX fk_observacao_endereco1_idx (endereco_id ASC),
  INDEX fk_observacao_colaborador1_idx (col_cpf ASC),
  CONSTRAINT fk_observacao_endereco1
    FOREIGN KEY (endereco_id)
    REFERENCES cooperativa2.endereco (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_observacao_colaborador1
    FOREIGN KEY (col_cpf)
    REFERENCES cooperativa2.colaborador (cpf)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS cooperativa2.colaboracao (
  id INT(11) NOT NULL AUTO_INCREMENT,
  funcao VARCHAR(45) NOT NULL,
  data DATE NOT NULL,
  descricao VARCHAR(45) NOT NULL,
  col_cpf CHAR(11) NOT NULL,
  PRIMARY KEY (id),
  INDEX fk_colaboracao_colaborador1_idx (col_cpf ASC),
  CONSTRAINT fk_colaboracao_colaborador1
    FOREIGN KEY (col_cpf)
    REFERENCES cooperativa2.colaborador (cpf)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS cooperativa2.encaminhamento (
  id INT(11) NOT NULL AUTO_INCREMENT,
  data DATE NOT NULL,
  descricao VARCHAR(45) NOT NULL,
  empresa_cnpj CHAR(14) NOT NULL,
  PRIMARY KEY (id),
  INDEX fk_encaminhamento_empresa1_idx (empresa_cnpj ASC),
  CONSTRAINT fk_encaminhamento_empresa1
    FOREIGN KEY (empresa_cnpj)
    REFERENCES cooperativa2.empresa (cnpj)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS cooperativa2.doador (
  cpf CHAR(11) NOT NULL,
  nome VARCHAR(45) NOT NULL,
  telefone VARCHAR(45) NOT NULL,
  senha VARCHAR(45) NULL DEFAULT NULL,
  endereco_id INT(11) NOT NULL,
  PRIMARY KEY (cpf),
  INDEX fk_pessoa_endereco_idx (endereco_id ASC),
  CONSTRAINT fk_pessoa_endereco1
    FOREIGN KEY (endereco_id)
    REFERENCES cooperativa2.endereco (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS cooperativa2.doacao (
  id INT(11) NOT NULL AUTO_INCREMENT,
  data DATE NOT NULL,
  descricao VARCHAR(45) NOT NULL,
  doador_cpf CHAR(11) NOT NULL,
  PRIMARY KEY (id),
  INDEX fk_doacao_doador1_idx (doador_cpf ASC),
  CONSTRAINT fk_doacao_doador1
    FOREIGN KEY (doador_cpf)
    REFERENCES cooperativa2.doador (cpf)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS cooperativa2.diaria (
  data DATE NOT NULL,
  col_cpf CHAR(11) NOT NULL,
  INDEX fk_diaria_colaborador1_idx (col_cpf ASC),
  PRIMARY KEY (data, col_cpf),
  CONSTRAINT fk_diaria_colaborador1
    FOREIGN KEY (col_cpf)
    REFERENCES cooperativa2.colaborador (cpf)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;
CREATE DATABASE  IF NOT EXISTS projetoTimes;

USE projetoTimes;


CREATE TABLE atleta (
  id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nome varchar(60) NOT NULL,
  salario decimal(10,2) NOT NULL,
  idade int NOT NULL,
  altura decimal(3,2) NOT NULL,
  peso decimal(4,1) NOT NULL,
);


CREATE TABLE time (
  id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nome varchar(60) NOT NULL,
  cidade varchar(60) NOT NULL,
  qntVitoria int NOT NULL,
  anoFundacao int NOT NULL,
  treinador_id int NOT NULL,
  KEY `fk_time_treinador_idx` (`treinador_id`),
  CONSTRAINT `fk_time_treinador` FOREIGN KEY (`treinador_id`) REFERENCES `treinador` (`id`)
);


CREATE TABLE atletaTime (
  idAtlet int NOT NULL,
  idTime int NOT NULL,
  KEY `fk_atletaTime_atleta1_idx` (`idAtleta`),
  KEY `fk_atletaTime_time1_idx` (`idTime`),
  CONSTRAINT `fk_atletaTime_atleta1` FOREIGN KEY (`idAtleta`) REFERENCES `atleta` (`id`),
  CONSTRAINT `fk_atletaTime_time1` FOREIGN KEY (`idTime`) REFERENCES `time` (`id`)
);


CREATE TABLE treinador (
  id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nome varchar(60) NOT NULL,
  qntVitorio int NOT NULL,
  bonusSalario decimal(10,2) NOT NULL,
);
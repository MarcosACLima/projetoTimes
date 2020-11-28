CREATE DATABASE projetoTimes;

USE projetoTimes;


CREATE TABLE atleta (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nome VARCHAR(60) NOT NULL,
  salario DECIMAL(10,2) NOT NULL,
  idade INT NOT NULL,
  altura DECIMAL(3,2) NOT NULL,
  peso DECIMAL(4,1) NOT NULL
);

CREATE TABLE treinador (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nome VARCHAR(60) NOT NULL,
  salario DECIMAL(10,2) NOT NULL,
  qntVitorio INT NOT NULL,
  bonusSalario DECIMAL(10,2) NOT NULL
);

CREATE TABLE time (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nome VARCHAR(60) NOT NULL,
  cidade VARCHAR(60) NOT NULL,
  qntVitoria INT NOT NULL,
  anoFundacao INT NOT NULL,
  idTreinador INT NOT NULL,
  CONSTRAINT fk_time_treinador FOREIGN KEY(idTreinador) REFERENCES treinador (id)
);

CREATE TABLE atletaTime (
  idAtleta INT NOT NULL,
  idTime INT NOT NULL,
  CONSTRAINT fk_atletaTime_atleta FOREIGN KEY(idAtleta) REFERENCES atleta(id),
  CONSTRAINT fk_atletaTime_time FOREIGN KEY(idTime) REFERENCES time(id)
);


INSERT INTO atleta VALUES (1,'Marcos',20750.35,20,1.88,78.9),(2,'Ronaldo',55745.65,23,1.83,82.2),(3,'Ricardo',45753.15,25,1.80,80.2),(4,'Tostao',47651.50,28,1.82,90.5),(5,'Mauro Silva',47651.50,26,1.82,90.5),(6,'Ademir',5632.65,34,1.69,75.5),(7,'Luiz',12555.00,31,1.89,74.5),(8,'Agenor',147520.00,26,1.85,88.4);

INSERT INTO treinador VALUES (1,'Felipe',20433.00,35,6000.00),(2,'Renato',25666.43,23,4580.75),(3,'Jorge Morinho',4000.50,17,1300.50),(4,'Raimundo',44256.13,45,10000.00);

INSERT INTO time VALUES (1,'Tabajara','Rio de Janeiro',18,1980,1),(2,'Real Dev','Sao Bento',26,1951,2),(3,'Ajax','Campinas',25,1910,4),(4,'Time Verde','Itapaci',25,1969,3);

INSERT INTO atletaTime VALUES (1,1),(2,2),(3,2),(4,1),(7,3),(7,4),(8,3),(8,4);
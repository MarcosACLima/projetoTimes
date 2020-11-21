<?php

    require_once "../db/conexao.php";
    require_once "../model/atleta.php";

    class AtletaDao {

        private $conexao;
        
        public function __construct(Conexao $conexao) {
            $this->conexao = $conexao->conectar();
        }

        public function salvar(Atleta $atleta) {
            if($atleta->__get('id') == 0) {
                $sql = 'INSERT INTO atleta (nome, salario, idade, altura, peso) VALUES (:nome, :salario, :idade, :altura, :peso)';
            } else {
                $sql = 'UPDATE atleta SET nome = :nome, salario = :salario, idade = :idade, altura = :altura, peso = :peso WHERE id = :id';
            }
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':nome', $atleta->__get('nome'));
            $stmt->bindValue(':salario', $atleta->__get('salario'));
            $stmt->bindValue(':idade', $atleta->__get('idade'));
            $stmt->bindValue(':altura', $atleta->__get('altura'));
            $stmt->bindValue(':peso', $atleta->__get('peso'));
            if($atleta->__get('id') != 0) {
                $stmt->bindValue(':id', $atleta->__get('id'));
            }
            $stmt->execute();
        }

        public function pesquisarId($id) {
            $sql = 'SELECT * FROM atleta WHERE id = :id';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_OBJ);
            $atleta = new Atleta($resultado->nome, $resultado->idade);
            $atleta->__set('id', $resultado->id);
            $atleta->__set('altura', $resultado->altura);
            $atleta->__set('peso', $resultado->peso);
            $atleta->__set('salario', $resultado->salario);
            return $atleta; 
        }

        public function pesquisarNome($nome) {

        }

        public function listarTudo() {
            $sql = 'SELECT * FROM atleta';
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();

            $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
            $atletas = array();

            foreach ($resultados as $id => $objeto) {
                $atleta = new Atleta($objeto->nome, $objeto->idade);
                $atleta->__set('id', $objeto->id);
                $atleta->__set('altura', $objeto->altura);
                $atleta->__set('peso', $objeto->peso);
                $atleta->__set('salario', $objeto->salario);
                $atletas[] = $atleta;
            }
            return $atletas;
        }
  
    }

?>
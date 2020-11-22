<?php

    class TimeDao {

        private $conexao;

        public function __construct(Conexao $conexao) {
            $this->conexao = $conexao->conectar();
        }

        public function salvar($time) {
    
        }

        private function addAtleta($time) {
    
        }

        public function pesquisarId($id) {
            $sql = 'SELECT * FROM time WHERE id = :id';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            
            $resultado = $stmt->fetch(PDO::FETCH_OBJ);
            
            $conexao = new Conexao();
            $treinadorDao = new TreinadorDao($conexao);
            $atletaDao = new AtletaDao($conexao);
            
            $treinador = $treinadorDao->pesquisarId($resultado->idTreinador);
            $atletas = $atletaDao->pesquisarAtletas($resultado->id);

            $time = new Time($resultado->nome, $resultado->cidade, $treinador, $atletas);
            $time->__set('id', $resultado->id);
            $time->__set('qntVitoria', $resultado->qntVitoria);
            $time->__set('anoFundacao', $resultado->anoFundacao);
            return $time;
        }

        public function pesquisarNome($nome) {
            $sql = 'SELECT * FROM time WHERE nome = :nome';
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':nome', $nome);
            $stmt->execute();
            
            $resultado = $stmt->fetch(PDO::FETCH_OBJ);
            
            $conexao = new Conexao();
            $treinadorDao = new TreinadorDao($conexao);
            $atletaDao = new AtletaDao($conexao);
            
            $treinador = $treinadorDao->pesquisarId($resultado->idTreinador);
            $atletas = $atletaDao->pesquisarAtletas($resultado->id);

            $time = new Time($resultado->nome, $resultado->cidade, $treinador, $atletas);
            $time->__set('id', $resultado->id);
            $time->__set('qntVitoria', $resultado->qntVitoria);
            $time->__set('anoFundacao', $resultado->anoFundacao);
            return $time;
        }

        public function listarTudo() {
            $sql = 'SELECT * FROM time';
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();

            $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
            $times = array();

            $conexao = new Conexao();
            $treinadorDao = new TreinadorDao($conexao);
            $atletaDao = new AtletaDao($conexao);

            foreach ($resultados as $id => $objeto) {
                $treinador = $treinadorDao->pesquisarId($objeto->idTreinador);
                $atletas = $atletaDao->pesquisarAtletas($objeto->id);
                
                $time = new Time($objeto->nome, $objeto->cidade, $treinador, $atletas);
                $time->__set('id', $objeto->id);
                $time->__set('qntVitoria', $objeto->qntVitoria);
                $time->__set('anoFundacao', $objeto->anoFundacao);

                $times[] = $time;
            }
            return $times;
        }

    }


?>
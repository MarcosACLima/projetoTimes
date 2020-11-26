<?php

    require_once "../model/time.php";
    require_once "../db/conexao.php";
    require_once "../model/treinador.php";
    require_once "../dao/treinadorDao.php";
    require_once "../dao/atletaDao.php";

    class TimeDao {

        private $conexao;

        public function __construct(Conexao $conexao) {
            $this->conexao = $conexao->conectar();
        }

        // inserindo e  alterar
        public function salvar($time) {
            if($time->__get('id') == 0) {
                $sql = 'INSERT INTO time (nome, cidade, qntVitoria, anoFundacao, idTreinador) VALUES (:nome, :cidade, :qntVitoria, :anoFundacao, :idTreinador)';
            } else {
                $sql = 'UPDATE time SET nome = :nome, cidade = :cidade, qntVitoria = :qntVitoria, anoFundacao = :anoFundacao, idTreinador = :idTreinador WHERE id = :id';
            }

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':nome', $time->__get('nome'));
            $stmt->bindValue(':cidade', $time->__get('cidade'));
            $stmt->bindValue(':qntVitoria', $time->__get('qntVitoria'));
            $stmt->bindValue(':anoFundacao', $time->__get('anoFundacao'));

            $treinador = $time->__get('treinador');

            $stmt->bindValue(':idTreinador', $treinador->__get('id'));
            
            if($time->__get('id') != 0) {
                $stmt->bindValue(':id', $time->__get('id'));
            }
            
            $stmt->execute();       

            $time->__set('id', $this->conexao->lastInsertId());
            $this->addAtletas($time);

            return $time;
        }

        // gravar os dados dentro da tabela atletaTime.
        private function addAtletas(Time $time) {
            foreach($time->__get('atletas') as $atleta => $objeto) {
                $sql = "INSERT INTO atletaTime(idTime, idAtleta) VALUES (:idTime, :idAtleta)";
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(':idTime', $time->__get('id'));
                $stmt->bindValue(':idAtleta', $objeto->id);
                $stmt->execute();
            }
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
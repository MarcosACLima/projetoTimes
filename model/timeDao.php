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
    
        }

        public function pesquisarNome($nome) {
    
        }

        public function listarTudo() {
        //     $sql = 'SELECT * FROM time';
        //     $stmt = $this->conexao->prepare($sql);
        //     $stmt->execute();

        //     $resultados = $stmt->fetchAll(PDO::FETCH_OBJ); // array de aluno?
        //     $times = array();

        //     $conexao = new Conexao();
        //     $treinadorDao = new TreinadorDao($conexao);
        //     foreach ($resultados as $id => $objeto) {
        //         $treinador = $treinadorDao->pesquisarId($objeto->idTreinador);
        //         $time = new Time($situacao, $objeto->nome);
        //         $aluno->__set('id', $objeto->id);
        //         $aluno->__set('dataCadastro', $objeto->dataCadastro);
        //         $alunos[] = $aluno;
        //     }
        //     return $alunos;
        }

    }


?>
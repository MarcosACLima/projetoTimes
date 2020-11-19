<?php

    require_once "../db/conexao.php";
    require_once "../model/atleta.php";

    class AtletaDao {

        private $conexao;
        
        public function __construct(Conexao $conexao) {
            $this->conexao = $conexao->conectar();
        }

        public function salvar($atleta) {

        }

        public function pesquisarId($id) {

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
                $atletas[] = $atleta;
            }
            return $atletas;
        }
  
    }

?>
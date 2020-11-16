<?php
    class Conexao {
        private $host = 'localhost'; //para xampp ou instalação separada, substituir por 'localhost'
        private $db = 'projetoTimes';
        private $usuario = 'marcos';
        private $senha = '123456'; //altere a senha de acordo com seu ambiente de desenvolvimento

        public function conectar() {
            try {
                $conexao = new PDO(
                    "mysql:host=$this->host;dbname=$this->db",
                    "$this->usuario", "$this->senha"
                );
                return $conexao;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>

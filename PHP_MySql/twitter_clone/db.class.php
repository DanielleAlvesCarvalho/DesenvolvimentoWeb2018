<?php

    class Db{

        private $host = 'localhost';
        private $user = 'root';
        private $password = '';
        private $db = 'twitter_clone';

        public function conectaDb(){
            $conn = mysqli_connect($this->host, $this->user, $this->password, $this->db);

            mysqli_set_charset($conn, 'utf-8');

            if(mysqli_connect_errno()){
                echo "Erro na conexão com o banco de dados: ".mysqli_connect_error();
            }

            return $conn;
        }

    }

?>
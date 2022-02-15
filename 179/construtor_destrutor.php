<?php

//construct e desctruct são chamados de métodos mágicos
class Pessoa{

    private $nome;

    public function correr(){
        echo $this->nome . " correndo<br>";
    }

    function __construct($parametro_nome){
        $this->nome = $parametro_nome;
        echo "Construtor Iniciado <br>Nome: ".$this->nome."<br>";
    }

    function __destruct(){
        echo "Objeto removido<br>";
    }
}

$pessoa = new Pessoa('Danielle');
$pessoa->correr();
?>
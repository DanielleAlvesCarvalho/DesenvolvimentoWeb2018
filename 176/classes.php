<?php

class Pessoa{
    //Atributos
    var $nome;

    //Métodos
    function setNome($nome_definido){
        //$this é usado para acessar um atributo ou método dentro da mesma classe 
        $this->nome = $nome_definido;
    }

    function getNome(){
        return $this->nome;
    }
}

$pessoa = new Pessoa();

$pessoa->setNome('Danielle');
echo $pessoa->getNome();

?>
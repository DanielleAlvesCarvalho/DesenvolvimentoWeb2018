<?php

//Classe mãe ou superclasse
class Felino{

    var $mamifero = 'sim';
    
    function Correr(){
        echo 'Correr como felino';
    }

}

//Classe filha ou supclasse
class Chita extends Felino{

    //Polimorfismo
    function Correr(){
        echo 'Correr como chita 100KM/h';
    }
}

class Gato extends Felino{

}

$chita = new Chita();

echo $chita->mamifero.'<br>';

echo $chita->Correr();

?>
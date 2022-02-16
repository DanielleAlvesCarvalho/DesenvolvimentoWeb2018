<?php

    require_once 'db.class.php';

    $sql = " SELECT * FROM usuarios";

    $db = new Db();
    $conn = $db->conectaDb();

    $resultado = mysqli_query($conn, $sql);

    if($resultado){
        $dados_usuario = [];

        while($linha = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            $dados_usuario[] = $linha;
        }

        foreach($dados_usuario as $usuario){
            var_dump($usuario);
            echo '<br /><br />';
        }
        
    } else {
        echo "Erro na execução da consulta";
    }

?>
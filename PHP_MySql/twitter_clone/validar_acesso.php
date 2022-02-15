<?php

    require_once 'db.class.php';

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    $sql = " select * from usuarios where usuario = '$usuario' and senha = '$senha' ";

    $db = new Db();
    $conn = $db->conectaDb();

    $resultado = mysqli_query($conn, $sql);

    if($resultado){
        $dados_usuario = mysqli_fetch_array($resultado);
        if(isset($dados_usuario["usuario"])){
            echo "usuario existe";
        } else {
            header('Location: index.php?erro=1');
        }
    } else {
        echo "Erro na execução da consulta";
    }


    

?>
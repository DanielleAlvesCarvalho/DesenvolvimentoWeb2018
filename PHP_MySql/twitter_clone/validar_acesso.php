<?php

    session_start();

    require_once 'db.class.php';

    $usuario = $_POST["usuario"];
    $senha = md5($_POST["senha"]);

    $sql = " SELECT id, usuario, email FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' ";

    $db = new Db();
    $conn = $db->conectaDb();

    $resultado = mysqli_query($conn, $sql);

    if($resultado){
        $dados_usuario = mysqli_fetch_array($resultado);
        if(isset($dados_usuario["usuario"])){

            $_SESSION['id_usuario'] = $dados_usuario['id'];
            $_SESSION['usuario'] = $dados_usuario['usuario'];
            $_SESSION['email'] = $dados_usuario['email'];

            header('Location: home.php');
            
        } else {
            header('Location: index.php?erro=1');
        }
    } else {
        echo "Erro na execução da consulta";
    }


    

?>
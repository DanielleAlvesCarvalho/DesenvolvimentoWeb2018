<?php

    require_once 'db.class.php';

    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $db = new Db();
    $conn = $db->conectaDb();

    $sql = " insert into usuarios(usuario, email, senha) values ('$usuario','$email','$senha')";

    if(mysqli_query($conn, $sql)){
        echo "Usuario registrado com sucesso";
    } else {
        echo "Erro ao registrar usuario";
    }

?>
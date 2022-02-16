<?php

    require_once 'db.class.php';

    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $db = new Db();
    $conn = $db->conectaDb();

    $sql = " INSERT INTO usuarios(usuario, email, senha) VALUES ('$usuario','$email','$senha')";

    if(mysqli_query($conn, $sql)){
        echo "Usuario registrado com sucesso";
    } else {
        echo "Erro ao registrar usuario";
    }

?>
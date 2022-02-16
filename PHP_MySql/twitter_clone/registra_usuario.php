<?php

    require_once 'db.class.php';

    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);

    $db = new Db();
    $conn = $db->conectaDb();

    $sql = " SELECT usuario, email FROM usuarios WHERE usuario = '$usuario' ";

    if($resultado = mysqli_query($conn, $sql)){
        $dados_usuario = mysqli_fetch_array($resultado);

        if(isset($dados_usuario["usuario"])){
            echo 'Usuário já cadastrado';
            die();
        }
    } else {
        echo "Erro ao tentar localizar o registro";
    }

    $sql = " SELECT usuario, email FROM usuarios WHERE email = '$email' ";

    if($resultado = mysqli_query($conn, $sql)){
        $dados_usuario = mysqli_fetch_array($resultado);

        if(isset($dados_usuario["email"])){
            echo 'E-mail já cadastrado';
            die();
        }
    } else {
        echo "Erro ao tentar localizar o registro";
    }

    $sql = " INSERT INTO usuarios(usuario, email, senha) VALUES ('$usuario','$email','$senha')";

    if(mysqli_query($conn, $sql)){
        echo "Usuario registrado com sucesso";
    } else {
        echo "Erro ao registrar usuario";
    }

?>
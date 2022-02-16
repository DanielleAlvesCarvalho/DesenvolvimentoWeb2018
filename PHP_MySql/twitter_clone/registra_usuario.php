<?php

    require_once 'db.class.php';

    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);

    $db = new Db();
    $conn = $db->conectaDb();

    $usuario_existe = false;
    $email_existe = false;

    $sql = " SELECT usuario, email FROM usuarios WHERE usuario = '$usuario' ";

    if($resultado = mysqli_query($conn, $sql)){
        $dados_usuario = mysqli_fetch_array($resultado);

        if(isset($dados_usuario["usuario"])){
            $usuario_existe = true;
        }
    } else {
        echo "Erro ao tentar localizar o registro";
    }

    $sql = " SELECT usuario, email FROM usuarios WHERE email = '$email' ";

    if($resultado = mysqli_query($conn, $sql)){
        $dados_usuario = mysqli_fetch_array($resultado);

        if(isset($dados_usuario["email"])){
            $email_existe = true;
        }
    } else {
        echo "Erro ao tentar localizar o registro";
    }

    if($usuario_existe || $email_existe){

        $retorno_get = '';

        if($usuario_existe){
            $retorno_get .= 'erro_usuario=1&';
        }

        if($email_existe){
            $retorno_get .= 'erro_email=1&';
        }

        header('Location: inscrevase.php?'.$retorno_get);
        die();
    }

    $sql = " INSERT INTO usuarios(usuario, email, senha) VALUES ('$usuario','$email','$senha')";

    if(mysqli_query($conn, $sql)){
        echo "Usuario registrado com sucesso";
    } else {
        echo "Erro ao registrar usuario";
    }

?>
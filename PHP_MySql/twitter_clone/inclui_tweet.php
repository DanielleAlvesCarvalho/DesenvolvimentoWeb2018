<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        header('Location: index.php?erro=1');
    }

    require_once 'db.class.php';

    $db = new Db();
    $conn = $db->conectaDb();

    $text_tweet = $_POST['text_tweet'];
    $id_usuario = $_SESSION['id_usuario'];

    if($text_tweet == '' || $id_usuario == '') die();

    $sql = " INSERT INTO tweet(id_usuario, tweet) VALUES ($id_usuario, '$text_tweet')";

    if($resultado = mysqli_query($conn, $sql)){
        
    } else {
        echo "Erro ao inserir o tweet". $sql;
    }

?>
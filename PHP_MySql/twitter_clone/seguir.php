<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        header('Location: index.php?erro=1');
    }

    require_once 'db.class.php';

    if($seguir_id_usuario == '' || $id_usuario == '') die();

    $db = new Db();
    $conn = $db->conectaDb();

    $seguir_id_usuario = $_POST['seguir_id_usuario'];
    $id_usuario = $_SESSION['id_usuario'];


    $sql = " INSERT INTO usuarios_seguidores(id_usuario, seguindo_id_usuario) VALUES ($id_usuario, $seguir_id_usuario)";

    if($resultado = mysqli_query($conn, $sql)){
        
    } else {
        echo "Erro ao seguir usuário". $sql;
    }

?>
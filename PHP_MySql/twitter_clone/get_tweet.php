<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        header('Location: index.php?erro=1');
    }

    require_once 'db.class.php';

    $db = new Db();
    $conn = $db->conectaDb();

    $id_usuario = $_SESSION['id_usuario'];

    if($id_usuario == '') die();

    $sql = " SELECT * FROM tweet WHERE id_usuario = $id_usuario ORDER BY data_inclusao DESC ";

    if($resultado = mysqli_query($conn, $sql)){
        
        while($tweets = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            var_dump($tweets);
            echo '<br /><br />';
        }

    } else {
        echo "Erro ao recuperar os tweets";
    }

?>
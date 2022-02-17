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

    $sql  = " SELECT DATE_FORMAT(T.data_inclusao, '%d %b %Y %T') data_inclusao, T.tweet, U.usuario FROM tweet T JOIN usuarios U ON (T.id_usuario = U.id)";
    $sql .= " WHERE id_usuario = $id_usuario";
    $sql .= " OR id_usuario IN (SELECT seguindo_id_usuario FROM usuarios_seguidores WHERE id_usuario = $id_usuario)";
    $sql .= " ORDER BY data_inclusao DESC";

    if($resultado = mysqli_query($conn, $sql)){
        
        while($tweets = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            echo "<a href='' class='list-group-item'>";
                echo "<h4 class='list-group-item-heading'>".$tweets['usuario']." <small> - ". $tweets['data_inclusao'] ."</small></h4>";
                echo "<p class='list-group-item-text'>".$tweets['tweet']."</p>";
            echo "</a>";
        }

    } else {
        echo "Erro ao recuperar os tweets";
    }

?>
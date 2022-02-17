<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        header('Location: index.php?erro=1');
    }

    require_once 'db.class.php';

    $db = new Db();
    $conn = $db->conectaDb();

    $nome_pessoa = $_POST['nome_pessoa'];
    $id_usuario = $_SESSION['id_usuario'];

    if($id_usuario == '') die();

    $sql = " SELECT u.*, us.* FROM usuarios u ";
    $sql .= "LEFT JOIN usuarios_seguidores us ";
    $sql .= "ON (us.id_usuario = $id_usuario AND u.id = us.seguindo_id_usuario) ";
    $sql .= "WHERE usuario LIKE '%$nome_pessoa%' AND id <> $id_usuario ";

    if($resultado = mysqli_query($conn, $sql)){
        
        while($pessoas = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            echo "<a class='list-group-item'>";
                echo "<strong>".$pessoas['usuario']."</strong> - <small>".$pessoas['email']."</small>";
                echo "<p class='list-group-item-text pull-right'>";

                    $esta_seguind_usuario_sn = isset($pessoas['id_usuario_seguidor']) && !empty($pessoas['id_usuario_seguidor']) ? "s" : "n";

                    if($esta_seguind_usuario_sn == "n"){
                        $btn_seguir_display = 'block';
                        $btn_deixar_seguir_display = 'none';
                    } else {
                        $btn_seguir_display = 'none';
                        $btn_deixar_seguir_display = 'block';
                    }

                    echo "<button type='button' id='btn_seguir_".$pessoas['id']."' class='btn btn-default btn_seguir' data-id_usuario=".$pessoas['id']." style='display: ".$btn_seguir_display.";'>Seguir</button>";
                    echo "<button type='button' id='btn_deixar_seguir_".$pessoas['id']."' class='btn btn-primary btn_deixar_seguir' data-id_usuario=".$pessoas['id']." style='display: ".$btn_deixar_seguir_display.";'>Deixar de Seguir</button>";
                echo "</p>";
                echo "<div class='clearfix'></div>";
            echo "</a>";
        }

    } else {
        echo "Erro ao procurar pessoas";
    }

?>
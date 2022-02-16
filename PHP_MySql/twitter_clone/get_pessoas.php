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

    $sql = " SELECT * FROM usuarios WHERE usuario LIKE '%$nome_pessoa%' AND id <> $id_usuario ";

    if($resultado = mysqli_query($conn, $sql)){
        
        while($pessoas = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            echo "<a href='' class='list-group-item'>";
                echo "<strong>".$pessoas['usuario']."</strong> - <small>".$pessoas['email']."</small>";
                echo "<p class='list-group-item-text pull-right'>";
                    echo "<button type='button' class='btn btn-primary'>Seguir</button>";
                echo "</p>";
                echo "<div class='clearfix'></div>";
            echo "</a>";
        }

    } else {
        echo "Erro ao procurar pessoas";
    }

?>
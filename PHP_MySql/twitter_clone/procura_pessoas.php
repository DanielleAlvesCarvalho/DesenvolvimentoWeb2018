<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        header('Location: index.php?erro=1');
    }

?>
<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Twitter clone</title>
		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	
	</head>

	<body>

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <img src="imagens/icone_twitter.png" />
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
                  <li><a href="home.php">Home</a></li>
	            <li><a href="sair.php">Sair</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">
	    	<div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 class="text-center"><?= $_SESSION['usuario'] ?></h4>
                        <hr>
                        <div class="col-md-6">
                            Tweets <br> 1
                        </div>
                        <div class="col-md-6">
                            Seguidores <br> 1
                        </div>
                    </div>
                </div>
            </div>

	    	<div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="input-group">
                            <input type="text" class="form-control" id="nome_pessoa" placeholder="Quem você está procurando?" maxlength="140">
                            <span class="input-group-btn">
                                <button class="btn btn-default" id="btn_procura" type="button">Procurar</button>
                            </span>
                        </div>
                    </div>
                </div>

                <div id="pessoas" class="list-group"></div>
			</div>

			<div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                    </div>
                </div>
            </div>
		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function (){
                $("#btn_procura").click(function(){
                    if($("#nome_pessoa").val().length > 0){
                        $.ajax({
                            url: 'get_pessoas.php',
                            method: 'POST',
                            data: { nome_pessoa : $("#nome_pessoa").val() },
                            success: function(msg){
                                $("#nome_pessoa").val('')
                                $("#pessoas").html(msg)
                            }
                        })
                    }
                })
            })
        </script>
	</body>
</html>
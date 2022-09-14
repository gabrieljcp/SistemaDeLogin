<?php

if(!isset($_SESSION)) {
    session_start();
}
include('protect.php')

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<title>Cadastro</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Sistema de login</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="inicio.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=listar">Listar Usuários</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=cadastrar">Cadastrar Usuário</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="logout.php">Sair</a>
        </li>       
      </ul>
    </div>
  </div>
</nav>
<div class="container">
	<div class="row">
		<div class="col mt-5">
			<?php 
               //conexão com banco de dados 
               include('config.php'); 
               //include das páginas 
               switch (@$_REQUEST["page"]) {
               	case 'cadastrar':
	               	include('cadastrar.php');
	               	break;
               	case 'listar':
	               	include('listar.php');
	               	break;
                case 'salvar':
                  include('salvar.php');
                  break;
                case 'editar':
                  include('editar.php');
                  break;  
                case 'index':
                  include('index.php');
                  break;
                    
               	default:
               	print "<h1>Seja bem vindo ao cadastro</h1>";
               }
			 ?>
		</div>
	</div>
</div>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
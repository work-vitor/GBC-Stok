<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Adicionar Produto</title>

	<!-- CSS Bootstrap -->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- Meu CSS bolado -->
	<style type="text/css">
		#logao{
			width: 350px;
			margin-top: 40px;
			border-radius: 10px;
			border: 2px solid silver;
			-webkit-box-shadow: 10px 10px 49px 0px rgba(240,226,240,1);
			-moz-box-shadow: 10px 10px 49px 0px rgba(240,226,240,1);
			box-shadow: 10px 10px 49px 0px rgba(240,226,240,1);
		}
	</style>
	
</head>
<body style="background-color: #EEE9E9;">

	<?php
	//Conexão
	include 'action/conexao.php';
	session_start();
	$usuario = $_SESSION['usuario'];

	if (!isset($_SESSION['usuario'])) {
		header("Location: index.php");
	}

	?>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			<a class="navbar-brand" href="#">GBC Stok</a>
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item active">
					<a class="nav-link" href="menu.php">Inicio <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="perfil.php">Perfil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="sair.php">Sair</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container" id="logao" style="background-color: white;">
		<form action="action/inserir_fornecedor.php" method="POST" >

			<div style="padding: 20px;">
				<center>
					<img src="img/forn.png" width="100px" height="100px"> 
				</center>

				<div class="form-group" style="padding: 10px;">
					<input type="text" class="form-control" name="fornecedor" placeholder="Insira o Fornecedor:">
				</div>

				<div style="text-align: right;">
					<a href="menu.php" class="btn btn-sm  btn-danger">Voltar</a>
					<button type="submit" class="btn btn-sm btn-primary">Cadastrar</button>
				</div>
			</div>
		</form>
	</div>


	<!-- Java Script -->

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
<?php

session_start();
//Conexao
include 'conexao.php';

//Arquivo para criptografia
include '../script/password.php';

//Dados do Formulário

$id = $_POST['id'];

$nome_usuario = $_POST['usuario'];

$usuario = $_POST['email'];

$senha = $_POST['senha'];

// Inserindo no Banco

$sql = "UPDATE `usuarios` SET `nome_usuario`='$nome_usuario',`email`='$usuario',`senha`=sha1('$senha') WHERE id = $id";

$UPDATE = mysqli_query($connect, $sql);

$_SESSION["usuario"] = $usuario;

?>

<!-- CSS Bootstrap -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!-- Meu CSS bolado -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
		<a class="navbar-brand" href="#">GBC Stok</a>
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item active">
				<a class="nav-link" href="../menu.php">Inicio <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../perfil.php">Perfil</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../sair.php">Sair</a>
			</li>
		</ul>
	</div>
</nav>

<h4 style="text-align: center; margin-top: 40px;">Atualizado com Sucesso</h4>

<div style="text-align: center; margin-top: 60px;">
	<a href="../perfil.php?id=<?php echo $id; ?>" class="btn  btn-warning">Voltar</a>
</div>

<!-- Java Script -->

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
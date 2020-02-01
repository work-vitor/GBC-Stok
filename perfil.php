<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Meu Perfil</title>

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

		<div style="padding: 10px;">
			<center>
				<img src="img/cadastro.png" width="100px" height="100px"> 
			</center>

			

			<?php

			// Filtrando os dados do Banco
			//ID via Get
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$sql3 = "SELECT * FROM usuarios WHERE id = $id ";

			}else{
				$sql3 = "SELECT * FROM usuarios WHERE email = '$usuario'";
			}
			$select3 = mysqli_query($connect,$sql3);

			while ($array = mysqli_fetch_array($select3)) {

				$id_usuario = $array['id'];
				$nome_usuario = $array['nome_usuario'];
				$email = $array['email'];
				$nivel = $array['nivel_usuario']

				?>

				<div class="form-group" style="padding: 5px;">

					<center>
						<h4>ID</h4>
						<p><?php echo $id_usuario; ?></p>

						<h4>Nome</h4>
						<p><?php echo $nome_usuario; ?></p>

						<h4>E-mail</h4>
						<p><?php echo $email; ?></p>

						<h4>Nível de Usuário</h4>
						<p><?php echo $nivel; ?></p>

						<h4>Senha</h4>
						<p>*********</p>
					</center>
					
				</div>

				<div style="text-align: center;">

					<!-- Button trigger modal -->
					<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">
						Excluir Perfil
					</button>

					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Deletar</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									Deseja realmente deletar seu perfil ?
								</div>
								<div class="modal-footer">
									<form action="action/deletar_perfil.php" method="GET">
										<input type="hidden" name="id" value="<?php echo $id_usuario ?>">
										<button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>

										<button type="submit" class="btn btn-danger">Sim</button>

									</form>

								</div>
							</div>
						</div>
					</div>

					<a href="editar_usuario.php?id=<?php echo $id_usuario; ?>" class="btn btn-sm btn-warning">Editar Perfil</a>

				</div>
			<?php } ?>
		</div>
	</div>

	<div style="padding: 20px;">

	</div>

	<!-- Java Script -->

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
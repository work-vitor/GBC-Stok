<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Lista de Produtos</title>

	<!-- CSS Bootstrap -->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- Meu CSS bolado -->

	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- Place your kit's code here -->
	<script src="https://kit.fontawesome.com/a1496712a5.js" crossorigin="anonymous"></script>
</head>
<body style="background-color: #EEE9E9;">

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


	<?php
	//Conexão
	include 'action/conexao.php';
	session_start();
	$usuario = $_SESSION['usuario'];

	if (!isset($_SESSION['usuario'])) {
		header("Location: index.php");
	}

	$sql1 = "SELECT nivel_usuario FROM usuarios WHERE email = '$usuario' and status = 'Ativo' ";
	$buscar1 = mysqli_query($connect, $sql1);

	$array1 = mysqli_fetch_array($buscar1);

	$nivel = $array1['nivel_usuario'];
	?>

	<div class="container" style="margin-top: 40px; width: 1000px;">

		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Nro Produto</th>
					<th scope="col">Nome Produto</th>
					<th scope="col">Categoria</th>
					<th scope="col">Quantidade</th>
					<th scope="col">Fornecedor</th>
					<?php
					if (($nivel == 1) or ($nivel == 2) ) {


						?>
						<th scope="col">Ação</th>
					<?php } ?>
				</tr>
			</thead>
			

			<tr >

				<?php

				

				// Filtrando os dados do Banco
				$sql = "SELECT * FROM estoque ORDER BY nome_produto ASC";
				$select = mysqli_query($connect,$sql);

				while ($array = mysqli_fetch_array($select)) {

					$id_produto = $array['id_estoque'];
					$nro_produto = $array['nro_produto'];
					$nome_produto = $array['nome_produto'];
					$categoria = $array['categoria'];
					$quantidade = $array['quantidade'];
					$fornecedor = $array['fornecedor'];

					?>
					<tr >
						<td class="table-secondary"><?php echo $nro_produto;?></td>

						<td class="table-secondary"><?php echo $nome_produto;?></td>

						<td class="table-secondary"><?php echo $categoria;?></td>

						<td class="table-secondary"><?php echo $quantidade;?></td>

						<td class="table-secondary"><?php echo $fornecedor;?></td>

						<?php
						if (($nivel == 1) or ($nivel == 2) ) {


							?>
							<td class="table-secondary">
								<a class="btn btn-warning btn-sm" href="editar_produto.php?id=<?php echo $id_produto?>"><i class="fas fa-edit" role="button"></i>&nbsp;Editar</a>
								<a class="btn btn-danger btn-sm" href="action/deletar_produto.php?id=<?php echo $id_produto?>" role="button" style="color: black;"><i class="far fa-trash-alt "></i>&nbsp;Excluir</a>
							</td>

						<?php } ?>
					</tr>
				<?php }?>
			</tr>
		</table>

	</div>

	<!-- Java Script -->

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
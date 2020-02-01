<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pagina Inicial</title>

	<!-- CSS Bootstrap -->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- Meu CSS bolado -->
	
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
	session_start();
	$usuario = $_SESSION['usuario'];

	if (!isset($_SESSION['usuario'])) {
		header("Location: index.php");
	}

	//conexao
	include 'action/conexao.php';

	$sql = "SELECT nivel_usuario FROM usuarios WHERE email = '$usuario' and status = 'Ativo' ";
	$buscar = mysqli_query($connect, $sql);

	$array = mysqli_fetch_array($buscar);

	$nivel = $array['nivel_usuario'];
	?>

	<div class="container" style="margin-top: 40px; ">
		<div>
			
		</div>

		<?php
		if (($nivel == 1) or ($nivel == 2) ) {

			
			?>
			
			<div class="row" >

				<div class="col-sm-6">
					<div class="card p-3 mb-2 bg-secondary text-white">
						<div class="card-body">
							<h5 class="card-title" style="color: black;">Adicionar Produto</h5>
							<p class="card-text" style="color: black;">Opção para adicionar produtos em nosso estoque</p>
							<a href="adicionar_produto.php" class="btn btn-light" style="color: black;">Cadastrar Produto</a>
						</div>
					</div>
				</div>

				<div class="col-sm-6" >
					<div class="card p-3 mb-2 bg-secondary text-white">
						<div class="card-body">
							<h5 class="card-title" style="color: black;">Adicionar Categorias</h5>
							<p class="card-text" style="color: black;">Opção para adicionar categoria em nosso estoque</p>
							<a href="adicionar_categoria.php" style="color: black;" class="btn btn-light">Cadastrar Categoria</a>
						</div>
					</div>
				</div>

				<div class="col-sm-6" style="margin-top: 20px;">
					<div class="card p-3 mb-2 bg-secondary text-white">
						<div class="card-body">
							<h5 class="card-title" style="color: black;">Adicionar Fornecedor</h5>
							<p class="card-text" style="color: black;">Opção para adicionar fornecedores em nosso estoque</p>
							<a href="adicionar_fornecedor.php" style="color: black;" class="btn btn-light">Cadastrar Fornecedor</a>
						</div>
					</div>
				</div>

				<div class="col-sm-6" style="margin-top: 20px;">
					<div class="carcard p-3 mb-2 bg-secondary text-white">
						<div class="card-body">
							<h5 class="card-title" style="color: black;">Adicionar Usuários</h5>
							<p class="card-text" style="color: black;">Adicionar usuários ao sistema</p>
							<a href="cadastro_usuario.php" style="color: black;" class="btn btn-light">Cadastrar Usuários</a>
						</div>
					</div>
				</div>

				<div class="col-sm-6" style="margin-top: 20px;">
					<div class="card p-3 mb-2 bg-secondary text-white">
						<div class="card-body">
							<h5 class="card-title" style="color: black;">Aprovar Usuários</h5>
							<p class="card-text" style="color: black;">Aprovar usuários cadastrados</p>
							<a href="aprovar_usuario.php" style="color: black;" class="btn btn-light">Aprovar</a>
						</div>
					</div>
				</div>


			<?php } ?>

			<div class="col-sm-6" style="margin-top: 20px;">
				<div class="card p-3 mb-2 bg-secondary text-white">
					<div class="card-body">
						<h5 class="card-title" style="color: black;">Lista de Produtos</h5>
						<p class="card-text" style="color: black;">Visualizar, Editar e Excluir os Produtos do estoque.</p>
						<a href="listar_produtos.php" style="color: black;" class="btn btn-light">Produtos</a>
					</div>
				</div>
			</div>

			<div class="col-sm-6" style="margin-top: 20px;">
				<div class="card p-3 mb-2 bg-secondary text-white">
					<div class="card-body">
						<h5 class="card-title" style="color: black;">Lista de Categorias</h5>
						<p class="card-text" style="color: black;">Visualizar, Editar e Excluir as Categorias do estoque</p>
						<a href="listar_categoria.php" style="color: black;" class="btn btn-light">Categorias</a>
					</div>
				</div>
			</div>

			<div class="col-sm-6" style="margin-top: 20px;">
				<div class="card p-3 mb-2 bg-secondary text-white">
					<div class="card-body">
						<h5 class="card-title" style="color: black;">Lista de Fornecedores</h5>
						<p class="card-text" style="color: black;">Visualizar, Editar e Excluir os Fornecedores do estoque</p>
						<a href="listar_fornecedor.php" style="color: black;" class="btn btn-light">Fornecedores</a>
					</div>
				</div>
			</div>

		</div>

	</div>	

	<!-- Java Script -->

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
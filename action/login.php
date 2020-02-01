<?php

//Conexão
include 'conexao.php';

// Session
session_start();

//Arquivo para criptografia
include '../script/password.php';

//Arquivo para criptografia
include '../script/password.php';

//Dados do formulário de login
$usuario = $_POST['email'];
$senha = $_POST['senha'];

//Verificação

$sql = "SELECT email, senha FROM usuarios WHERE email = '$usuario' and status='Ativo' ";
$veri = mysqli_query($connect, $sql);

$total = mysqli_num_rows($veri);

while ($array = mysqli_fetch_array($veri)) {
	$senha2 = $array['senha'];

	$senha_codi = sha1($senha);
}

if ($total > 0 ) {

	if ($senha_codi == $senha2) {
		header('Location: ../menu.php');
		$_SESSION["usuario"] = $usuario;
	}
	else{
		$_SESSION["mensagem"] = "Senha Incorreta!";
		header("Location: ../index.php");
	}

}
else{
	$_SESSION["mensagem"] = "Esse E-mail não existe!";
	header("Location: ../index.php");
}



?>



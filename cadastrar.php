<?php 
include("includes/header.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema - Cadastro</title>
		 	<meta charset="utf-8">
 			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="sistema de login e cadastramento em php7 e mysql">
			<meta name="robots" content="index, follow">
			<meta name="keywords" content="sistema de login e cadastramento">

			<!--## Criador do Sistema ##-->
			<meta name="author" content="Alex Djonata, Boxcode Equipe">
			<meta name="theme-color" content="#0066cc">

			<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

<header>
	<h3>Sistema</h3>	
</header>

	<div class="login">
		<h3 class="login-title">CADASTRE-SE AQUI</h3>

		<!-- Formulario - define o metodo e a acão do formulario -->
		<form method="post" action="?acao=cadastrar" class="login-form">

			<!-- Campos para o usuario preencher os dados -->
			<input type="text" name="nome" placeholder="nome">
			<input type="text" name="sobrenome" placeholder="sobrenome">
			<input type="email" name="email" placeholder="email">
			<input type="text" name="login" placeholder="Login">
			<input type="password" name="senha" placeholder="Senha">
			<h4><?php echo $infoMsg; ?></h4>

			<!-- Botão para o usuario enviar o formulario -->
			<input type="submit" value="Cadastrar"><br>
			<a href="index.php">Acessar sua conta</a>

		</form>

	</div>

	<!--

	# Utilizei a mesma class do login para puopar tempo

	-->



<!-- Rodapé -->
<footer class="rodape"> 
	<h4 class="rodape-text"><a href="http://www.box-code.xyz">Created By Boxcode</a></h4>
</footer>
</body>
</html>
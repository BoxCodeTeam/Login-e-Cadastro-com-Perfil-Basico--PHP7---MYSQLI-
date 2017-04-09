<?php 
// Adiciona o header 
include("includes/header.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema - Login</title>
		 	<meta charset="utf-8">
 			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="sistema de login e cadastramento em php7 e mysql">
			<meta name="robots" content="index, follow">
			<meta name="keywords" content="sistema de login e registro">

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
		<h3 class="login-title">ACESSE SUA CONTA</h3>

		<!-- Formulario - define o metodo e a acão do formulario -->
		<form method="post" action="?acao=logar" class="login-form">
		<!-- 
		Porque eu coloquei como action o valor '?acao=logar'
		Não sai da pagina de login
		Tipo se você quiser colocar um parametro, o erro ficar na propia pagina (Exemplo: login ou senha invalidos)
		Jaja você vai entender melhor
		-->
			
			<!-- Campos para o usuario preencher os dados -->
			<input type="text" name="login" placeholder="Login">
			<input type="password" name="senha" placeholder="Senha">
			<h4><?php echo $infoMsg; ?></h4>
			<!-- Botão para o usuario enviar o formulario -->
			<input type="submit" value="Entrar"><br>
			<a href="cadastrar.php">Cadastre-se Aqui</a>

		</form>

	</div>



<!-- Rodapé -->
<footer class="rodape" style="margin-top: 100px;"> 
	<h4 class="rodape-text"><a href="http://www.box-code.xyz">Created By Boxcode</a></h4>
</footer>
</body>
</html>

<!-- Leu tudo? se sim va para o header.php que ta na pasta includes -->
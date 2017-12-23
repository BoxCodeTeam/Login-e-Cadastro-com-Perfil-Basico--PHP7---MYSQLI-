<?php 
/*-- Verifica a url --*/
if($_SERVER['SCRIPT_NAME']!='/perfil.php') {
    header('Location: /');
}

/*-- Arquivo Header --*/
include("includes/header.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema - Perfil</title>
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

	<form action="?acao=sair" method="post" class="perfil">
		<!-- Pega os dados do usuario via session -->
	 	<h3>Nome do Usuario: <?php echo $_SESSION["nome"]." ".$_SESSION["sobrenome"]; ?></h3>
	 	<h3>Email: <?php echo $_SESSION["email"]; ?></h3>
	 	<h3>Data de Cadastro: <?php echo $_SESSION["data"]; ?></h3>
	 	<input type="submit" value="Sair">
	</form>
	
	

<!-- Rodapé -->
<footer class="rodape" style="position: absolute; bottom: 0;"> 
	<h4 class="rodape-text"><a href="http://www.box-code.xyz">Created By Boxcode</a></h4>
</footer>
</body>
</html>

<!-- Leu tudo? se sim va para o header.php que ta na pasta includes -->

<?php

/* Variaveis globais */
$systemStart = false;
$data = date("d/m/Y");
$infoMsg = "";

/* Inicia as sessions */
session_start();
ob_start();


/*
	Verifica se o usuario enviou o formulario dai habila a ação 
	(exemplo no login coloquei action="?acao=logar" ao usuario clicar e Entrar a variavel
	ação recebe o valor logar dai torna o if de logar ativo)
*/
if(isset($_GET["acao"])) {
	$acao=$_GET["acao"];

	/* Torna o sistema ativo */
	$systemStart=true;
}



/* Variaveis de conexão ao banco de dados */
$host = "localhost";
$user = "root";
$senha = "root";
$db = "sistema";

/* conecta ao banco de dados */
$mysqli = new mysqli($host, $user, $senha, $db);
/* Cria o banco de dados */
$mysqli->query("CREATE DATEBASE sistema");
/* Cria a tabela */
$criaTabela = "CREATE TABLE usuarios (
id INT AUTO_INCREMENT,
nome VARCHAR(255),
sobrenome VARCHAR(255),
email VARCHAR(255),
login VARCHAR(255),
senha VARCHAR(255),
data VARCHAR(255),
PRIMARY KEY(id))";
$mysqli->query($criaTabela);



/* Verifica se o sistema foi iniciado */
if($systemStart==true) {

	/* Aqui por exemplo é a ação que aparece no url ao usuario logar */
	if($acao=="logar") {


		/* pega os valores fornecidos pelo usuario */
		$login=$_POST["login"];
		$senha=$_POST["senha"];
		/* Descriptografa a senha */
		$senha=sha1($senha);


		/*=== Variavel dos parametros da busca - Seleciona a tabela e procura 
			  se os dados fornecidos existem no banco de dados ===*/

		$busca = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";

		/* Execulta a busca */
		$coletandoDados = $mysqli->query($busca);

		/* Verifica se a busca retorna algum valor */
		$resultadoDaBusca = $coletandoDados->fetch_assoc();


		/* Verifica se a busca retornou algum valor */
		if(isset($resultadoDaBusca)) {

			// Cria Sessions com os dados do usuario
			$_SESSION["nome"]=$resultadoDaBusca["nome"];
			$_SESSION["sobrenome"]=$resultadoDaBusca["sobrenome"];
			$_SESSION["email"]=$resultadoDaBusca["email"];
			$_SESSION["login"]=$login;
			$_SESSION["data"]=$resultadoDaBusca["data"];

			// Cria um cookie para enquanto o usuario estiver com o navegador aberto ele vai estar logado no site 
			setcookie("logado",1);

			// Como o login foi efetuado com sucesso o usuario é mandado para o seu perfil
			header("Location: perfil.php");

		}
		// Se não possui nenhum usuario cadastrado com o login e senha informados
		else {
			$infoMsg="Login ou Senha Invalidos!";
		}
	}

	// Agora vamos para o sistema de cadastro 
	if($acao=="cadastrar") {
		// O ucwords torna a primeira letra do elemento maiuscula
		$nome = ucwords($_POST["nome"]);
		$sobrenome = ucwords($_POST["sobrenome"]);
		$email = $_POST["email"];
		$login = $_POST["login"];
		$senha = $_POST["senha"];

		/* Verifica se ja possui uma conta registrada com tal login */
		$busca = "SELECT * FROM usuarios WHERE login = '$login'";

		/* Execulta a busca */
		$coletandoDados = $mysqli->query($busca);

		/* Verifica se a busca retorna algum valor */
		$resultadoDaBusca = $coletandoDados->fetch_assoc();


		if(isset($resultadoDaBusca)) {
			$infoMsg="Usuario já cadastrado em nosso sistema!";
		}
		/* cria cadastro */
		else {
			if(empty($login)||empty($senha)) {
				$infoMsg="Preencha todos os campos!";
			}
			else {
				if(strlen($login)<5||strlen($senha)<5) {
					$infoMsg="Os campos login e senha deve conter no minimo 5 caractéres";
				}
				else {
					// Criptografa a senha
					$senha = sha1($senha);
					$cadastra = "INSERT INTO usuarios(nome, sobrenome, email, login, senha, data) VALUES ('$nome', '$sobrenome', '$email', '$login', '$senha', '$data')";
					$cadastrando = $mysqli->query($cadastra);

					$infoMsg="Cadastro realizado com sucesso!";
				}
			}
		}
	}

	// Sair da conta
	if($acao=="sair") {
		// muda o cookie
		setcookie("logado",0);

		// muda as sessions
		$_SESSION["nome"]="";
		$_SESSION["sobrenome"]="";
		$_SESSION["email"]="";
		$_SESSION["login"]="";
		$_SESSION["data"]="";

		header("Location: index.php");
	}
}
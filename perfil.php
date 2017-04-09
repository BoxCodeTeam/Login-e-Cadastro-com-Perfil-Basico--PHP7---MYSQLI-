<?php
// Verifica se o usuario ta logado e inclui o perfil, se não inclui a area de login
if($_COOKIE["logado"]==1) {
	include("templates/perfil.php");
}
else {
	include("index.php");
}
?>
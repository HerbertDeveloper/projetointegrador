<?php


//verificando se a sessão está logada e startando
if(!isset($_SESSION)) session_start();


session_destroy();

echo "Você foi deslogado";
header("Location: login.php?sair='sair'");



?>

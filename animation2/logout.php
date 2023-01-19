<?php


//verificando se a sessão está logada e startando
if(!isset($_SESSION)) session_start();


session_destroy();


header("Location: login.php")


?>

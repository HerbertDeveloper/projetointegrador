<?php


// abri a conexão fora no início para atender a session


include('conexao.php');

// iniciar a session
if(!isset($_SESSION)) session_start();
// verificar se a variavel existe
if(!isset($_SESSION['usuario']))
   die('Voce não está logado. <a href="login.php">Clique aqui</a> para logar.');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body>
<form action="" method="post" id="modal" class="animar">
       <p>
       <h1>OPÇÕES</h1>  
      <a href="cadastro.php"> <button type="button" style="margin-left: auto; margin-right: auto;">Cadastrar cliente</button> </a>
      <a href="database.php"> <button type="button" style="margin-left: auto; margin-right: auto;">Ver Banco de dados</button> </a>
      <a href="logout.php"> <button type="button" style="margin-left: auto; margin-right: auto;">Sair</button> </a>
   </form>
</body>
</html>
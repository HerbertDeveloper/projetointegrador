<?php

if (isset($_GET['sair'])) {
    echo "Você foi deslogado";
}


if (isset($_POST['email'])) {

    include("conexao.php");
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql_code = "SELECT * FROM usuario WHERE email = '$email' LIMIT 1";
    // LIMIT 1 só permite rodar uma vez
    $sql_exec = $mysqli->query($sql_code) or die($mysqli->error);

    $usuario = $sql_exec->fetch_assoc();


    $erro = false;
    if(empty($email)) {
        $erro = 1;
    }
    if (empty($senha)) {
        $erro = 1;
    }
    if ($erro){
        echo "E-mail ou Senha Incorretos";
    }   if(password_verify($senha, $usuario['senha'])) {
        if(!isset($_SESSION)) session_start();
        $_SESSION['usuario'] = $usuario['id'];
        //echo "Usuário Logado";
        header('location: index.php');
    } else {
        //echo "Falha ao logar! Senha ou e-mail incorretos";
        echo "E-mail ou Senha incorretos";
    }
    
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
    <title>Login</title>
</head>
<body>
   <form action="" method="post" id="modal" class="animar"> 
 
        <h1>Login</h1>
        <label>Email:</label>
        <input type="text" name="email">
        <label>Senha</label>
        <input type="password" name="senha">     
        <button type="submit" class="log" id="logar" style="display: inline-block;">Prosseguir</button>
        <a href="cadastrar_cliente.php" style="display: inline-block; margin-left:120px;">fazer cadastro </a>
        
    </form>
   

    </div>
    </body>
</html>

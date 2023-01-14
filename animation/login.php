<?php
if (isset($_POST['email'])) {

    include("conexao.php");
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql_code = "SELECT * FROM senhas WHERE email = '$email' LIMIT 1";
    // LIMIT 1 só permite rodar uma vez
    $sql_exec = $mysqli->query($sql_code) or die($mysqli->error);

    $usuario = $sql_exec->fetch_assoc();


    
    if(empty($email)) {
        $erro = 1;
    } else if (empty($senha)) {
        $erro = 1;
    }
    if ($erro){
        echo "E-mail ou Senha Incorretos";
    }else if(password_verify($senha, $usuario['senha'])) {
        //echo "Usuário Logado";
        header('location:teste.html');
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
        <label>E-mail</label>
        <input type="text" name="email">
        <label>Senha</label>
        <input type="text" name="senha">     
        <button type="submit" class="log" id="logar">Prosseguir</button>
      
        
    </form>
   

    </div>
    </body>
</html>

<?php


// abri a conexão fora no início para atender a session


include('conexao.php');

// iniciar a session
if(!isset($_SESSION)) session_start();
// verificar se a variavel existe



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
<?php
if (isset($_POST['email'])) {

    include("conexao.php");
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql_code = "SELECT * FROM senhas WHERE email = '$email' LIMIT 1";
    // LIMIT 1 só permite rodar uma vez
    $sql_exec = $mysqli->query($sql_code) or die($mysqli->error);

    $usuario = $sql_exec->fetch_assoc();


    $erro = false;
    if(empty($email)) {
        $erro = 1;
    } else if (empty($senha)) {
        $erro = 1;
    }
    if ($erro){
        echo "E-mail ou Senha Incorretos";
    }else if(password_verify($senha, $usuario['senha'])) {
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
        <input type="text" name="senha">     
        <button type="submit" class="log" id="logar" style="display: inline-block;">Prosseguir</button>
        <a href="cadastro.php" style="display: inline-block; margin-left:120px;">fazer cadastro </a>
        
    </form>
   

    </div>
    </body>
</html>

<form action="" method="post" id="modal" class="animar">
       <p>
       <h1>OPÇÕES</h1>  
      
      <a href="cadastro.php"> <button type="button" style="margin-left: auto; margin-right: auto;">Cadastrar cliente</button> </a>
      <a href="database.php"> <button type="button" style="margin-left: auto; margin-right: auto;">Ver Banco de dados</button> </a>
      <a href="logout.php"> <button type="button" style="margin-left: auto; margin-right: auto;">Sair</button> </a>
   </form>
</body>
</html>
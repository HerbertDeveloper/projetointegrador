
<?php


// abri a conexão fora no início para atender a session


include('conexao.php');

// iniciar a session
if(!isset($_SESSION)) session_start();
// verificar se a variavel existe
if(!isset($_SESSION['usuario']))
   die('Voce não está logado. <a href="login.php">Clique aqui</a> para logar.');


if(isset($_POST['email'])){
   $nome = $_POST['nome'];
   $sobrenome = $_POST['sobrenome'];
   $email = $_POST['email'];
   $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
   $mysqli->query("INSERT INTO senhas (nome, sobrenome, email, senha) VALUES ('$nome','$sobrenome','$email','$senha')");
}
// capturando o id
$id = $_SESSION['usuario'];
// fazendo a consulta do id
$sql_query = $mysqli->query("SELECT * FROM senhas WHERE id = '$id'") or die($mysqli->error);
// vinculando o usuario
$usuario = $sql_query->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="login.css">
   <title>Document</title>
</head>
<body>
   <form action="" method="post" id="modal" class="animar">
       <p>
       <h1>Cadastrar</h1>
       <p>
         <label for="senha">nome</label>
         <input type="text" name="nome">
       </p>
         <label for="email">sobrenome</label>
         <input type="text" name="sobrenome">
       </p>
       <p>
         <label for="senha">email</label>
         <input type="text" name="email">
       </p>
       <p>
         <label for="senha">Senha</label>
         <input type="text" name="senha">
       </p>
       <p>
       <button type="submit">Cadastrar</button>
   </form>



</body>
</html>

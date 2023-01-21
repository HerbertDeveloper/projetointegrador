<?php


function limpar_texto($str){
    return preg_replace("/[^0-9]/", "", $str);
}


if(count($_POST) > 0) {


    include('conexao.php');
   
    $erro = false;
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $cep = $_POST['cep'];

//Campos que nao podem ser cadastrados em branco!
    if(empty($nome)) {
        $erro = "Preencha o nome";
    } else if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "Preencha o e-mail corretamente: Exemplo@gmail.com";
    } else if(empty($logradouro)) {
        $erro = "Preencha o logradouro";
    }  else if(empty($numero) || strlen($numero)<0) {
        $erro = "Preencha o número!";
    } else if(!empty($complemento)) {
        $erro = "Preencha o complemento";
    } else if(empty($bairro)) {
        $erro = "Preencha o bairro";
    } else if(empty($cidade)) {
        $erro = "Preencha a cidade";
    } else if(empty($uf)) {
        $erro = "Preencha o UF";
    } else if(empty($cep)){
          $p1 = substr($_POST['cep'],0,5);
          $p2 = substr($_POST['cep'],6,3);
          $cep = "$p1-$p2";
        } else {
            $erro = "Preencha o CEP corretamente xxxxx-xxx";
        } if (empty($uf) && strlen($uf)<1) {
            $erro = "Preencha o UF corretamente, exemplo: RJ";
        } 
    
           

   
//Erro e inserir cadastro no banco de dados
    if($erro) {
        echo "<p><b>ERRO: $erro</b></p>";
    } else {
        $sql_code = "INSERT INTO feiras (nome, logradouro, numero, complemento, bairro, cidade, uf, cep, email)
        VALUES ('$nome','$logradouro','$numero','$complemento','$bairro','$cidade','$uf','$cep', '$email')";
        $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
        if($deu_certo) {
            echo "<p><b>Cliente cadastrado com sucesso!!!</b></p>";
            unset($_POST); //limpa o conteúdo do $_POST
        }
    }


}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <a href="clientes.php">Voltar para a lista</a>
    <form method="POST" action="">
        <p>
            <label>Nome:</label>
            <input value="<?php if(isset($_POST['nome'])) echo $_POST['nome']; ?>" name="nome" type="text">
        </p>
        <p>
            <label>Email:</label>
            <input value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"  name="email" type="text">
        </p>
        <p>
            <label>Logradouro:</label>
            <input value="<?php if(isset($_POST['logradouro'])) echo $_POST['logradouro']; ?>" name="logradouro" type="text">
        </p>
        <p>
            <label>Número:</label>
            <input value="<?php if(isset($_POST['numero'])) echo $_POST['numero']; ?>"  name="numero" type="text">
        </p>
        <p>
            <label>Complemento:</label>
            <input value="<?php if(isset($_POST['complemento'])) echo $_POST['complemento']; ?>"  name="complemento" type="text">
        </p>
        <p>
            <label>Bairro:</label>
            <input value="<?php if(isset($_POST['bairro'])) echo $_POST['bairro']; ?>"  name="bairro" type="text">
        </p>
        <p>
            <label>Cidade:</label>
            <input value="<?php if(isset($_POST['cidade'])) echo $_POST['cidade']; ?>"  name="cidade" type="text">
        </p>
        <p>
            <label>UF:</label>
            <input value="<?php if(isset($_POST['uf'])) echo $_POST['uf']; ?>"  name="uf" type="text">
        </p>
        <p>
            <label>CEP:</label>
            <input value="<?php if(isset($_POST['cep'])) echo $_POST['cep']; ?>"  name="cep" type="text">
        </p>
        <p>
            <button type="submit">Salvar Cliente</button>
        </p>
    </form>
</body>
</html>

<?php 


function limpar_texto($str){ 
    return preg_replace("/[^0-9]/", "", $str); 
}

if(count($_POST) > 0) {

    include('conexao.php');
    
    $erro = false;
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $cpf = $_POST['cpf'];
    $cep = $_POST['cep'];

    if(empty($nome)) {
        $erro = "Preencha o nome";
    } else
    if(empty($senha) || strlen($senha)<=8){
        $erro = "Preencha a senha";
    } else
    if(empty($logradouro)) {
        $erro = "Preencha o logradouro";
    } else
    if(empty($numero) || is_numeric($numero)<2) {
        $erro = "Preencha o número";
    } else
    if(empty($bairro)) {
        $erro = "Preencha o bairro";
    } else
    if(empty($cidade)) {
        $erro = "Preencha a cidade";
    } else
    if(empty($uf) || strlen($uf)!=2) {
        $erro = "Preencha o UF";
    } else
    if(!empty($cpf) || strlen($cpf)>10){
      $p1 = substr($_POST['cpf'],0,3);
      $p2 = substr($_POST['cpf'],3,3);
      $p3 = substr($_POST['cpf'],6,3);
      $p4 = substr($_POST['cpf'],9);
      $cpf = "$p1.$p2.$p3-$p4";
    } else
    if(empty($cpf)) {
        $erro = "Preencha o CPF";
    } else
    if(empty($cep) && strlen($cep)!=8) {
        $erro = "Preencha o CEP";
    }

    if($erro) {
        echo "<p><b>ERRO: $erro</b></p>";
    } else {
        $sql_code = "INSERT INTO usuario (nome, senha, logradouro, numero, complemento, bairro, cidade, uf, cpf, cep) 
        VALUES ('$nome', '$senha', '$logradouro','$numero','$complemento','$bairro','$cidade','$uf','$cpf','$cep')";
        $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
        if($deu_certo) {
            echo "<p><b>Cadastrado com sucesso!!!</b></p>";
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
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <title>Cadastrar Cliente</title>
</head>
<body>
    <a href="index.php">Voltar para a lista</a>
    <form class="formulario" method="POST" action="">
        <p>
            <label>Nome:</label>
            <input value="<?php if(isset($_POST['nome'])) echo $_POST['nome']; ?>" name="nome" type="text">
        </p>
        <p>
            <label>Senha:</label>
            <input value="<?php if(isset($_POST['senha'])) echo $_POST['senha']; ?>"placeholder="Preencha a senha com 8 ou mais caracteres" name="senha" type="password">
        </p>
        <p>
            <label>Logradouro:</label>
            <input value="<?php if(isset($_POST['logradouro'])) echo $_POST['logradouro']; ?>"name="logradouro" type="text">
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
            <label>CPF:</label>
            <input value="<?php if(isset($_POST['cpf'])) echo $_POST['cpf']; ?>"  name="cpf" type="text">
        </p>
        <p>
            <label>CEP:</label>
            <input value="<?php if(isset($_POST['cep'])) echo $_POST['cep']; ?>"  name="cep" type="text">
        </p>
        <p>
            <button type="submit">Cadastrar</button>
        </p>
    </form>
    <p class="formulario"><a href="logout.php">Sair</a>
</body>
</html>

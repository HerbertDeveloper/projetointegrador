<?php

function limpar_texto($str){ 
    return preg_replace("/[^0-9]/", "", $str); 
}

if(count($_POST) > 0) {

    include('conexao.php');
    
    $erro = false;
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $emissao = $_POST['emissao'];
    $nascimento = $_POST['nascimento'];
    $cpf = $_POST['cpf'];
    

    if(empty($nome)) {
        $erro = "Preencha o nome";
    } 

    if(!empty($nascimento)) { 
        $pedacos = explode('/', $nascimento);
        if(count($pedacos) == 3) {
            $nascimento = implode ('-', array_reverse($pedacos));
        } else {
            $erro = "A data de nascimento deve seguir o padrão dia/mes/ano.";
        }
    }
   if(empty($senha)) {
    $erro = "Senha inválida";
   }

    

    if($erro) {
        echo "<p><b>ERRO: $erro</b></p>";
    } else {
        $sql_code = "INSERT INTO funcionarios (nome,senha, data_de_emissão,data_de_nascimento, cpf) 
        VALUES ('$nome', '$senha', '$emissao', '$nascimento','$cpf')";
        $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
        if($deu_certo) {
            echo "<p><b>Funcionario cadastrado com sucesso!!!</b></p>";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3 Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="login.css" media="screen" />
    <title>Cadastrar Cliente</title>
</head>
<body>
    <a href="clientes.php">Voltar para a lista</a>
    <form method="POST" action="" id="modal" class="animar">
        <p>
        <h1>Cadastro de funcionarios</h1>
            <label>Nome</label>
            <input value="<?php if(isset($_POST['nome'])) echo $_POST['nome']; ?>" name="nome" type="text">
        </p>
        <p>
            <label>Senha</label>
            <input value="<?php if(isset($_POST['senha'])) echo $_POST['senha']; ?>" name="senha" type="text">
        </p>
        <p>
            <label>Data de admissão</label>
            <input value="<?php if(isset($_POST['emissao'])) echo $_POST['emissao']; ?>" name="emissao" type="text">
        </p>
        <p>
            <label>Data de Nascimento:</label>
            <input  value="<?php if(isset($_POST['nascimento'])) echo $_POST['nascimento']; ?>"  name="nascimento" type="text">
        </p>
        <p>
            <label>Digite seu CPF</label>
            <input value="<?php if(isset($_POST['cpf'])) echo $_POST['cpf']; ?>"  name="cpf" type="text">
        </p>
        <p>
            <button type="submit" class="log">Cadastrar cliente</button>
        </p>
    </form>
</body>
</html>
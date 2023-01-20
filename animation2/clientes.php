<?php
include('conexao.php');


// arqmazenar em uma variável o comando para listar os dados da tabela
$sql_clientes = "SELECT * FROM feiras";
// fazer a consulta com a variável anterior ou exibir um erro
$query_clientes = $mysqli->query($sql_clientes) or die($mysqli->error);
// pegar da consulta anterior a quantidade de linhas
$num_clientes = $query_clientes->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css" media="screen" />
    
    <title>Lista de Clientes</title>
</head>
<body>  
    <form method="POST" action="consulta_nome.php" id="modal" class="animar">
    <h1>Lista de Clientes</h1>
        <p>
            <label>Consultar:</label>
            <input name="nome" type="text">
        
        </p>
            <button type="submit">Consultar</button>
            <footer>
       <p><strong>Escreva Nome ou ID para consultar</strong></p>
            </footer>
   
        </form>
    
</body>
</html>

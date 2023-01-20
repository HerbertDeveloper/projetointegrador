<?php 
include('conexao.php');
$name = $_POST['nome'];
$id = $_POST['nome'];

if (!empty($name)) {
    $sql_clientes = "SELECT * FROM feiras where nome='$name' or nome Like'%$name%' or id='$id'";
     }else{
    $sql_clientes = "SELECT * FROM feiras";
 } 

// fazer a consulta com a variável anterior ou exibir um erro (ele puxa o include do conexao)
$query_clientes = $mysqli->query($sql_clientes) or die($mysqli->error);
// pegar da consulta anterior a quantidade de linhas
$num_clientes = $query_clientes->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
</head>
<body>
    <h1>Lista de Clientes</h1>
    <p>Estes são os clientes cadastrados no seu sistema:</p>
    <table border="1" cellpadding="10">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Logradouro</th>
            <th>Número</th>
            <th>Complemento</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>UF</th>
            <th>CEP</th>
            <th>Ações</th>

            <p>
        </thead>
        
        <body>
            <?php if($num_clientes == 0) { ?>
                <tr>
                    <td colspan="7">Nenhum cliente foi cadastrado</td>
                </tr>
            <?php 
            } else {
                // vai manter o loop enquanto houver dados
                while ($cliente = $query_clientes->fetch_assoc()) {
                

                ?>
                <tr>
                    <td><?php echo $cliente['id']; ?></td>
                    <td><?php echo $cliente['nome']; ?></td>
                    <td><?php echo $cliente['email']; ?></td>
                    <td><?php echo $cliente['logradouro']; ?></td>
                    <td><?php echo $cliente['numero']; ?></td>
                    <td><?php echo $cliente['complemento']; ?></td>
                    <td><?php echo $cliente['bairro']; ?></td>
                    <td><?php echo $cliente['cidade']; ?></td>
                    <td><?php echo $cliente['uf']; ?></td>
                    <td><?php echo $cliente['cep']; ?></td>
                    <td>
                        <!-- para carregar as páginas abaixo, passamos a chave da tabela-->
                        <a href="editar_cliente.php?id=<?php echo $cliente['id']; ?>">Editar</a>
                        <a href="deletar_cliente.php?id=<?php echo $cliente['id']; ?>">Deletar</a>
                    </td>
                </tr>
                <?php
                }
            } ?>
            
        </tbody>
        
    </table>
    <p>
    <a href="clientes.php">Voltar</a>
    <a href="cadastrar_cliente.php">Cadastrar cliente</a></p>
</body>
</html>
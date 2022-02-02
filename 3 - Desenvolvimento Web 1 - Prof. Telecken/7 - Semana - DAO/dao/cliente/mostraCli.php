<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require_once('../class/cliente.php');

$clienteDao=new clienteDAO();
$clientes=$clienteDao->listaClientes(); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="site.css">
        <title>Editar</title>
    </head>
    <body>
    <?php
    foreach ($clientes as $cli) {
        $codigo=$cli->getCod();
        $nome=$cli->getNome();
        $cpf=$cli->getCpf();
        echo "Código:$codigo, Nome:$nome, CPF:$cpf --- <a href='./alteraCli1.php?cod=$codigo'>Editar</a> --- <a href='./deletaCli1.php?cod=$codigo'>Deletar</a><BR>";
    }   
    echo "<BR><BR><a href='./insereCli1.php'>Inserir</a>";
    ?>
    </body>
</html>
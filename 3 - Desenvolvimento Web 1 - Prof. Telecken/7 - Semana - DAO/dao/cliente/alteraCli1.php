<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require_once('../class/cliente.php');

$cod = intval($_GET['cod']);

$clienteDao=new clienteDAO();
$cli=$clienteDao->buscar($cod); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="site.css">
        <title>Editar</title>
    </head>
    <body>
        <form action="./alteraCli2.php" method="post">
            <input type="text"  name="nome"  value="<?php echo $cli->getNome();?>" >
            <input type="text"  name="cpf"  value="<?php echo $cli->getCpf();?>" >
            <input type="hidden" name="cod" value="<?php echo $cli->getCod();?>">
            <button type="submit">enviar</button>
        </form>
    </body>
</html>
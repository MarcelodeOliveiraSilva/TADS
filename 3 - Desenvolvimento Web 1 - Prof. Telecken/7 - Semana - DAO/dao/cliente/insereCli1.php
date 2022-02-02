<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="site.css">
        <title>Inserir</title>
    </head>
    <body>
        <form action="./insereCli2.php" method="post">
            Nome: <input type="text"  name="nome"  value="" ><br>
            Cpf: <input type="text"  name="cpf"  value="" ><br>
            <button type="submit">enviar</button>
        </form>
    </body>
</html>
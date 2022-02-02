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
<?php include('../Includes/header.php'); ?>
</head>
<body>
<?php include('../Includes/Main.php'); ?>
<h1>Clientes</h1>
<br>

<?php

echo "<table border = '1'>";
echo "<tr>";
echo "<th>Código</th>";
echo "<th>Nome</th>";
echo "<th>Telefone</th>";
echo "<th></th>";
echo "<th></th>";        
echo "</tr>";

foreach ($clientes as $cli){
        $codigo=$cli->getCodigo();
        $nome=$cli->getNome();
        $telefone=$cli->getTelefone();
     
        echo "<tr>";
        echo "<td>".$codigo."</td>";
        echo "<td>".$nome."</td>";
        echo "<td>".$telefone."</td>" ;
        echo "<td><a href='./excluir.php?cod=$codigo'><button>Excluir</button></a>";
        echo "<td><a href='./editar.php?cod=$codigo'><button>Editar</button></a><BR>";
        echo "</tr>";
}

echo "</table>";
echo "<br><br><a href='./inserir.php'><button>Inserir</button></a>";

?>
<br><br><br><br>
<?php include('../Includes/footer.php'); ?>
</body>
</html>

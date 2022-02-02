<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require_once('../class/cliente.php');

$cod = intval($_GET["cod"]);

$clienteDao=new clienteDAO();
$cli=$clienteDao->buscaCliente($cod);
?>

<!DOCTYPE html>
<html>
<?php include("../Includes/Header.php"); ?>
</head>
<body>
<?php include("../Includes/Main.php"); ?>
<h1>Editar Cliente</h1>

  <br> <br> 
  <form method="POST" action="./editar2.php">
     Nome: <input type="text" name="nome" value="<?php echo $cli->getNome();?>"> <br /><br><br>
     Telefone: <input type="text" name="telefone" value="<?php echo $cli->getTelefone();?>"> <br />
     <input type="hidden" name="cod" value="<?php echo $cli->getCodigo();?>"> <br />
    <hr />
    <input type="submit" name="submit" value="editar">
  </form>

<br><br><br><br>
<?php include("../Includes/footer.php"); ?>
</body>
</html>

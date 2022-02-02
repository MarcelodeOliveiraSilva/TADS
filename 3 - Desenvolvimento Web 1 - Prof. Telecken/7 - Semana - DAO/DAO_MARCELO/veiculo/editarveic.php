<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require_once('../class/veiculo.php');

$cod = intval($_GET["cod"]);

$veiculoDao=new veiculoDAO();
$vei=$veiculoDao->buscaVeiculo($cod);
?>

<!DOCTYPE html>
<html>
<head>
<?php include("../Includes/Header.php"); ?>
</head>
<body>
<?php include("../Includes/Main.php"); ?>
<h1>Editar Veículo</h1>

  <br> <br>
  <form method="POST" action="./editarveic2.php">
     Modelo: <input type="text" name="modelo" value="<?php echo $vei->getModelo();?>"> <br /><br> 
     Placa: <input type="text" name="placa" value="<?php echo $vei->getPlaca();?>"> <br /><br>
     <input type="hidden" name="cod" value="<?php echo $vei->getCodigo();?>"> <br />
    <hr />
    <input type="submit" name="submit" value="editar">
  </form>
<br> <br><br> <br>

<?php include("../Includes/footer.php"); ?>
</body>
</html>

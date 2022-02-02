<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
<head>
<?php include("../Includes/Header.php"); ?>
</head>
<body>
<?php include("../Includes/Main.php"); ?>
<h1>Inserir Veículo</h1>
 <br>
  <form method="POST" action="./inserirveic2.php">
     Modelo: <input type=text name="modelo"> <br /><br>
     Placa: <input type=text name="placa"> <br /> <br>
    <hr />
    <input type="submit" name="submit" value="inserir">
  </form>
<br> <br><br> <br>
<?php include("../Includes/footer.php"); ?>
</body>
</html>

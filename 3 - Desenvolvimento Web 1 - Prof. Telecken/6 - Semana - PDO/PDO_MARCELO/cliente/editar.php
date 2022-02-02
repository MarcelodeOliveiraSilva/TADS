<?php
include '../func/conectar.php';
$con=conecta();

$codigo = $_GET["cod"];
$sql="SELECT codigo,nome,telefone FROM cliente where codigo=?";
$stm = $con->prepare($sql);
$stm->bindValue(1,$codigo);
$result = $stm->execute();

if($result)
{
	while($linha = $stm->fetch(PDO::FETCH_ASSOC)){
        $codigo=$linha['codigo'];
        $nome=$linha['nome'];
        $telefone=$linha['telefone'];     
	}
}
$stm->closeCursor();
$stm=NULL;
$con=null; 
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
     Nome: <input type="text" name="nome" value="<?php echo $nome;?>"> <br /><br><br>
     Telefone: <input type="text" name="telefone" value="<?php echo $telefone;?>"> <br />
     <input type="hidden" name="cod" value="<?php echo $codigo;?>"> <br />
    <hr />
    <input type="submit" name="submit" value="editar">
  </form>

<?php
pg_close($con);
?>
<br><br><br><br>
<?php include("../Includes/footer.php"); ?>
</body>
</html>

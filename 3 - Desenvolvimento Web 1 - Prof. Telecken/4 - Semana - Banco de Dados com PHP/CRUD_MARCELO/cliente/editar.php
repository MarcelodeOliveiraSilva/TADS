<?php
include '../func/conectar.php';
$con=conecta();

$codigo = $_GET["cod"];
//echo $codigo;
$query="SELECT * FROM cliente where codigo=$codigo";
//echo $query;
$result=pg_query($con,$query);
//mesmo selecionando apenas uma linha é preciso um laço para acessar seus valores
if($result)
{
	while ($row=pg_fetch_assoc($result))
	{
        $codigo=$row['codigo'];
        $nome=$row['nome'];
        $telefone=$row['telefone'];     
	}
}
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

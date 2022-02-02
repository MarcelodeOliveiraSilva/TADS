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
        $cpf=$row['cpf'];     
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<link rel="stylesheet" type="text/css" href="site.css">
<title>Editar</title>
</head>
<body>


  <br> <br> <br> <br>
  <form method="POST" action="./editar2.php">
     Nome: <input type="text" name="nome" value="<?php echo $nome;?>"> <br />
     CPF: <input type="text" name="cpf" value="<?php echo $cpf;?>"> <br />
     <input type="hidden" name="cod" value="<?php echo $codigo;?>"> <br />
    <hr />
    <input type="submit" name="submit" value="editar">
  </form>

<?php
pg_close($con);
?>
</body>
</html>

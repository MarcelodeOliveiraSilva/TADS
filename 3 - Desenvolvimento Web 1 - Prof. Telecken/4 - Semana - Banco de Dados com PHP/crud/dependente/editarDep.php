<?php
include '../func/conectar.php';
$con=conecta();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<link rel="stylesheet" type="text/css" href="site.css">
<title>Inserir</title>
</head>
<body>
<?php
$codigo = $_GET["cod"];
//echo $codigo;
$query="SELECT * FROM dependente where codigo=$codigo";
//echo $query;
$result=pg_query($con,$query);
//mesmo selecionando apenas uma linha é preciso um laço para acessar seus valores
if($result)
{
	while ($row=pg_fetch_assoc($result))
	{
        $codigo=$row['codigo'];
        $nome=$row['nome'];
        $relacao=$row['relacao'];  
        $cliente=$row['cliente'];   
	}
}
?>
  <br> <br> <br> <br>
  <form method="POST" action="./editarDep2.php">
     <input type="hidden" name="codigo" value="<?php echo $codigo?>">
     Nome: <input type=text name="nome" value="<?php echo $nome?>"> <br />
     Relação: <input type=text name="relacao" value="<?php echo $relacao?>"> <br />
     Cliente: 
     <select name="cliente">
     <?php
     
    $query='SELECT * FROM cliente';
    $result=pg_query($con,$query);

    if($result){
        while ($row=pg_fetch_assoc($result)) {
            $codigo = $row['codigo'];
            $nome = $row['nome'];
            if($codigo==$cliente)
                echo "<option selected value='$codigo'>$nome</option>";
            else
                echo "<option value='$codigo'>$nome</option>";
        }
    }
?>
 </select>



    <hr />
    <input type="submit" name="submit" value="Alterar">
  </form>

<?php

pg_close($con);
?>
</body>
</html>

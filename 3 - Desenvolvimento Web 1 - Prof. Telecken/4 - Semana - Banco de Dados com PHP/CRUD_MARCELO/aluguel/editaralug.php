<?php
include '../func/conectar.php';
$con=conecta();
?>

<!DOCTYPE html>
<html>
<head>
<?php include("../Includes/Header.php"); ?>
</head>
<body>
<?php include("../Includes/Main.php"); ?>
<h1>Editar Aluguel</h1>
<?php
$codigo = $_GET["cod"];
//echo $codigo;
$query="SELECT * FROM aluguel where codigo=$codigo";
//echo $query;
$result=pg_query($con,$query);
//mesmo selecionando apenas uma linha é preciso um laço para acessar seus valores
if($result)
{
	while ($row=pg_fetch_assoc($result))
	{
                    $codigo=$row['codigo'];
                    $preco=$row['preco'];
                    $datainicio=$row['datainicio'];
                    $datafim=$row['datafim'];
                    $situacao=$row['situacao'];
                    $cliente=$row['cliente'];
                    $veiculo=$row['veiculo'];   
	}
}
?>
  <br> <br>
  <form method="POST" action="./editaralug2.php">
    <input type="hidden" name="codigo" value="<?php echo $codigo?>">
    Data Início: <input type=date name="dataInicio" value="<?php echo $datainicio?>"> <br /><br>
    Data Fim: <input type=date name="dataFim" value="<?php echo $datafim?>"> <br /><br>
    Preço: <input type=text name="preco" value="<?php echo $preco?>"> <br /><br>
    Situação: <input type=radio name="situacao" value="Alugado">Alugado
              <input type=radio name="situacao" value="Livre">Livre <br /><br>

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
    </select><br>
    Veículo: 
    <select name="veiculo">
        <?php
          $query='SELECT * FROM veiculo';
          $result=pg_query($con,$query);
          if($result){
              while ($row=pg_fetch_assoc($result)) {
                  $codigo = $row['codigo'];
                  $modelo = $row['modelo'];
            if($codigo==$veiculo)
                echo "<option selected value='$codigo'>$modelo</option>";
            else
                echo "<option value='$codigo'>$modelo</option>";
              }
          }

         pg_close($con); 
        ?>
    </select><br>



    <hr />
    <input type="submit" name="submit" value="Alterar">
  </form>
<br><br><br><br>
<?php include("../Includes/footer.php"); ?>
</body>
</html>

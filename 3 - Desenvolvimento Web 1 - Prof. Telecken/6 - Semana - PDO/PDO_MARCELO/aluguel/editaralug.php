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

$sql="SELECT codigo,preco,datainicio,datafim,situacao,cliente,veiculo FROM aluguel where codigo=?";
$stm = $con->prepare($sql);
$stm->bindValue(1,$codigo);
$result = $stm->execute();


if($result)
{
	while($linha = $stm->fetch(PDO::FETCH_ASSOC)){
                    $codigo=$linha['codigo'];
                    $preco=$linha['preco'];
                    $datainicio=$linha['datainicio'];
                    $datafim=$linha['datafim'];
                    $situacao=$linha['situacao'];
                    $cliente=$linha['cliente'];
                    $veiculo=$linha['veiculo'];   
	}
}
 
?>
  <br> <br>
  <form method="POST" action="./editaralug2.php">
    <input type="hidden" name="codigo" value="<?php echo $codigo?>">
    Data Início: <input type=date name="dataInicio" value="<?php echo $datainicio?>"> <br /><br>
    Data Fim: <input type=date name="dataFim" value="<?php echo $datafim?>"> <br /><br>
    Preço: <input type=text name="preco" value="<?php echo $preco?>"> <br /><br>
    Situação: <select name="situacao">
              <option value="Alugado" <?=($situacao == 'Alugado')?'selected':''?>>Alugado</option>
              <option value="Livre" <?=($situacao == 'Livre')?'selected':''?>>Livre </option>
              </select><br /><br>

    Cliente: 
    <select name="cliente">
    
        <?php
            $sql="SELECT * FROM cliente";
            $stm = $con->prepare($sql);
            $tabela=$stm->execute();

            if($tabela){
                while($linha = $stm->fetch(PDO::FETCH_ASSOC)){
                    $codigo = $linha['codigo'];
                    $nome = $linha['nome'];
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
          $sql="SELECT * FROM veiculo";
          $stm = $con->prepare($sql);
            $tabela=$stm->execute();

          if($tabela){
              while($linha = $stm->fetch(PDO::FETCH_ASSOC)){
                  $codigo = $linha['codigo'];
                  $modelo = $linha['modelo'];
            if($codigo==$veiculo)
                echo "<option selected value='$codigo'>$modelo</option>";
            else
                echo "<option value='$codigo'>$modelo</option>";
              }
          }
                
        ?>
    </select><br>
    <input type="submit" name="submit" value="Alterar">
  </form>
<br><br><br><br>
<?php
$stm->closeCursor();
$stm=NULL;
$con=null; 
include("../Includes/footer.php"); ?>
</body>
</html>

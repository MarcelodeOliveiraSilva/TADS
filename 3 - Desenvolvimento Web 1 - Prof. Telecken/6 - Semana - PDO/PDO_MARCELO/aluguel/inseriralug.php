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
<h1>Inserir Aluguel</h1>
  <br> <br> 
  <form method="POST" action="./inseriralug2.php">
     Data Início: <input type=date name="dataInicio"> <br /><br>
     Data Fim: <input type=date name="dataFim"> <br /><br>
     Preço: <input type=text name="preco"> <br /><br>
     Situação: <select name="situacao">
              <option value="Alugado">Alugado</option>
              <option value="Livre">Livre</option> 
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
                  echo "<option value='$codigo'>$nome</option>";
              }
          }
        ?>
      </select><br /><br>
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
                  echo "<option value='$codigo'>$modelo</option>";
              }
          }

        ?>
      </select><br>

    <hr />
    <input type="submit" name="submit" value="inserir">
  </form>
<br><br><br><br>
<?php 
$stm->closeCursor();
$stm=NULL;
$con = NULL;
include("../Includes/footer.php"); ?>
</body>
</html>

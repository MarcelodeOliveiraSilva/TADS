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
     Situação: <input type=radio name="situacao" value="Alugado">Alugado
              <input type=radio name="situacao" value="Livre">Livre <br /><br>

     Cliente: 
     <select name="cliente">
      <?php
        //cliente codigo
        $query='SELECT * FROM cliente';
        $result=pg_query($con,$query);
          if($result){
              while ($row=pg_fetch_assoc($result)) {
                  $codigo = $row['codigo'];
                  $nome = $row['nome'];
                  echo "<option value='$codigo'>$nome</option>";
              }
          }
        ?>
      </select><br /><br>
      Veículo: 
      <select name="veiculo">
        <?php
          $query='SELECT * FROM veiculo';
          $result=pg_query($con,$query);
          if($result){
              while ($row=pg_fetch_assoc($result)) {
                  $codigo = $row['codigo'];
                  $modelo = $row['modelo'];
                  echo "<option value='$codigo'>$modelo</option>";
              }
          }

         pg_close($con); 
        ?>
      </select><br>

    <hr />
    <input type="submit" name="submit" value="inserir">
  </form>
<br><br><br><br>
<?php include("../Includes/footer.php"); ?>
</body>
</html>

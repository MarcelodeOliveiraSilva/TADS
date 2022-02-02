<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require_once('../func/conectar.php');
require_once('../class/cliente.php');
require_once('../class/veiculo.php');

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
  <form method="POST" action="../aluguel/inseriralug2.php">
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
        $clienteDao=new clienteDAO();
        $clientes=$clienteDao->listaClientes();

        foreach ($clientes as $cli){
          $codigo = $cli->getCodigo();
          $nome = $cli->getNome();
          echo "<option value=$codigo>$nome</option>";
        }
          ?>
      </select><br><br>
        
      Veículo: 
      <select name="veiculo">
        <?php
        $veiculoDao=new veiculoDAO();
        $veiculos=$veiculoDao->listaVeiculo(); 
 
        foreach ($veiculos as $vei){
          $codigo = $vei->getCodigo();
          $modelo = $vei->getModelo();
          echo "<option value=$codigo>$modelo</option>";
        
        }
        ?>
      </select><br>

    <hr />
    <input type="submit" name="submit" value="inserir">
  </form>
<br><br><br><br>
<?php include("../Includes/footer.php"); ?>
</body>
</html>
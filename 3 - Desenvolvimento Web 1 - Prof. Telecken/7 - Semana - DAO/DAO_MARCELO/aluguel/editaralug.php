<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require_once('../func/conectar.php');
require_once('../class/cliente.php');
require_once('../class/veiculo.php');
require_once('../class/aluguel.php');

$cod = intval($_GET["cod"]);
$aluguelDao=new aluguelDAO();
$alug=$aluguelDao->buscaAluguel($cod); ?>

<!DOCTYPE html>
<html>
<head>
<?php include("../Includes/Header.php"); ?>
</head>
<body>
<?php include("../Includes/Main.php"); ?>
<h1>Editar Aluguel</h1>

  <br> <br>
  <form method="POST" action="./editaralug2.php">
    <input type="hidden" name="cod" value="<?php echo $alug->getCodigo()?>">
    Data Início: <input type=date name="dataInicio" value="<?php echo $alug->getDataInicio()?>"> <br /><br>
    Data Fim: <input type=date name="dataFim" value="<?php echo $alug->getDataFim()?>"> <br /><br>
    Preço: <input type=text name="preco" value="<?php echo $alug->getPreco()?>"> <br /><br>
    Situação: <select name="situacao">
              <option value="Alugado" <?=(($alug->getSituacao()) == 'Alugado')?'selected':''?>>Alugado</option>
              <option value="Livre" <?=(($alug->getSituacao()) == 'Livre')?'selected':''?>>Livre </option>
              </select><br /><br>

     Cliente: 
      <select name="cliente" value="<?php echo $alug->getNomeCliente()?>">
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
      <select name="veiculo" value="<?php echo $alug->getModeloVeiculo()?>">
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
    <input type="submit" name="submit" value="Alterar">
  </form>
<br><br><br><br>
<?php include("../Includes/footer.php"); ?>
</body>
</html>

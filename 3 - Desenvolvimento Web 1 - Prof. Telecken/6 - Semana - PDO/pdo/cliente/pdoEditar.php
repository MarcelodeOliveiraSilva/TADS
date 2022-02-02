<?php
include '../func/pdoConecta.php';
$con = conectaBD();

$codigo = $_GET["cod"];
$sql="SELECT codigo, nome, cpf FROM cliente WHERE codigo = ?";
$stm = $con->prepare($sql);
$stm->bindValue(1,$codigo);
$result = $stm->execute();
//mesmo selecionando apenas uma linha é preciso um laço para acessar seus valores
if($result)
{
	while($linha = $stm->fetch(PDO::FETCH_ASSOC)){
        $codigo=$linha['codigo'];
        $nome=$linha['nome'];
        $cpf=$linha['cpf']; 
  
	}
}
$stm->closeCursor();
$stm=NULL;
$con=null; 
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
  <form method="POST" action="./pdoEditar2.php">
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
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
  <br> <br> <br> <br>
  <form method="POST" action="./inserirDep2.php">
     Nome: <input type=text name="nome"> <br />
     Relação: <input type=text name="relacao"> <br />
     Cliente: 
     <select name="cliente">
     <?php
     
    $query='SELECT * FROM cliente';
    $result=pg_query($con,$query);

    if($result){
        while ($row=pg_fetch_assoc($result)) {
            $codigo = $row['codigo'];
            $nome = $row['nome'];
            echo "<option value='$codigo'>$nome</option>";
        }
    }
    pg_close($con);
?>
 </select>



    <hr />
    <input type="submit" name="submit" value="inserir">
  </form>


</body>
</html>

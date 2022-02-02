<!DOCTYPE html>
<html>
<head>
<?php include("../Includes/Header.php"); ?>
</head>
<body>
<?php include("../Includes/Main.php"); ?>
<h1>Inserir Clientes</h1>
 <br>
  <form method="POST" action="./inserir2.php">
     Nome: <input type=text name="nome"> <br /><br><br>
     Telefone: <input type=text name="telefone"> <br />
    <hr />
    <input type="submit" name="submit" value="inserir">
  </form>
  <br><br><br><br>

<?php include("../Includes/footer.php"); ?>
</body>
</html>

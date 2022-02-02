<?php
//mostrar erros no debug
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
//montar string, separar itens facilita futuras alterações
$servername = "127.0.0.1";
$port = "";
$username = "postgres";
$password = "postgres";
$dbname = "loja";
$string="host=$servername dbname=$dbname  user=$username password=$password";
//criar conexão com BD
$con = pg_connect($string);
// testa se a conexao falhou
  if (!$con) {
    print("Falha na conexão");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<link rel="stylesheet" type="text/css" href="site.css">
<title>Inserir</title>
</head>
<body>

<?php  // Se o form nao foi submetido.
  if(!$_POST["submit"]) {
?>
  <br> <br> <br> <br>
  <form method="POST" action="./inserir.php">
     Nome: <input type=text name="nome"> <br />
     CPF: <input type=text name="cpf"> <br />
    <hr />
    <input type="submit" name="submit" value="inserir">
  </form>

<?php
// se o form foi submetido
} else {

    //montar string com os dados do form    
    $nome=$_POST["nome"];
    $cpf=$_POST["cpf"];  
    $query= "INSERT INTO cliente (nome,cpf) values ('$nome','$cpf')";
   // echo $query;
   // echo "<br>";
    //inserir
    pg_query($con, $query);
    echo "Inserção feita";
}
pg_close($con);
?>
</body>
</html>

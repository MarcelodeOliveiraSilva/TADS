<?php
  include 'conecta.php';
  $con = conecta();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Trabalho 2 Web 1</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    </script>
</head>
<body>
        <header class="jumbotron">
            <h1 class="azul">Página Inserir</h1>
            <p class="violeta">Página inserir em HTML5 com Bootstrap</p>
    </header>

<?php  // Se o form nao foi submetido.
  if(!$_POST["submit"]) {
?>
  <br> <br> <br> <br>
  <form method="POST" action="./inserir.php">
    Código: <input type="number" name="codigo"> <br />
    Nome: <input type="text" name="nome"> <br />
    Telefone: <input type="number" name="telefone"> <br />   

    <hr />
    <input type="submit" name="submit" value="inserir">
  </form>

<?php
// se o form foi submetido
} else {

    //montar string com os dados do form
    $codigo=$_POST["codigo"];    
    $nome=$_POST["nome"];
    $telefone=$_POST["telefone"];

    $query= "INSERT INTO cliente (codigo,nome,telefone) values ('$codigo','$nome','$telefone')";
   // echo $query;
   // echo "<br>";
    //inserir
    pg_query($con, $query);
    echo "Inserção feita";
}
pg_close($con);
?>

    <footer class="jumbotron">
          <h1 >Rodapé</h1>
          <p>Comentário de rodapé</p>
      </div>
    </footer>
</body>
</html>

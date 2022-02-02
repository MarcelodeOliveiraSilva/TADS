<?php
  include 'conecta.php';
  $con = conecta();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Trabalho 2 Web 1</title>
    <meta charset="UTF-8">
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
      <h1 class="azul">Página Selecionar</h1>
      <p class="violeta">Página selecionar em HTML5 com Bootstrap</p>
    </header>

    <?php
      $query='SELECT * FROM cliente';
      $result=pg_query($con,$query);

      if($result){
        while ($row=pg_fetch_assoc($result))	{
              $codigo=$row['codigo'];
              $nome=$row['nome'];
              $telefone=$row['telefone'];
              echo "<table border = '1'>";
              echo "<tr><th>Código</th><td>".$codigo."</td></tr>";
              echo "<tr><th>Nome</th><td>".$nome."</td></tr>";
              echo "<tr><th>Telefone</th><td>".$telefone."</td></tr>";
              
        }
      }
      //$result armzena a matriz resultado da consulta ou FALSE
      //$row armazena uma linha da matriz
      //$row['coluna'] valor armazenado na linha/coluna
      //pg_fetch_assoc - referencia colunas por nome
      //pg_fech_row - referencia colunas por indice (0,1,2,3...)
      //pg_fetch_array - referencia colunas por nome ou índice
      pg_close($con);
    ?>
    <footer class="jumbotron">
      <h1 >Rodapé</h1>
      <p>Comentário de rodapé</p>
    </div>
    </footer>
  </body>
</html>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Php</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <style>
        table, tr, td { border: 2px solid black; }
    </style>
</head>
<body>

<?php

$processador= $_POST["processador"];
$livros=$_POST["livros"] ; //$livros é um vetor
echo "Seu processador é: $processador <br><br>";

// Verifica se usuário escolheu algum livro
if(isset($_POST["livros"])) 
{ 
   // Faz loop para colocar os livros escolhidos em uma tabela 
   echo"<table><tr><td><b>Livros escolhidos</b></td></tr>";   
   foreach($livros as $livro) 
   { 
      echo "<tr><td> $livro </td></tr>"; 
   }
   echo "</table>";      
} 
else 
{ 
   echo "Você não escolheu nenhum livro!"; 
} 
?>
        
</body>
</html>


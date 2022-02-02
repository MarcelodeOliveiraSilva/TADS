<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Php</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
</head>

<body>

<?php
// criar a seguinte base de dados
// # create database loja;
// # psql loja;
// loja=# CREATE TABLE cliente (...);
//mostrar erros no debug
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

 $cores=$_POST["cores"];
 // Verifica se usuário escolheu alguma cor 
 
 if(isset($_POST["cores"])) 
	{  echo "As cores de sua preferência são:<BR>";
 	    // Faz loop pelo array dos numeros 
	    foreach($cores as $cor) 
		{ echo "-  $cor  <BR>"; } 
	} 
	else { echo "Você não escolheu uma cor!<br>"; }
     // Verifica se usuário quer receber newsletter 
    if(isset($_POST["news"])) 
		{ echo "Você deseja receber as novidades por email!"; } 
	else 
        { echo "Você não quer receber novidades por email..."; } 
        
        ?> 
        

</body>
</html>


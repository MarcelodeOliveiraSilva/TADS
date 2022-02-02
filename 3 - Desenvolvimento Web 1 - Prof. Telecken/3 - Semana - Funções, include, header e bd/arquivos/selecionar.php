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
<title>Selecionar</title>
</head>
<body>

<?php
$query='SELECT * FROM cliente';
$result=pg_query($con,$query);

if($result)
{
	while ($row=pg_fetch_assoc($result))
	{
        $codigo=$row['codigo'];
        $nome=$row['nome'];
        $cpf=$row['cpf'];
        echo "Código:$codigo, Nome:$nome, CPF:$cpf <BR> ";
        
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
</body>
</html>

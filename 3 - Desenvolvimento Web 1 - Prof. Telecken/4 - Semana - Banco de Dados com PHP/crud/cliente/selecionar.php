<?php
include '../func/conectar.php';
$con=conecta();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
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
        echo "Código:$codigo, Nome:$nome, CPF:$cpf <a href='./excluir.php?cod=$codigo'>Excluir</a> ---
        <a href='./editar.php?cod=$codigo'>Editar</a><BR>";  
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
<br><br>
<a href='./inserir.php'>Inserir</a>
</body>
</html>

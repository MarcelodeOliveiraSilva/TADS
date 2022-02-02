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
//O que vai entre <<<SQL e SQL é um comando SQL tal qual ele é colocado no BD sem se preocupar com caracteres especiais
$query=<<<SQL
        SELECT dep.*, 
        cli.nome as clientenome
        FROM dependente dep 
        JOIN cliente cli ON (dep.cliente = cli.codigo);
        SQL;

$result=pg_query($con,$query);

if($result)
{
	while ($row=pg_fetch_assoc($result))
	{
        $codigo=$row['codigo'];
        $nome=$row['nome'];
        $cliente=$row['clientenome'];
        $relacao=$row['relacao'];
        echo "Código:$codigo, Nome:$nome, Cliente:$cliente ,Relação:$relacao --- 
        <a href='./excluirDep.php?cod=$codigo'>Excluir</a> ---
        <a href='./editarDep.php?cod=$codigo'>Editar</a><BR>";
        
	}
}

pg_close($con);
?>
<br><br><br>
<a href='./inserirDep.php'>Inserir</a>
</body>
</html>

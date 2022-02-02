<?php
include '../func/conectar.php';
$con=conecta();
?>

<!DOCTYPE html>
<html>
<head>
<?php include("../Includes/Header.php"); ?>
</head>
<body>
<?php include("../Includes/Main.php"); ?>
<h1>Aluguel</h1>
<br><br>

    <?php
        $query=<<<SQL
            SELECT aluguel.*,
            cliente.codigo as codcliente,cliente.nome as nomecliente,
            veiculo.codigo as codveiculo, veiculo.modelo as modeloveiculo
            FROM aluguel
            JOIN cliente ON aluguel.cliente = cliente.codigo
            JOIN veiculo ON aluguel.veiculo = veiculo.codigo;
            SQL;
        
        $result=pg_query($con,$query);

                echo "<table border = '1'>";
                echo "<tr>";
                echo "<th>Código</th>";
                echo "<th>Código Cliente</th>";
                echo "<th>Nome Cliente</th>";
                echo "<th>Código Veículo</th>";
                echo "<th>Modelo Veículo</th>";
                echo "<th>Preço</th>";
                echo "<th>Data Início</th>";
                echo "<th>Data Fim</th>";
                echo "<th>Situação</th>";
                echo "<th></th>";
                echo "<th></th>";        
                echo "</tr>";

            if($result){
                while ($row=pg_fetch_assoc($result))                {
                    $codigo=$row['codigo'];
                    $cliente=$row['codcliente'];
                    $nomecliente=$row['nomecliente'];
                    $veiculo=$row['codveiculo'];
                    $modeloveiculo=$row['modeloveiculo'];
                    $preco=$row['preco'];
                    $datainicio=$row['datainicio'];
                    $datafim=$row['datafim'];
                    $situacao=$row['situacao'];

                    echo "<tr>";
                    echo "<td>".$codigo."</td>";
                    echo "<td>".$cliente."</td>";
                    echo "<td>".$nomecliente."</td>";
                    echo "<td>".$veiculo."</td>";
                    echo "<td>".$modeloveiculo."</td>";
                    echo "<td>".$preco."</td>";
                    echo "<td>".$datainicio."</td>";
                    echo "<td>".$datafim."</td>";
                    echo "<td>".$situacao."</td>";
                    echo "<td><a href='./excluiralug.php?cod=$codigo'><button>Excluir</button></a>";
                    echo "<td><a href='./editaralug.php?cod=$codigo'><button>Editar</button></a><br>";
                    echo "</tr>";
                    
                }
            }
        
        echo "</table>";

        pg_close($con);
    ?>
<br><br>
<a href='./inseriralug.php'><button>Inserir</button></a>
<br><br><br><br><br><br>
<?php include("../Includes/footer.php"); ?>
</body>
</html>

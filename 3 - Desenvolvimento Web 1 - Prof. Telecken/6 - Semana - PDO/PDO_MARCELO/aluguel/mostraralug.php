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
        $sql="
            SELECT aluguel.codigo as codigo,cliente.codigo as codcliente,cliente.nome as nomecliente,
            veiculo.codigo as codveiculo, veiculo.modelo as modeloveiculo,aluguel.preco as preco,
            aluguel.datainicio as datainicio ,aluguel.datafim as datafim,
            aluguel.situacao as situacao
            FROM aluguel
            JOIN cliente ON aluguel.cliente = cliente.codigo
            JOIN veiculo ON aluguel.veiculo = veiculo.codigo";
            
        $stm = $con->prepare($sql);
        $tabela=$stm->execute();

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

            if($tabela){
                while($linha = $stm->fetch(PDO::FETCH_ASSOC)){
                    $codigo=$linha['codigo'];
                    $cliente=$linha['codcliente'];
                    $nomecliente=$linha['nomecliente'];
                    $veiculo=$linha['codveiculo'];
                    $modeloveiculo=$linha['modeloveiculo'];
                    $preco=$linha['preco'];
                    $datainicio=$linha['datainicio'];
                    $datafim=$linha['datafim'];
                    $situacao=$linha['situacao'];

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

    
echo "<br><br><a href='./inseriralug.php'><button>Inserir</button></a>";
$stm->closeCursor();
$stm=NULL;
$con = NULL;

?>
<br><br><br><br><br><br>
<?php include("../Includes/footer.php"); ?>
</body>
</html>

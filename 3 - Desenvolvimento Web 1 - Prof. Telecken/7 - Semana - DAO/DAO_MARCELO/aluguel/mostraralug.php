<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require_once('../class/aluguel.php');

$aluguelDao=new aluguelDAO();
$alugueis=$aluguelDao->listaAluguel(); ?>

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

    foreach ($alugueis as $alug){
        $codigo=$alug->getCodigo();
        $cliente=$alug->getCliente();
        $nomecliente=$alug->getNomeCliente();
        $veiculo=$alug->getVeiculo();
        $modeloveiculo=$alug->getModeloVeiculo();
        $preco=$alug->getPreco();
        $datainicio=$alug->getDataInicio();
        $datafim=$alug->getDataFim();
        $situacao=$alug->getSituacao();

                    echo "<tr>";
                    echo "<td>$codigo</td>";
                    echo "<td>".$cliente."</td>";
                    echo "<td>".$nomecliente."</td>";
                    echo "<td>".$veiculo."</td>";
                    echo "<td>".$modeloveiculo."</td>";
                    echo "<td>".$preco."</td>";
                    echo "<td>".$datainicio."</td>";
                    echo "<td>".$datafim."</td>";
                    echo "<td>$situacao</td>";
                    echo "<td><a href='./excluiralug.php?cod=$codigo'><button>Excluir</button></a>";
                    echo "<td><a href='./editaralug.php?cod=$codigo'><button>Editar</button></a><br>";
                    echo "</tr>";
                    
    }
        echo "</table>";
        echo "<br><br><a href='./inseriralug.php'><button>Inserir</button></a>";


?>
<br><br><br><br><br><br>
<?php include("../Includes/footer.php"); ?>
</body>
</html>

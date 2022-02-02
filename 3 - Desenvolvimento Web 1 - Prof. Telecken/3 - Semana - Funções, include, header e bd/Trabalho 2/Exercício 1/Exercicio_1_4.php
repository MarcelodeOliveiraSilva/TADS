<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Trabalho 2 - Web 1</title>
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
            <h1 class="azul">Página 4</h1>
            <p class="violeta">Informações Gerais sobre o Pedido</p>
    </header>
    <div>

            <?php 
                session_start();

                    echo "<p><b>Informações do Usuário: </b></p>";
                    echo "Nome: ".$_SESSION['nome'];
                    echo "</br>";
                    echo "Nascimento: ".$_SESSION['nascimento'];
                    echo "</br>";
                    echo "Profissão: ".$_SESSION['profissao'];
                    echo "</br>";                    
                    echo "</br>";

                    echo "<p><b>Informações do Produto: </b></p>";                    
                    echo "Título: ".$_SESSION['titulo'];
                    echo "</br>";
                    echo "Autor: ".$_SESSION['autor'];
                    echo "</br>";
                    echo "Código: ".$_SESSION['codigo'];
                    echo "</br>";
                    echo "</br>";

                    echo "<p><b>Informações do Endereço de Entrega: </b></p>";
                    echo "Cidade: ".$_POST['cidade'];
                    echo "</br>";
                    echo "Endereço: ".$_POST['endereco'];
                    echo "</br>";
                    echo "CEP: ".$_POST['cep'];
                    echo "</br>";
                    echo "</br>";

            ?>
    </div>
    <div>
        <p><b>Condorda com as informações do pedido?</b></p>
        <button type="button" onclick="location.href='fecha.php'">Sim</button>
        <button type="button" onclick="location.href='Exercicio_1_1.php'">Não</button>
    </div>

</body>

</html>
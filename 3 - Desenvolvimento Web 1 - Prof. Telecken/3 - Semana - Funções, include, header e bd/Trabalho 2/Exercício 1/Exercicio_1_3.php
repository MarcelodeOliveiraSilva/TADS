<?php session_start(); ?>
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
            <h1 class="azul">Página 3</h1>
            <p class="violeta">Informações Sobre o Endereço de Entrega</p>
    </header>

    <nav >
        
      </nav>

    <main class="container">
            <?php
                session_start();
                $_SESSION['titulo'] = $_POST['titulo'];
                $_SESSION['autor'] = $_POST['autor'];
                $_SESSION['codigo'] = $_POST['codigo'];
            ?>

        <form method="post" action="Exercicio_1_4.php">
        
            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade" /><br /><br>

        
            <label for="endereco">Endereço</label>
            <input type="text" id="endereco" name="endereco" /><br /><br>
                
            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" /><br /><br>

            <input type="submit" value="Próxima">
        </form>

    </main>

    <footer class="jumbotron">
          <p>*Ao Clicar em Próxima, você será direcionado para a página que mostra todas informações</p>
      </div>
    </footer>

</body>

</html>
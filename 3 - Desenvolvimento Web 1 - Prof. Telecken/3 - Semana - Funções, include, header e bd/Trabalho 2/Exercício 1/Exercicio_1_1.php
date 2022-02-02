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
            <h1 class="azul">Página 1</h1>
            <p class="violeta">Informações dos Usuários</p>
    </header>

    <nav ></nav>

    <main class="container">
            <form method="POST" action="Exercicio_1_2.php">
                <label for="nome">Nome: </label>
                <input type="text" name="nome"/><br><br>

                <label for="nascimento">Nascimento: </label>
                <input type="date" name="nascimento"/><br><br>

                <label for="profissao">Profissão: </label>
                <input type="text" name="profissao"/><br><br>

                <input type="submit" value="Próxima">
            </form>
    </main>

    <footer class="jumbotron">
          <p>*Ao Clicar em Próxima, você será direcionado para a página de informações sobre o produto(livro)</p>
      </div>
    </footer>

</body>

</html>
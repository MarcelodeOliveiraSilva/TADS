<!DOCTYPE html>
<html>
<head>
	<title>exer1</title>
</head>
<body>
	<?php 

        echo "<table border = '1'>";
		echo "<tr><th>Nome</th><td>".$_POST["nome"]."</td></tr>";
		echo "<tr><th>Campo Hidden</th><td>".$_POST["escondido"]."</td></tr>";
		echo "<tr><th>ID</th><td>".$_POST["id"]."</td></tr>";
		echo "<tr><th>E-mail</th><td>".$_POST["email"]."</td></tr>";
		echo "<tr><th>Mensagem</th><td>". $_POST["mensagem"]."</td></tr>";
		echo "<tr><th>Profissão</th><td>".$_POST["profissao"]."</td></tr>";
		echo "<tr><th>Processador</th><td>".$_POST["processador"]."</td></tr>";
		
		if(isset($_POST["cores"])){
			echo "<tr><th>Cor(es)</th><td>";
				foreach ($_POST["cores"] as $cor){
					echo ", ".$cor."<br>";
				}
				echo "</td></tr>";
		}
		
		if(isset($_POST["livros"])){
			echo "<tr><th>Livro(s) a comprar</th><td>";
				foreach ($_POST["livros"] as $livro){
					echo "- ".$livro."<br>";
				}
				echo "</td></tr>";
		}
	?>			
</body>
</html>
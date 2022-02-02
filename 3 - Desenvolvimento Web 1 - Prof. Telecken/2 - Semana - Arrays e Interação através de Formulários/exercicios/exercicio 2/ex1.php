<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	<form action="script.php" method="post">
		Seu Nome: <input type=text name="nome"><br><br/>
		<input type="hidden" name="escondido" value="valor do escondido">
		<input type="hidden" name="id" value="111">
		Email: <input type=text name="email"><br><br/>
		Mensagem: <textarea name="mensagem" cols=8 rows=3></textarea><br>

	<br><br><B>Qual sua profissão?</B><br>
	<input type=radio name="profissao" value="Estudante"> Estudante
	<input type=radio name="profissao" value="Engenheiro"> Engenheiro
	<input type=radio name="profissao" value="Professor"> Professor
	<input type=radio name="profissao" value="Outro"> Outro
	<br><br>

	<B>Escolha as suas cores favoritas:</B><br>
	<input type=checkbox name="cores[]" value="azul"> Azul<br>
	<input type=checkbox name="cores[]" value="verde"> Verde<br>
	<input type=checkbox name="cores[]" value="vermelho"> Vermelho<br>
	<input type=checkbox name="cores[]" value="outras"> Outras<br>
	<br><br>


	<B>Qual seu processador?</B><br>
	<select name="processador">
		<option value=Intel>Intel</option>
		<option value=AMD>AMD</option>
		<option value=outro>Outro</option>
	</select><BR><BR>
	
	<B>Livros que deseja comprar?</B><br> Obs: segure "CTRL" para selecionar mais de um.<BR>
	<select name="livros[]" multiple>
		<option value="Biblia do PHP 4">Biblia do PHP 4</option>
		<option value="PHP Professional">PHP Professional</option>
		<option value="Iniciando em PHP">Iniciando em PHP</option>
		<option value="Novidades do PHP 5">Novidades do PHP 5</option>
		<option value="Biblia do MySQL">Biblia do MySQL</option>
	</select><BR><BR>

	<input type=submit>
	</form>


</body>
</html>


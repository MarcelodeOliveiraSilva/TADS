<!DOCTYPE html>
<html>
<head>
	<title>exer1</title>
</head>
<body>
	
	
		<?php
			$c = $_POST["quantidade"];
			$i = 1;
			while ($i <= $c){
		?>
			<form name="x[]" action="todosnomes.php" method="post">
				<input type=text name="nome"> 
				<input type="submit">";
				</form>";
		<?php
			$i=$i+1;
			}
		?>
	
	

				
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>todosnomes</title>
</head>
<body>
	<?php

	if(isset($_POST["x"])){
		foreach ($_POST["x"] as $cor){
			echo ", ".$cor."<br>";
		}
	}

	?>
		
			
</body>
</html>
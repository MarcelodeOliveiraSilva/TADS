<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Php</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
</head>

<body>


    <?php 
    $nome=$_POST["nome"];
    $email=$_POST["email"];
    $mensagem=$_POST["mensagem"];
    echo "Ola <b> $nome </b><br>
         (Email: <i> $email </i>) <br><br>";
     echo "<b> Sua mensagem: </b> <br> $mensagem";?> 

</body>
</html>



<?php
function conecta(){
    //mostrar erros no debug
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);
    //montar string, separar itens facilita futuras alterações
    $servername = "127.0.0.1";
    $port = "5334";
    $username = "postgres";
    $password = "12345";
    $dbname = "locadora";
    $string="host=$servername dbname=$dbname  user=$username password=$password";
    //criar conexão com BD
    $con = pg_connect($string);
    // testa se a conexao falhou
      if (!$con) {
        print("Falha na conexão");
        exit; 
    }
    return $con();
}
?>
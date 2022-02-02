<?php
// criar a seguinte base de dados
// # create database loja;
// # psql loja;
// loja=# CREATE TABLE cliente (...);
//mostrar erros no debug
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
//montar string, separar itens facilita futuras alterações
$servername = "127.0.0.1";
$port = "";
$username = "postgres";
$password = "postgres";
$dbname = "loja";
$string="host=$servername dbname=$dbname  user=$username password=$password";
//imprimir string para debug, se necessário colocar string no BD
//echo $string;
//criar conexão com BD
$con = pg_connect($string);
// testa se a conexao falhou
if (!$con) {
    print("Falha na conexão.");
    exit;
}
echo "OK";
//fechar conexão
pg_close($con);
?>

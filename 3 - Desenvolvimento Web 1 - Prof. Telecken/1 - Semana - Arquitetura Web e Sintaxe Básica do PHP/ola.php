<?php
// As linhas abaixo servem para mostrar os erros de php encontrados pelo parser php ao exibir sua pg
// sem elas o erro não é mostrado. Elas só devem ser usadas em tempo de desenvolvimento
// Uma configuração correta do arquivo php.ini dispensa o uso destas linhas
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

// Abaixo coloque o seu código
echo "Ola Mundo";
?>

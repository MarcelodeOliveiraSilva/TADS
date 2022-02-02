<?php

class DAO{
   
    function conectaBD() {
        $servername = "127.0.0.1";
        $port = "";
        $username = "postgres";
        $password = "postgres";
        $dbname = "loja";
        
        try {
            $conn = new PDO("pgsql:host=$servername;dbname=$dbname;user=$username;password=$password");
            // setar PDO error mode para exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        catch(PDOException $e){
            echo "Erro na Conexao: " . $e->getMessage();
        }
    }
}
?>
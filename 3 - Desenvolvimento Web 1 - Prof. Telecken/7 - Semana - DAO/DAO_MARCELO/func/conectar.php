<?php

class DAO{

    function conecta(){

        $servername = "localhost";
        $port = "127.0.0.1";
        $username = "postgres";
        $password = "M@rc3l00";
        $dbname = "locadora";

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
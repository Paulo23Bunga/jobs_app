<?php
$sNome = "localhost";
$uNome = "root";
$pass = "";
$db_nome = "jobs_bd";

try {
    //code...
  //  $conexao  = new \PDO("mysql:host=$sNome;dbname=$db_nome", $uNome, $pass);
    $conexao  = new PDO("mysql:host=$sNome;dbname=$db_nome", $uNome, $pass);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    //throw $th;
    echo "Connexao Falhada : ". $e->getMessage();
}


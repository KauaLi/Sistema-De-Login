<?php
    include "variables.php";

    if(!isset($_SESSION)){
        session_start();
    }

    $mysqli = new mysqli($host, $user, $password, $database);

    if($mysqli->error){
        die("Erro na conexao do banco de dados");
    }
?>
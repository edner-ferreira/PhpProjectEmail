<?php

    $dbHost = 'localhost:3306';
    $dbUsername = 'root';
    $dbPassword = 'admin123';
    $dbName = 'db_sorteio';

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($conexao->connect_errno) {
        echo "Falha ao conectar: (" . $conexao->connect_errno . ") " . $conexao->connect_error;
    }
?>
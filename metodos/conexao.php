<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "todo_list";
    
    // não esquecer de tirar a porta de todos os arquivos antes de subir pros meninos usarem a padrão
    $conn = new mysqli($servername, $username, $password, $dbname, 3333);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
?>
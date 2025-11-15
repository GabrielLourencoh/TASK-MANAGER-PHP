<?php
    $hostname = "localhost";
    $dbname = "task_manager";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO('mysql:host='.$hostname.';dbname='.$dbname, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo 'A conexão com o banco de dados '.$dbname.', foi realizado com sucesso!';
    } catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
    }

?>
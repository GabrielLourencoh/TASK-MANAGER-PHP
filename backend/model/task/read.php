<?php
    include('../../connection/conn.php');

    $sql = "SELECT * FROM task";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($dados);
    $conn = null;
?>
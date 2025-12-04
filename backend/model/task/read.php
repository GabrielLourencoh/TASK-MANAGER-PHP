<?php
    include('../../connection/conn.php');
    session_start();

    $sql = "SELECT * FROM task WHERE USER_ID = ".$_SESSION['id']." ORDER BY ID DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($dados);
    $conn = null;
?>
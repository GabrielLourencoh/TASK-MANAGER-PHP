<?php

    include('../../connection/conn.php');
    
    $sql = "SELECT * FROM TASK WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $_POST['ID']
    ]);
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    echo json_encode($dados);

?>
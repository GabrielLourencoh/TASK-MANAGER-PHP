<?php

    include('../../connection/conn.php');
    session_start();

    $sql = "SELECT COUNT(ID) as PENDENTES FROM TASK WHERE STATUS = 1 AND USER_ID = '$_SESSION[id]'";
    $pendente = $conn->prepare($sql);
    $pendente->execute();
    while ($resultado = $pendente->fetch(PDO::FETCH_ASSOC)) {
        $pendentes = $resultado['PENDENTES'];
    }

    $sql = "SELECT COUNT(ID) as ANDAMENTO FROM TASK WHERE STATUS = 2 AND USER_ID = '$_SESSION[id]'";
    $andamento = $conn->prepare($sql);
    $andamento->execute();
    while ($resultado = $andamento->fetch(PDO::FETCH_ASSOC)) {
        $andamentos = $resultado['ANDAMENTO'];
    }

    $sql = "SELECT COUNT(ID) as FINALIZADO FROM TASK WHERE STATUS = 3 AND USER_ID = '$_SESSION[id]'";
    $finalizado = $conn->prepare($sql);
    $finalizado->execute();
    while ($resultado = $finalizado->fetch(PDO::FETCH_ASSOC)) {
        $finalizados = $resultado['FINALIZADO'];
    }

    $sql = "SELECT COUNT(ID) as CANCELADO FROM TASK WHERE STATUS = 4 AND USER_ID = '$_SESSION[id]'";
    $cancelado = $conn->prepare($sql);
    $cancelado->execute();
    while ($resultado = $cancelado->fetch(PDO::FETCH_ASSOC)) {
        $cancelados = $resultado['CANCELADO'];
    }

    $dados = array(
        'pendentes' => $pendentes,
        'andamentos' => $andamentos,
        'finalizados' => $finalizados,
        'cancelados' => $cancelados
    );

    $conn = null;
    echo json_encode($dados);

?>
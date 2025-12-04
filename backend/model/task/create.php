<?php

    include('../../connection/conn.php');
    session_start();

    if (empty($_POST['DESCRIPTION']) || empty($_POST['TITLE'])) {
        $dados = array(
            "type" => "error",
            "message" => "Existe(m) campo(s) obrigatório(s) não preenchido(s)."
        );
    } else {
        try {
            $sql = "INSERT INTO task (DATE_TIME, TITLE, DESCRIPTION, STATUS, USER_ID) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                $_POST['DATE_TIME'],
                $_POST['TITLE'],
                $_POST['DESCRIPTION'],
                '1', 
                $_SESSION['id']
            ]);
            
            $dados = array(
                "type" => "success",
                "message" => "Registro salvo com sucesso!"
            );
        } catch (PDOException $e) {
            $dados = array(
                "type" => "error",
                "message" => "Erro ao criar o registro: " . $e->getMessage()
            );
        }
    }

    $conn = null;
    echo json_encode($dados);

?>
<?php
    include('../../connection/conn.php');

    if (empty($_POST['DATETIME']) || empty($_POST['DESCRIPTION']) || empty($_POST['TITLE']) || empty($_POST['USERID'])) {
        $dados = array(
            "type" => "error",
            "message" => "Existe(m) campo(s) obrigatório(s) não preenchido(s)."
        );
    } else {
        try {
            $sql = "SELECT * FROM user WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$_POST['USERID']]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$user) {
                $dados = array(
                    "type" => "error",
                    "message" => "Erro ao criar o registro: Usuário de ID ".$_POST['USERID']." não existe. "
                );
            } else {
                $sql = "INSERT INTO task (DATETIME, DESCRIPTION, TITLE, USERID) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    $_POST['DATETIME'],
                    $_POST['DESCRIPTION'], 
                    $_POST['TITLE'], 
                    $_POST['USERID']
                ]);
                $dados = array(
                    "type" => "success",
                    "message" => "Registro salvo com sucesso!"
                );
            }
        } catch (PDOException $e){
            $dados = array(
                "type" => "error",
                "message" => "Erro ao criar o registro: ".$e->getMessage()
            );
        }
    }

    $conn = null;
    echo json_encode($dados);
?>
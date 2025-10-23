<?php
    include('../../connection/conn.php');

    date_default_timezone_set('America/Sao_Paulo');
    $datalocal = date('Y-m-d H:i:s', time());

    if (empty($_POST['DESCRIPTION']) || empty($_POST['TITLE']) || empty($_POST['USER_ID'])) {
        $dados = array(
            "type" => "error",
            "message" => "Existe(m) campo(s) obrigatório(s) não preenchido(s)."
        );
    } else {
        try {
            $sql = "SELECT * FROM user WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$_POST['USER_ID']]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$user) {
                $dados = array(
                    "type" => "error",
                    "message" => "Erro ao criar o registro: Usuário de ID ".$_POST['USER_ID']." não existe. "
                );
            } else {
                $sql = "INSERT INTO task (DATE_TIME, TITLE, DESCRIPTION, STATUS, USER_ID) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    $datalocal,
                    $_POST['TITLE'], 
                    $_POST['DESCRIPTION'], 
                    '1',
                    $_POST['USER_ID']
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
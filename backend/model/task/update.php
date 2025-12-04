<?php
    include('../../connection/conn.php');

    date_default_timezone_set('America/Sao_Paulo');
    $datalocal = date('Y-m-d H:i:s', time());

    if (empty($_POST['DESCRIPTION']) || empty($_POST['TITLE']) || empty($_POST['ID'])) {
        $dados = array(
            "type" => "error",
            "message" => "Existe(m) campo(s) obrigatório(s) não preenchido(s)."
        );
    } else {
        try {
            $sql = "SELECT * FROM task WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$_POST['ID']]);
            $task = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$task) {
                $dados = array(
                    "type" => "error",
                    "message" => "Erro ao atualizar o registro: Task de ID ".$_POST['ID']." não existe. "
                );
            } else {
                $sql = "UPDATE task SET TITLE = ?, DESCRIPTION = ?, DATE_TIME = ? WHERE ID = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    $_POST['TITLE'],
                    $_POST['DESCRIPTION'], 
                    $_POST['DATE_TIME'],
                    $_POST['ID']
                ]);
                $dados = array(
                    "type" => "success",
                    "message" => "Registro atualizado com sucesso!"
                );
            }
        } catch (PDOException $e) {
            $dados = array(
                "type" => "error",
                "message" => "Erro ao atualizar o registro: ".$e->getMessage()
            );
        }
    } 

    $conn = null;
    echo json_encode($dados);
?>
<?php
    include('../../connection/conn.php');

    if (empty($_POST['DATETIME']) || empty($_POST['DESCRIPTION']) || empty($_POST['TITLE']) || empty($_POST['USERID']) || empty($_POST['ID'])) {
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
                    "message" => "Erro ao atualizar o registro: Usuário de ID ".$_POST['USERID']." não existe. "
                );
            } else {
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
                    $sql = "UPDATE task SET DATETIME = ?, DESCRIPTION = ?, TITLE = ?, USERID = ? where id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([
                        $_POST['DATETIME'],
                        $_POST['DESCRIPTION'], 
                        $_POST['TITLE'], 
                        $_POST['USERID'], 
                        $_POST['ID']
                    ]);
                    $dados = array(
                        "type" => "success",
                        "message" => "Registro atualizado com sucesso!"
                    );
                }
            }
        } catch (PDOException $e){
            $dados = array(
                "type" => "error",
                "message" => "Erro ao atualizar o registro: ".$e->getMessage()
            );
        }
    }

    $conn = null;
    echo json_encode($dados);
?>
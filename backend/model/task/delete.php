<?php
    include('../../connection/conn.php');

    if (empty($_POST['ID'])) {
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
                    "message" => "Erro ao deletar o registro: Task de ID ".$_POST['ID']." não existe. "
                );
            } else {
                $sql = "DELETE FROM task WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    $_POST['ID']
                ]);
                $dados = array(
                    "type" => "success",
                    "message" => "Registro excluido com sucesso!"
                );
            }
        } catch (PDOException $e){
            $dados = array(
                "type" => "error",
                "message" => "Erro ao excluir o registro: ".$e->getMessage()
            );
        }
    }

    echo json_encode($dados);
    $conn = null;
?>
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
                $sql = "UPDATE task SET STATUS = ? WHERE ID = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    '4',
                    $_POST['ID']
                ]);
                $dados = array(
                    "type" => "success",
                    "message" => "Registro cancelado com sucesso!"
                );
            }
        } catch (PDOException $e){
            $dados = array(
                "type" => "error",
                "message" => "Erro ao cancelar o registro: ".$e->getMessage()
            );
        }
    }

    echo json_encode($dados);
    $conn = null;
?>
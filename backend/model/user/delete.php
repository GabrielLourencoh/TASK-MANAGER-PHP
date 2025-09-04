<?php
    include('../../connection/conn.php');

    if (empty($_POST['id'])) {
        $dados = array(
            "type" => "error",
            "message" => "Existe(m) campo(s) obrigatório(s) não preenchido(s)."
        );
    } else {
        try {
            $sql = "DELETE FROM user WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                $_POST['id']
            ]);
            $dados = array(
                "type" => "success",
                "message" => "Registro excluido com sucesso!"
            );
            
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
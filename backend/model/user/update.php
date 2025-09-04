<?php
    include('../../connection/conn.php');

    if (empty($_POST['name']) || empty($_POST['email'])
    || empty($_POST['password']) || empty($_POST['level']) || empty($_POST['id'])) {
        $dados = array(
            "type" => "error",
            "message" => "Existe(m) campo(s) obrigatório(s) não preenchido(s)."
        );
    } else {
        try {
            $sql = "UPDATE user SET name = ?, email = ?, password = ?, level = ? where id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                $_POST['name'],
                $_POST['email'], 
                $_POST['password'], 
                $_POST['level'],
                $_POST['id']
            ]);
            $dados = array(
                "type" => "success",
                "message" => "Registro alterado com sucesso!"
            );
            
        } catch (PDOException $e){
            $dados = array(
                "type" => "error",
                "message" => "Erro ao atualizar o registro: ".$e->getMessage()
            );
        }
    }

    echo json_encode($dados);
    $conn = null;
?>
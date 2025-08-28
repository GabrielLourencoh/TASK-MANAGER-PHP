<?php
    include('../../connection/conn.php');

    if (empty($_POST['name']) || empty($_POST['email'])
    || empty($_POST['password']) || empty($_POST['level'])) {
        $dados = array(
            "type" => "error",
            "message" => "Existe(m) campo(s) obrigatório(s) não preenchido(s)."
        );
    } else {
        try {
            $sql = "INSERT INTO user (name, email, password, level) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                $_POST['name'],
                $_POST['email'], 
                $_POST['password'], 
                $_POST['level']
            ]);
            $dados = array(
                "type" => "success",
                "message" => "Registro salvo com sucesso!"
            );
            
        } catch (PDOException $e){
            $dados = array(
                "type" => "error",
                "message" => "Erro ao salvar o registro: ".$e->getMessage()
            );
        }
    }

    $conn = null;
    echo json_encode($dados);
?>
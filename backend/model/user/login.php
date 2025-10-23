<?php
    include('../../connection/conn.php');

    $sql = "SELECT *, count(ID) as achou FROM user WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $_POST['email'], 
        $_POST['password']
    ]);
    
    while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($resultado['achou'] == '1') {
            session_start();
            $_SESSION['name'] = $resultado['name'];
            $_SESSION['email'] = $resultado['email'];
            $_SESSION['level'] = $resultado['level'];
            $_SESSION['id'] = $resultado['id'];
            $dados = array(
                "type" => "success",
                "message" => "Login realizado com sucesso!"
            );
        } else {
            $dados = array(
                "type" => "error",
                "message" => "Email ou senha incorretos!"
            );
        }
    }

    echo json_encode($dados);
    $conn = null;
?>
<?php
    session_start();

    if(isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['email']) && isset($_SESSION['level'])) {
        $dados = array(
            "type" => "success",
            "message" => "Seja bem-vindo ao TaskManager!"
        );
    } else {
        $dados = array(
            "type" => "error",
            "message" => "Usuário não validado!"
        );
    }

    echo json_encode($dados);
?>
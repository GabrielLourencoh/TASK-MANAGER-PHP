<?php

include('../../connection/conn.php');

if(empty($_POST['ID']) || empty($_POST['STATUS'])){
    $dados = array(
        "type" => "error",
        "message" => "Existe(m) campo(s) obrigatório(s) não preenchido(s)."
    );
}
else{
    try{
        $sql = "UPDATE TASK SET STATUS = ? WHERE ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $_POST['STATUS'],
            $_POST['ID']
        ]);
        $dados = array(
            "type" => "success",
            "message" => "Status atualizado com sucesso!"
        );
    }
    catch(PDOException $e){
        $dados = array(
            "type" => "error",
            "message" => "Erro ao atualizar o status: ".$e->getMessage()
        );
    }
}

$conn = null;
echo json_encode($dados);

?>
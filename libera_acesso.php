<?php

    include_once('Usuario.php');

    $cpf = $_POST['cpf'];
    $status = $_POST['status'];


    if(!empty($cpf) && !empty($status)){
        

        $cmd = new Usuario();
        $cmd->liberaAcesso($cpf, $status);

    }
    else{

        echo "<script>alert('Falha ao desativar esse usuário!');</script>";
        echo "<script>location.href= 'pag_listar_usuario.php';</script>";
    }
?>
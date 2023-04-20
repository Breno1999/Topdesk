<?php
    include_once('Config.php');
    include_once('Usuario.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confSenha = $_POST['conf_senha'];

    if ($senha != $confSenha) {
        echo "<script>alert('Os campos senha e confirmar senha devem ser iguais!')</script>";
        echo "<script>location.href= 'pag_atendimentos.php';</script>";
    }
    else{
        $cmd = new Usuario();
        $cmd->alterarSenha($senha, $email);
    }
?>
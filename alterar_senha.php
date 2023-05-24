<?php

    #inclui a classe Usuario no arquivo
    require('Usuario.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confSenha = $_POST['conf_senha'];

    #verifica se o campo senha é igual ao confirmar senha
    if ($senha != $confSenha) {
        echo "<script>alert('Os campos senha e confirmar senha devem ser iguais!')</script>";
        echo "<script>location.href= 'pag_atendimentos.php';</script>";
    }
    else{
        #altera a senha do usuario passando os dados como parametro para a classe
        $senha = md5($senha);
        
        $cmd = new Usuario();
        $cmd->alterarSenha($email,$senha);

        
    }
?>
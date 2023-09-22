<?php

    include_once('Usuario.php');

    $cpf = $_POST['cpf'];

    if(isset($cpf) && $cpf != null){

        $cmd = new Usuario();
        $cmd->deletarUsuario($cpf);

    }
    else{
        echo "<script>alert('Falha, por favor verifique o CPF informado!');</script>";
        echo "<script>location.href= 'pag_listar_usuario.php';</script>";
    }

?>
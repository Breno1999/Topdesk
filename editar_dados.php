<?php

require_once('Usuario.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$dt_nascimento = $_POST['dt_nascimento'];
$cidade = $_POST['cidade'];
$senha = $_POST['senha'];
$confSenha = $_POST['conf_senha'];

if ($senha != $confSenha) {

    echo "<script>alert('Os campos senha e confirmar senha devem ser iguais!')</script>";
    echo "<script>location.href= 'pag_atendimentos.php';</script>";
    
}
else{

    $cmd = new Usuario();
    $cmd->editarDados($nome,$email,$cidade, $dt_nascimento, $senha);

    
}



?>
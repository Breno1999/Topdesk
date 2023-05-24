<?php
    include_once('Usuario.php');

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $dt_nascimento = $_POST['dt_nascimento'];
    $cidade = $_POST['cidade'];
    $tp_acesso = $_POST['tp_acesso'];
    $status = $_POST['status'];
    $responsavel = $_POST['responsavel'];
    $gestor = $_POST['option'];
    $senha = $_POST['senha'];
    $senha = md5($senha);
    

    $usuario = new Usuario();
    $usuario->cadastrarUsuario($nome,$cpf,$email,$tp_acesso,$cidade,$dt_nascimento,$status, $responsavel, $gestor, $senha); 
   
?>
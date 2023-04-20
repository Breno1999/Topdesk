<?php
    include_once('Usuario.php');

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $dt_nascimento = $_POST['dt_nascimento'];
    $cidade = $_POST['cidade'];
    $tp_acesso = $_POST['tp_acesso'];
    $senha = $_POST['senha'];
    

    $usuario = new Usuario();
    $usuario->cadastrarUsuario($nome,$cpf,$email,$tp_acesso,$cidade,$dt_nascimento,$senha); 
   
?>
<?php
    include_once('config.php');

    $solicitante = $_POST['solicitante'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $anydesk = $_POST['anydesk'];
    $tp_servico = $_POST['tp_servico'];
    $tp_cliente = $_POST['tp_cliente']; 
    $descricao = $_POST['descricao'];
    $fuso = date_default_timezone_set('America/Sao_Paulo');
    $data_solicitacao = date('Y/m/d H:i:s');
    

    $result = $conn->query("INSERT INTO atendimentos VALUES('','$solicitante','$cpf','$email','$anydesk','$tp_servico','$tp_cliente','$descricao','', '$data_solicitacao', '', '')");
    

    if($result == true){
        echo "<script>alert('Solicitação registrada com sucesso')</script>";
        echo "<script>location.href= 'deslogar.php';</script>";
    }
    else{
        echo "Falha! tente novamente.";
        echo "<script>location.href= 'abrir_solicitacao.php';</script>";
    }
?>

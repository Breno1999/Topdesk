<?php
    include_once('config.php');

    #recebe os valores da tela atendimento
    $id = $_POST['id_atendimento'];
    $status = $_POST['status'];

    #tras os valores de acordo com o ID do atendimento
    $cmd = $conn->query("SELECT * FROM atendimentos WHERE id_atendimento = '$id'");
    $result = $cmd->fetch();

    #verifica se o status está vazio
    if(empty($result['status_atendimento'])){

        include_once('session.php');

        $cmd = $conn->query("UPDATE atendimentos SET tec_responsavel = '$_SESSION[nome]' WHERE id_atendimento = '$id'");
        $cmd = $conn->query("UPDATE atendimentos SET status_atendimento = '$status' WHERE id_atendimento = '$id'");
    
        
        echo "<script>location.href= 'pag_atendimentos.php';</script>";

        
    }
    else{

            #atualiza o status do atendimento para concluido e pega o nome do tecnico responsavel
            include_once('session.php');

            #verifica se o status está como Concluído
            if($status == 'Concluído'){
                
                #pega a data da conclusão
                $fuso = date_default_timezone_set('America/Sao_Paulo');
                $data_conclusão = date('Y/m/d H:i:s');
            
                #atualiza as informações do atendimento no banco de dados
                $cmd = $conn->query("UPDATE atendimentos SET status_atendimento = '$status' WHERE id_atendimento = '$id'");
                $cmd = $conn->query("UPDATE atendimentos SET tec_responsavel = '$_SESSION[nome]' WHERE id_atendimento = '$id'");
                $cmd = $conn->query("UPDATE atendimentos SET data_conclusao = '$data_conclusão' WHERE id_atendimento = '$id'");
                
                
                echo "<script>location.href= 'pag_atendimentos.php';</script>";
            }
        
    
        
    }

    
    


?>
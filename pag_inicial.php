
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    
    <link rel="stylesheet" href="CSS\estilo.css">
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  
 
    <title>Inicio</title>

</head>

<body>

<?php
    include_once('session.php');
    include_once('session_protect.php');
?>

      
    

   
        <div class="container">
            <div class="posicao">
                <div class="row" style="justify-content: center;">
                    <div class="col-md-4 col-xl-3">
                        <div class="card bg-c-cinza order-card">
                            <div class="card-block">
                                <h5 class="m-b-20">Aguardando:</h5>
                                <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span>
                                  
                                <?php
                                        include_once 'config.php';
                                        require_once 'timezone.php';

                                        $fuso = date_default_timezone_set('America/Sao_Paulo');

                                        $data = date('Y-m-d');

                                        $cmd = $conn->query("SELECT COUNT(status_atendimento) FROM atendimentos WHERE status_atendimento = 'Não iniciado' ");
                                        $result = $cmd->fetch();
                                        echo "<p style='font-size: 25px'>".$result['COUNT(status_atendimento)']."</p>";

                                      ?>

                                </span></h2>
                                <p class="m-b-0"><span class="f-right">Total</span></p>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-4 col-xl-3">
                        <div class="card bg-c-amarelo order-card">
                            <div class="card-block">
                                <h5 class="m-b-20">Em atendimento: </h5>
                                <h2 class="text-right"><i class="fa fa-refresh f-left"></i><span>
                                  
                                <?php
                                        include_once 'config.php';
                                        require_once 'timezone.php';

                                        $data = date('Y-m-d');

                                        $cmd = $conn->query("SELECT COUNT(status_atendimento) FROM atendimentos WHERE status_atendimento = 'Em atendimento' ");
                                        $result = $cmd->fetch();
                                        echo "<p style='font-size: 25px'>".$result['COUNT(status_atendimento)']."</p>";

                                      ?>

                                </span></h2>
                                <p class="m-b-0"><span class="f-right">Total</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-xl-3">
                        <div class="card bg-c-verde order-card">
                            <div class="card-block">
                                <h5 class="m-b-20">Concluídos hoje: </h5>
                                <h2 class="text-right"><i class="fa fa-rocket f-left"></i><span>
                                  
                                <?php
                                        include_once 'config.php';
                                        require_once 'timezone.php';


                                        $data = date('Y-m-d');

                                        $cmd = $conn->query("SELECT COUNT(status_atendimento) as total FROM atendimentos WHERE status_atendimento = 'Concluído' and date(data_conclusao) = '$data'");
                                        $result = $cmd->fetch();
                                        echo "<p style='font-size: 25px'>".$result['total']."</p>";

                                      ?>

                                </span></h2>
                                <p class="m-b-0"><span class="f-right">Total</span></p>
                            </div>
                        </div>
                    </div>
                    
              </div>

              <div class="row" style="justify-content: center;">

                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-azul order-card">
                        <div class="card-block">
                            <h5 class="m-b-20">Você concluiu:</h5>
                            <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span>
                            
                            <?php

                                include_once 'config.php';
                                require_once 'timezone.php';
                                
                                $data = date('Y-m-d');

                                $cmd = $conn->query("SELECT COUNT(*) as total FROM atendimentos WHERE status_atendimento = 'Concluído' and tec_responsavel = '$_SESSION[nome]' and date(data_conclusao) = '$data'");
                                $result = $cmd->fetch();
                                echo "<p style='font-size: 25px'>".$result['total']."</p>";



                            ?>

                            </span></h2>
                            <p class="m-b-0"><span class="f-right">Atendimentos</span></p>
                        </div>
                    </div>
                </div>




                </div>
                </div>

          </div>
      </div>
    
    
      
  
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
</body>

</html>
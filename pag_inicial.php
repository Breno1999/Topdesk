
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
  include('session_protect.php');
  
  if($_SESSION['tipo_acesso'] == 'Administrador'){
    include_once('navbar_adm.php');
  }
  else{
    include_once('navbar_tec.php');
  }
  
?> 


    <!-- Modal alterar senha -->
    <div class="container-fluid">
        <div class="modal fade" id="ExemploModalCentralizado1" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="TituloModalCentralizado">Alterar senha</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Endereço de email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Seu email">
                            <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
                        </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Senha</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha">
                                    <br>
                                    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Confirmar senha">
                                </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Alterar senha</button>
                    </div>
                    </div>
                </div>
        </div>

        <!-- Modal alterar todos dados -->
        <div class="modal fade" id="ExemploModal" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCentralizado">Alterar meus dados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" class="form-control" id="Nome" placeholder="Nome completo">

                    <label for="Email sm-6">Email</label>
                    <input type="email" class="form-control " id="Email" placeholder="Email">
                
                    <label for="dt_nascimento">Data de nascimento</label>
                    <input type="date" class="form-control col-4 " id="dt_nascimento" placeholder="Data de nascimento">

                </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Senha</label>
                            <input type="password" class="form-control col-7" id="exampleInputPassword1" placeholder="Senha">
                            <br>
                            <input type="password" class="form-control col-7" id="exampleInputPassword2" placeholder="Confirmar senha">
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Salvar alterações</button>
            </div>
            </div>
        </div>
        </div>

      
    

   
        <div class="container">
            <div class="posicao">
                <div class="row">
                    <div class="col-md-4 col-xl-3">
                        <div class="card bg-c-cinza order-card">
                            <div class="card-block">
                                <h5 class="m-b-20">Aguardando:</h5>
                                <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span>
                                  
                                <?php
                                        include_once('config.php');

                                        $cmd = $conn->query("SELECT COUNT(status_atendimento) FROM atendimentos WHERE status_atendimento = ''");
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
                                        include_once('config.php');

                                        $cmd = $conn->query("SELECT COUNT(status_atendimento) FROM atendimentos WHERE status_atendimento = 'Em atendimento'");
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
                                <h5 class="m-b-20">Concluídos: </h5>
                                <h2 class="text-right"><i class="fa fa-rocket f-left"></i><span>
                                  
                                <?php
                                        include_once('config.php');

                                        $cmd = $conn->query("SELECT COUNT(status_atendimento) FROM atendimentos WHERE status_atendimento = 'Concluído'");
                                        $result = $cmd->fetch();
                                        echo "<p style='font-size: 25px'>".$result['COUNT(status_atendimento)']."</p>";

                                      ?>

                                </span></h2>
                                <p class="m-b-0"><span class="f-right">Total</span></p>
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
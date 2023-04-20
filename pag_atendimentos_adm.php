
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    
    <link rel="stylesheet" href="CSS\estilo-telas-table.css">
    <link rel="stylesheet" href="CSS\estilo1.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <style>
          .botao-buscar{
              margin-top: 10% !important;
          }

          .botao-buscar .row{
            justify-content: center;
        }

          .fundo-tabela{
              background-color: #e9ecef;
              margin-top: 30px;
              border-color: #e9ecef !important;
              border: solid 1px;
              border-radius: 8px;
              padding: 2px;
          }

    </style>

<title>Atendimentos</title>
 

</head>

<body>

<?php

  include('session.php');

  if ($_SESSION['tipo_acesso'] != 'Administrador') {

    echo "<script>alert('Usuário sem permissão!');</script>";
    echo "<script>location.href= 'index.php';</script>";
  }
  else{

    if($_SESSION['tipo_acesso'] == 'Administrador'){
      include_once('navbar_adm.php');
    }
    else{
      include_once('navbar_tec.php');
    }

  }
  
  
?>  
  



        <div class="container">


        <div class="botao-buscar">
          <form method="POST">
            <div class="row">
                <input type="text" class="form-control col-4" name="buscar" placeholder="Buscar">
                <input style="border-radius: 15px;" type="submit" class="btn btn-outline-primary ml-2"  value="Procurar">
            </div>
          </form>
        </div>

        
            <!-- Criando a tabela listando todos os atendimentos -->
            <div class="fundo-tabela">
                <div class="scroll">
                    <table class="table table-responsive-sm text-dark table-hover " >
                            <thead class="thead-light ">
                                <tr>
                                    <th scope="col">Solicitante</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Demanda</th>
                                    <th scope="col">Solicitado</th>
                                    <th scope="col">Concluído</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Técnico</th>
                                    
                                </tr>
                            </thead>
                        
                        <tbody class="bg-light">
                        <?php
                          #inclui o arquivo de configuração do banco
                          include_once('config.php');

                          #verifica se o campo buscar esta preenchido
                          if(!empty($_POST['buscar'])){
                            
                            $cmd = $conn->query("SELECT *, date_format(data_solicitacao, '%d/%m/%Y %H:%i:%s') as dt_solicitacao_form, date_format(data_conclusao, '%d/%m/%Y %H:%i:%s') as dt_conclusao_form FROM atendimentos WHERE solicitante LIKE '%$_POST[buscar]%' or cpf LIKE '%$_POST[buscar]%' or data_solicitacao LIKE '%$_POST[buscar]%' or status_atendimento LIKE '%$_POST[buscar]%' ");
                            $resultado = $cmd->fetchAll();

                            foreach($resultado as $key => $value){
                              #altera a cor do tr de acordo com o status
                              if(empty($value['status_atendimento'])){
                                $cor = 'bg-light';
                              }
                              elseif ($value['status_atendimento'] == 'Em atendimento') {
                                $cor = '#ffffb3';
                              }
                              elseif ($value['status_atendimento'] == 'Concluído') {
                                $cor = '#b3ffcc';
                              }
                            
                                #gera a tabela com os registros do banco de dados
                                echo "<tr style='background-color: $cor;'>";
                                echo "<td>".$value['solicitante']."</td>";
                                echo "<td>".$value['cpf']."</td>";
                                echo "<td>".$value['tp_cliente']."</td>";
                                echo "<td>".$value['detalhes_demanda']."</td>";
                                echo "<td>".$value['dt_solicitacao_form']."</td>";
                                echo "<td>".$value['dt_conclusao_form']."</td>";
                                echo "<td>".$value['status_atendimento']."</td>";
                                echo "<td>".$value['tec_responsavel']."</td>";
                                echo "</tr>";
                            }

                          }
                          else{
                                    $data = date('Y-m-d');

                                    #trás todos os registros da tabela atendimentos
                                    $cmd = $conn->query("SELECT *, date_format(data_solicitacao, '%d/%m/%Y %H:%i:%s') as dt_solicitacao_form, date_format(data_conclusao, '%d/%m/%Y %H:%i:%s') as dt_conclusao_form FROM atendimentos WHERE DATE(data_solicitacao) = '$data'");
                                    $resultado = $cmd->fetchAll();
                                    

                                    
                                      
                                    foreach($resultado as $key => $value){
                                      #altera a cor do tr de acordo com o status
                                      if(empty($value['status_atendimento'])){
                                        $cor = 'bg-light';
            
                                      }
                                      elseif ($value['status_atendimento'] == 'Em atendimento') {
                                        $cor = '#ffffb3';
                                      }
                                      elseif ($value['status_atendimento'] == 'Concluído') {
                                        $cor = '#b3ffcc';
                                      }
                                    
                                        #gera a tabela com os registros do banco de dados
                                        echo "<tr style='background-color: $cor;'>";
                                        echo "<td>".$value['solicitante']."</td>";
                                        echo "<td>".$value['cpf']."</td>";
                                        echo "<td>".$value['tp_cliente']."</td>";
                                        echo "<td>".$value['detalhes_demanda']."</td>";
                                        echo "<td>".$value['dt_solicitacao_form']."</td>";
                                        echo "<td>".$value['dt_conclusao_form']."</td>";
                                        echo "<td>".$value['status_atendimento']."</td>";
                                        echo "<td>".$value['tec_responsavel']."</td>";
                                        echo "</tr>";
                                
                                    }
                            
                        }
                          ?>
                        </tbody>
                    </table>
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
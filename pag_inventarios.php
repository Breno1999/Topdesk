
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

          .scroll{
              margin: 10px;
              max-height: 320px;
              overflow: scroll;
          }

    </style>

<title>Inventários de máquina</title>
 

</head>

<body>

<?php
    include_once('session.php');
    include_once('session_protect.php');
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

        
            <!-- Criando a tabela listando todas as maquinas -->
            <div class="fundo-tabela">
              <?php

                include_once('config.php');
                $data = date('Y-m-d');

                $cmd = $conn->query("SELECT * FROM maquinas ");
                $resultado = $cmd->fetchAll();
                $row = $cmd->rowCount();#retorna o numero de linhas da consulta SQL
                $class = 'scroll';

                if($row >= 6){

                  echo "<div class='$class'>";

                }

              ?>
                  <table class="table table-responsive-sm text-dark table-hover " >
                            <thead class="thead-light ">
                                <tr>
                                    <th scope="col">Maquina</th>
                                    <th scope="col">MAC</th>
                                    <th scope="col">Sistema Operacional</th>
                                    <th scope="col">Memória RAM</th>
                                    <th scope="col">Data do inventário</th>
                                    <th scope="col">Ação</th>
                                    
                                </tr>
                            </thead>
                        
                        <tbody class="bg-light">
                        <?php
                          #inclui o arquivo de configuração do banco
                          include_once('config.php');

                          #verifica se o campo buscar esta preenchido
                          if(!empty($_POST['buscar'])){
                            
                            #trás todos os registros da tabela usuario
                            $cmd = $conn->query("SELECT *, date_format(data_inventario, '%d/%m/%Y %H:%i:%s') as dt_inventario_form FROM maquinas WHERE nome_maquina LIKE '%$_POST[buscar]%' or endereco_mac LIKE '%$_POST[buscar]%'");
                            $resultado = $cmd->fetchAll();
                            
                              
                            foreach($resultado as $key => $value){
    
                            
                                #gera a tabela com os registros do banco de dados
                                echo "<tr style='background-color: light;'>";
                                echo "<td>".$value['nome_maquina']."</td>";
                                echo "<td>".$value['endereco_mac']."</td>";
                                echo "<td>".$value['sistema_operacional']."</td>";
                                echo "<td>".$value['memory_ram']."</td>";
                                echo "<td>".$value['dt_inventario_form']."</td>";
                                echo "<td>

                                        <button style='border-radius: 30px;' class='btn btn-warning' data-toggle='modal' data-target='#modalMaquina".$value['id_maquina']."'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='13' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'>
                                          <path d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/>
                                        </svg>
                                        </button>
                                        
                                        </td>
                                        
                                        <div class='modal fade' id='modalMaquina".$value['id_maquina']."' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
                                            <div class='modal-dialog modal-dialog-centered' role='document'>
                                                <div class='modal-content'>
                                                <div class='modal-body'>
                                                <form action='cadastrar_usuario.php' method='POST'>
                                                      <div class='modal-header'>
                                                            <h5 class='modal-title' id='TituloModalCentralizado'>AGR vinculado em ".$value['nome_maquina']."</h5>
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                                                            <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                      </div>
                                                        
                                                    
                                                      <ul class='list-group mt-4 mx-3 mb-5'>

                                                      <p style='text-align: left; margin-top: 15px;color: black;'>Dados do AGR:</p>";

                                                      include_once('config.php');

                                                      $cmd = $conn->query("SELECT u.nome, u.cpf, u.email, m.nome_maquina, m.programas_inst FROM maquinas m INNER JOIN usuarios u on  u.cpf = m.cpf WHERE m.cpf = '$value[cpf]'");
                                                      $resultadoA = $cmd->fetchAll();
                                                      $rows = $cmd->rowCount();

                                                      if($rows > 0){

                                                        foreach($resultadoA as $key => $value){
                                        
                                      
                                                          #gera a tabela com os registros do banco de dados
                                                          echo "<li class='list-group-item list-group-item-action'>".
                                                          "<p>Nome:&nbsp;&nbsp;".$value['nome']."</p>".
                                                          "<p>CPF:&nbsp;&nbsp;".$value['cpf']."</p>".
                                                          "<p>Email:&nbsp;&nbsp;".$value['email']."</p>".
                                                          "</li>";  

                                                        }

                                                      }

                                                      echo"<p style='text-align: left; margin-top: 15px; color: black;'>Programas instalados:</p>";
                                                      echo "<li class='list-group-item list-group-item-action'>".$value['programas_inst']."</li>";
                                                      
                                                echo"</ul>

                                                    
                                                        
                                                          
                                                    </form>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </tr>";
                        
                            }

                          }
                          else{
                            

                                    #trás todos os registros da tabela usuario
                                    $cmd = $conn->query("SELECT *, date_format(data_inventario, '%d/%m/%Y %H:%i:%s') as dt_inventario_form FROM maquinas ORDER BY data_inventario DESC");
                                    $resultado = $cmd->fetchAll();
                                    
                                      
                                    foreach($resultado as $key => $value){
            
                                    
                                        #gera a tabela com os registros do banco de dados
                                        echo "<tr style='background-color: light;'>";
                                        echo "<td>".$value['nome_maquina']."</td>";
                                        echo "<td>".$value['endereco_mac']."</td>";
                                        echo "<td>".$value['sistema_operacional']."</td>";
                                        echo "<td>".$value['memory_ram']."</td>";
                                        echo "<td>".$value['dt_inventario_form']."</td>";
                                        echo "<td>

                                        <button style='border-radius: 30px;' class='btn btn-warning' data-toggle='modal' data-target='#modalMaquina".$value['id_maquina']."'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='13' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'>
                                          <path d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/>
                                        </svg>
                                        </button>
                                        
                                        </td>
                                        
                                        <div class='modal fade' id='modalMaquina".$value['id_maquina']."' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
                                            <div class='modal-dialog modal-dialog-centered' role='document'>
                                                <div class='modal-content'>
                                                <div class='modal-body' >
                                                <form action=''.php' method='POST'>
                                                      <div class='modal-header' >
                                                            <h5 class='modal-title' id='TituloModalCentralizado'>AGR vinculado em ".$value['nome_maquina']."</h5>
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                                                            <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                      </div>
                                                    
                                                      <ul class='list-group mt-4 mx-3 mb-4'>

                                                      <p style='text-align: left; margin-top: 15px;color: black;'>Dados do AGR:</p>";

                                                      $cmd = $conn->query("SELECT u.nome, u.cpf, u.email, m.nome_maquina, m.programas_inst FROM maquinas m INNER JOIN usuarios u on  u.cpf = m.cpf WHERE m.cpf = '$value[cpf]'");
                                                      $resultadoA = $cmd->fetchAll();
                                                      $rows = $cmd->rowCount();

                                                      if($rows > 0){

                                                        foreach($resultadoA as $key => $value){
                                        
                                      
                                                          #gera a tabela com os registros do banco de dados
                                                          echo "<li class='list-group-item list-group-item-action'>".
                                                          "<p>Nome:&nbsp;&nbsp;".$value['nome']."</p>".
                                                          "<p>CPF:&nbsp;&nbsp;".$value['cpf']."</p>".
                                                          "<p>Email:&nbsp;&nbsp;".$value['email']."</p>".
                                                          "</li>";                                                    

                                                        }

                                                      }
                                                      else{

                                                        
                                        
                                      
                                                          #gera a tabela com os registros do banco de dados
                                                          echo "<li class='list-group-item list-group-item-action'>Nenhum AGR vinculado</li>";
                                                          

                                                        

                                                      }

                                                      echo"<p style='text-align: left; margin-top: 15px; color: black;'>Programas instalados:</p>";
                                                      echo "<li class='list-group-item list-group-item-action'>".$value['programas_inst']."</li>";
                                                      
                                                echo"</ul>

                                                    
                                                        
                                                          
                                                    </form>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </tr>";
                                
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
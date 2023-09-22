
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
          
          th {
            width: 100px;
          }

    </style>

<title>Gestores</title>
 

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

        
            <!-- Criando a tabela listando todos os usuarios -->
            <div class="fundo-tabela">
              <?php

                include_once('config.php');
                $data = date('Y-m-d');

                $cmd = $conn->query("SELECT * FROM usuarios WHERE gestor = 'Sim' ");
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
                                    <th scope="col">Nome</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Perfil de acesso</th>
                                    <th scope="col">Cidade</th>
                                    <th scope="col">Situação</th>
                                    <th scope="col">Ação</th>
                                    
                                </tr>
                            </thead>
                        
                        <tbody class="bg-light ">
                        <?php
                          #inclui o arquivo de configuração do banco
                          include_once('config.php');

                          

                          #verifica se o campo buscar esta preenchido
                          if(!empty($_POST['buscar'])){
                            
                            #trás todos os registros da tabela usuario
                            $cmd = $conn->query("SELECT * FROM usuarios WHERE nome LIKE '%$_POST[buscar]%' and gestor = 'Sim'");
                            $resultado = $cmd->fetchAll();
                            
                              
                            foreach($resultado as $key => $value){
    
                            
                                #gera a tabela com os registros do banco de dados
                                echo "<tr style='background-color: light;'>";
                                echo "<td>".$value['nome']."</td>";
                                echo "<td>".$value['cpf']."</td>";
                                echo "<td>".$value['email']."</td>";
                                echo "<td>".$value['perfil_acesso']."</td>";
                                echo "<td>".$value['cidade']."</td>";
                                echo "<td>".$value['user_status']."</td>";
                                echo "<td>

                                      <button style='border-radius: 30px;' class='btn btn-warning' data-toggle='modal' data-target='#modalGestor".$value['id_usuario']."'>
                                      <svg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='currentColor' class='bi bi-people-fill' viewBox='0 0 16 16'>
                                        <path d='M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z'/>
                                      </svg>
                                      </button>

                                      <a href='https://wa.me/".$value['telefone']."' style='border-radius: 30px;' class='btn btn-success'>
                                      <svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' fill='currentColor' class='bi bi-whatsapp' viewBox='0 0 16 16'>
                                        <path d='M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z'/>
                                      </svg>
                                      </a>
                                        
                                        </td>
                                        
                                        <div class='modal fade' id='modalGestor".$value['id_usuario']."' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
                                            <div class='modal-dialog modal-dialog-centered' role='document'>
                                                <div class='modal-content'>
                                                <div class='modal-body'>
                                                <form action='cadastrar_usuario.php' method='POST'>
                                                      <div class='modal-header'>
                                                            <h5 class='modal-title' id='TituloModalCentralizado'>AGRs de ".$value['nome']."</h5>
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                                                            <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                      </div>
                                                        
                                                    
                                                      <ul class='list-group mt-4 mx-3 mb-5'>";

                                                      $cmd = $conn->query("SELECT * FROM usuarios WHERE responsavel = '$value[nome]'");
                                                      $resultado = $cmd->fetchAll();

                                                      foreach($resultado as $key => $value){
            
                                    
                                                        #gera a lista de agrs vinculados ao gestor
                                                        echo"<li class='list-group-item list-group-item-action'>
                                                        <div class='row d-flex justify-content-between mx-auto'>".
                                                        $value['nome'].
                                                        "<div class='justify-content-around'>
                                                          <a data-toggle='modal' data-target='#modalEmail'>
                                                            <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-envelope' viewBox='0 0 16 16'>
                                                              <path d='M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z'/>
                                                            </svg>
                                                          </a>
                                                          &nbsp;
                                                          <a href='https://wa.me/".$value['telefone']."' >
                                                            <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-whatsapp' viewBox='0 0 16 16'>
                                                              <path d='M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z'/>
                                                            </svg>
                                                          </a>  
                                                          </div>
                                                        </div>
                                                        </li>";
                                                        

                                                      }
                                                      
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
                                    $cmd = $conn->query("SELECT * FROM usuarios WHERE gestor = 'Sim' ");
                                    $resultado = $cmd->fetchAll();
                                    
                                      
                                    foreach($resultado as $key => $value){
            
                                    
                                        #gera a tabela com os registros do banco de dados
                                        echo "<tr id='gestor".$value['id_usuario']."'style='background-color: light;'>";
                                        echo "<td>".$value['nome']."</td>";
                                        echo "<td>".$value['cpf']."</td>";
                                        echo "<td>".$value['email']."</td>";
                                        echo "<td>".$value['perfil_acesso']."</td>";
                                        echo "<td>".$value['cidade']."</td>";
                                        echo "<td>".$value['user_status']."</td>";
                                        echo "<td>

                                        <button style='border-radius: 30px;' class='btn btn-warning' data-toggle='modal' data-target='#modalGestor".$value['id_usuario']."'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='currentColor' class='bi bi-people-fill' viewBox='0 0 16 16'>
                                          <path d='M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z'/>
                                        </svg>
                                        </button>

                                        <a href='https://wa.me/".$value['telefone']."' style='border-radius: 30px;' class='btn btn-success'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' fill='currentColor' class='bi bi-whatsapp' viewBox='0 0 16 16'>
                                          <path d='M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z'/>
                                        </svg>
                                        </a>

                                        
                                        
                                        </td>
                                        
                                        <div class='modal fade' id='modalGestor".$value['id_usuario']."' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
                                            <div class='modal-dialog modal-dialog-centered' role='document'>
                                                <div class='modal-content'>
                                                <div class='modal-body' >
                                                <form action=''.php' method='POST'>
                                                      <div class='modal-header' >
                                                            <h5 class='modal-title' id='TituloModalCentralizado'>AGRs de ".$value['nome']."</h5>
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                                                            <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                      </div>
                                                        
                                                    
                                                      <ul class='list-group mt-4 mx-3 mb-4' >";

                                                      $cmd = $conn->query("SELECT * FROM usuarios WHERE responsavel = '$value[nome]'");
                                                      $resultadoA = $cmd->fetchAll();
                                                      $rows = $cmd->rowCount();

                                                      if($rows > 0){

                                                        foreach($resultadoA as $key => $value){
                                        
                                      
                                                          #gera a lista de agrs vinculados ao gestor
                                                          echo"<li class='list-group-item list-group-item-action'>
                                                          <div class='row d-flex justify-content-between mx-auto'>".
                                                          $value['nome'].
                                                          "<div class='justify-content-around'>
                                                            <a data-toggle='modal' data-target='#modalEmail'>
                                                              <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-envelope' viewBox='0 0 16 16'>
                                                                <path d='M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z'/>
                                                              </svg>
                                                            </a>
                                                            &nbsp;
                                                            <a href='https://wa.me/".$value['telefone']."' >
                                                              <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-whatsapp' viewBox='0 0 16 16'>
                                                                <path d='M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z'/>
                                                              </svg>
                                                            </a>  
                                                            </div>
                                                          </div>
                                                          </li>";

                                                        }

                                                      }
                                                      else{

                                                        
                                        
                                      
                                                          #gera a tabela com os registros do banco de dados
                                                          echo "<li class='list-group-item list-group-item-action'>Nenhum AGR vinculado</li>";
                                                          

                                                        

                                                      }

                                                      
                                                echo"</ul>

                                                    
                                                        
                                                          
                                                    </form>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </tr>
                                        ";
                                
                                    }
                            echo"
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
                            
                ";
                            
                        }
                          ?>
                        


     

 



<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
</body>

</html>
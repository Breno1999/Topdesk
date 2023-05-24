
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

<title>Usuários</title>
 

</head>

<body>

<?php

  include('session_protect.php');
  
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

                $cmd = $conn->query("SELECT * FROM usuarios WHERE user_status = 'Ativo'");
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
                                    <th scope="col">Gestor</th>
                                    
                                </tr>
                            </thead>
                        
                        <tbody class="bg-light">
                        <?php
                          #inclui o arquivo de configuração do banco
                          include_once('config.php');

                          #verifica se o campo buscar esta preenchido
                          if(!empty($_POST['buscar'])){
                            
                            #trás todos os registros da tabela usuario
                            $cmd = $conn->query("SELECT * FROM usuarios WHERE nome LIKE '%$_POST[buscar]%' or responsavel LIKE '%$_POST[buscar]%' OR perfil_acesso LIKE '%$_POST[buscar]%'");
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
                                echo "<td>".$value['responsavel']."</td>";
                                echo "</tr>";
                        
                            }

                          }
                          else{
                            

                                    #trás todos os registros da tabela usuario
                                    $cmd = $conn->query("SELECT * FROM usuarios WHERE user_status = 'Ativo' or user_status = 'Inativo'");
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
                                        echo "<td>".$value['responsavel']."</td>";
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
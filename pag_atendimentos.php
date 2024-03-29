
<!DOCTYPE html>
<html lang="pt-br">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    
    <link rel="stylesheet" href="CSS\estilo-telas-table.css">
    <link rel="stylesheet" href="CSS\estilo.css">
    
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
        margin-top: 30px !important;
        border-color: #e9ecef ;
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


<title>Atendimentos</title>
 

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

        

        
        <?php

            include_once 'config.php';
            require_once 'timezone.php';
            

            #trás todos os registros da tabela atendimentos
            $cmd = $conn->query("SELECT *, date_format(data_solicitacao, '%d/%m/%Y %H:%i:%s') as dt_solicitacao_form, date_format(data_conclusao, '%d/%m/%Y %H:%i:%s') as dt_conclusao_form FROM atendimentos WHERE status_atendimento = 'Em atendimento' or status_atendimento = 'Não iniciado'");
            $resultado = $cmd->fetchAll();

            $row = $cmd->rowCount();#retorna o numero de linhas da consulta SQL

            if(empty($resultado)){

                $scroll = "scroll";
                
                echo"
                <div class='fundo-tabela'>";
                #inclui a div scroll na consulta do campo buscar para listagem dos resultados  
                if(!empty($_POST['buscar'])){
                echo"
                    <div class='$scroll'>
                    ";
                }               
                                echo" <table class='table table-responsive-sm text-dark table-hover ' >";
                                #altera o header da tabela se tiver ou não resultados
                                if(empty($_POST['buscar'])){
                                    echo"
                                        <thead class='thead-light ' style='text-align: center; '>
                                            <tr>
                                                <th scope='col'></th>
                                                <th scope='col'></th>
                                                <th scope='col'></th>
                                                <th scope='col'></th>
                                                <th style='width: 200px !important;' scope='col'>...</th>
                                                <th scope='col'></th>
                                                <th scope='col'></th>
                                                <th scope='col'></th>
                                                <th scope='col'></th>
                                            </tr>
                                        </thead>
                                        ";
                                }
                                else{

                                    if(!empty($_POST['buscar'])){

                                    echo"
                                    <thead class='thead-light ' style='text-align: center;'>
                                        <tr>
                                            <th scope='col'>Solicitante</th>
                                            <th scope='col'>CPF</th>
                                            <th scope='col'>Anydesk</th>
                                            <th scope='col'>Cliente</th>
                                            <th scope='col'>Serviço</th>
                                            <th scope='col'>Demanda</th>
                                            <th scope='col'>Solicitado</th>
                                            <th scope='col'>Status</th>
                                            <th scope='col'>...</th>
                                        </tr>
                                    </thead>
                                    ";

                                    }

                                }
                                    echo"<tbody class='bg-light ' style='text-align: center;'>";

                                        if(empty($resultado) && empty($_POST['buscar'])){

                                        echo"
                                            <tr>
                                            
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td style='width: 200px !important;' scope='row'>
                                                        <br>
                                                        <h6>Nenhum atendimento no momento</h6>
                                                        <br>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                
                                            </tr>
                                            ";
                                        }
                                        else{

                                        #verifica se o campo buscar esta preenchido
                                        if(!empty($_POST['buscar'])){
                                            
                                                    
                                            $cmd = $conn->query("SELECT *, date_format(data_solicitacao, '%d/%m/%Y %H:%i:%s') as dt_solicitacao_form, date_format(data_conclusao, '%d/%m/%Y %H:%i:%s') as dt_conclusao_form FROM atendimentos WHERE solicitante LIKE '%$_POST[buscar]%' or cpf LIKE '%$_POST[buscar]%' or data_solicitacao LIKE '%$_POST[buscar]%' or status_atendimento LIKE '%$_POST[buscar]%'");
                                            $resultado = $cmd->fetchAll();

                                            foreach($resultado as $key => $value){
                                            #altera a cor do tr de acordo com o status
                                            if($value['status_atendimento'] == 'Não iniciado'){
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
                                                echo "<td>".$value['id_anydesk']."</td>";
                                                echo "<td>".$value['tp_cliente']."</td>";
                                                echo "<td>".$value['tp_servico']."</td>";
                                                echo "<td>".$value['detalhes_demanda']."</td>";
                                                echo "<td>".$value['dt_solicitacao_form']."</td>";
                                                echo "<td>
                                                
                                                <form action='status.php' method='POST'>
                                                    <input type='hidden' name='id_atendimento' value='$value[id_atendimento]'>
                                                    <div class='form-group ml-auto mr-auto'>";
                                                    
                                                    #verifica o status e modifica o botão select
                                                    if($value['status_atendimento'] == 'Não iniciado'){
                                                        echo "
                                                        <select class='form-control' name='status' style='text-align: center; width: 170px;'>
                                                            <option>Iniciar</option>
                                                            <option>Em atendimento</option>
                                                            <option>Concluído</option>
                                                        </select>
                                                        ";
                                                    }
                                                    elseif ($value['status_atendimento'] == 'Em atendimento') {
                                                        $cmd = $conn->query("SELECT * FROM atendimentos");
                                                        echo "
                                                        <select class='form-control' name='status' style='text-align: center; width: 170px;'> ";  
                                                            echo "<option>$value[status_atendimento]</option>";
                                                            echo "<option>Concluído</option>
                                                        </select>
                                                        ";
                                                    }
                                                    elseif ($value['status_atendimento'] == 'Concluído') {
                                                        $cmd = $conn->query("SELECT * FROM atendimentos");
                                                        echo "
                                                        <select class='form-control' name='status' style='text-align: center; width: 170px;'> ";  
                                                            echo "<option>$value[status_atendimento]</option>
                                                        </select>
                                                        ";
                                                    }
                                                    
                                                
                                                echo "</td>
                                                
                                        
                                                <td>
                                                        <div class='form-group ml-auto mr-auto'>
                                                            <button class='btn btn-primary' type='submit' style='border-radius: 100%; width: 40px; height: 40px;'>
                                                            <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-check' viewBox='0 0 16 16'>
                                                                <path d='M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z'/>
                                                            </svg>
                                                            </button>
                                                            </div>
                                                        </div>
                                                </td>
                                                </form>
                                                </tr>";
                                            }

                                        }
                                        
                                        }

                                echo  "</tbody>
                                </table>
                            </div>
                </div>
                
                ";
                

                

            }
            else{


                if(!empty($resultado)){


                    #cria a tabel com os  atendimentos
                    echo"
                    <div class='fundo-tabela'>
                    ";

                    $row = $cmd->rowCount();#retorna o numero de linhas da consulta SQL

                    if($row >= 4 || !empty($_POST['buscar'])){#coloca o scroll na tabela caso o teste seja verdadeiro
                      echo"<div class='scroll'>";
                    }
                    else{
                        echo "<div>";
                    }
                    echo"    <table class='table table-responsive-sm text-dark table-hover ' >
                                <thead class='thead-light '>
                                    <tr>
                                        <th scope='col'>Solicitante</th>
                                        <th scope='col'>CPF</th>
                                        <th scope='col'>Anydesk</th>
                                        <th scope='col'>Cliente</th>
                                        <th scope='col'>Serviço</th>
                                        <th scope='col'>Demanda</th>
                                        <th scope='col'>Solicitado</th>
                                        <th scope='col'>Status</th>
                                        <th scope='col'>...</th>
                                    </tr>
                                </thead>
                            
                            <tbody class='bg-light'>
                    
                    ";

                    #verifica se o campo buscar esta preenchido
                    if(!empty($_POST['buscar'])){
                                
                        $cmd = $conn->query("SELECT *, date_format(data_solicitacao, '%d/%m/%Y %H:%i:%s') as dt_solicitacao_form, date_format(data_conclusao, '%d/%m/%Y %H:%i:%s') as dt_conclusao_form FROM atendimentos WHERE solicitante LIKE '%$_POST[buscar]%' or cpf LIKE '%$_POST[buscar]%' or data_solicitacao LIKE '%$_POST[buscar]%' or status_atendimento LIKE '%$_POST[buscar]%'");
                        $resultado = $cmd->fetchAll();

                        foreach($resultado as $key => $value){
                        #altera a cor do tr de acordo com o status
                        if($value['status_atendimento'] == 'Não iniciado'){
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
                            echo "<td>".$value['id_anydesk']."</td>";
                            echo "<td>".$value['tp_cliente']."</td>";
                            echo "<td>".$value['tp_servico']."</td>";
                            echo "<td>".$value['detalhes_demanda']."</td>";
                            echo "<td>".$value['dt_solicitacao_form']."</td>";
                            echo "<td>
                            
                            <form action='status.php' method='POST'>
                                <input type='hidden' name='id_atendimento' value='$value[id_atendimento]'>
                                <div class='form-group ml-auto mr-auto'>";
                                
                                #verifica o status e modifica o botão select
                                if($value['status_atendimento'] == 'Não iniciado'){
                                    echo "
                                    <select class='form-control' name='status' style='text-align: center; width: 170px;'>
                                        <option>Iniciar</option>
                                        <option>Em atendimento</option>
                                        <option>Concluído</option>
                                    </select>
                                    ";
                                }
                                elseif ($value['status_atendimento'] == 'Em atendimento') {
                                    $cmd = $conn->query("SELECT * FROM atendimentos");
                                    echo "
                                    <select class='form-control' name='status' style='text-align: center; width: 170px;'> ";  
                                        echo "<option>$value[status_atendimento]</option>";
                                        echo "<option>Concluído</option>
                                    </select>
                                    ";
                                }
                                elseif ($value['status_atendimento'] == 'Concluído') {
                                    $cmd = $conn->query("SELECT * FROM atendimentos");
                                    echo "
                                    <select class='form-control' name='status' style='text-align: center; width: 170px;'> ";  
                                        echo "<option>$value[status_atendimento]</option>
                                    </select>
                                    ";
                                }
                                
                            
                            echo "</td>
                            
                            <td>
                            <div class='form-group ml-auto mr-auto'>
                                <button class='btn btn-primary' type='submit' style='border-radius: 100%; width: 40px; height: 40px;'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-check' viewBox='0 0 16 16'>
                                    <path d='M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z'/>
                                </svg>
                                </button>
                                </div>
                            </div>
                            </td>
                            </form>
                            </tr>";
                        }

                    }
                    else{

                        #gera os resultados da tabela se a consulta no banco se tiver alguma linha

                        $data = date('Y-m-d');

                        #trás todos os registros da tabela atendimentos
                        $cmd = $conn->query("SELECT *, date_format(data_solicitacao, '%d/%m/%Y %H:%i:%s') as dt_solicitacao_form, date_format(data_conclusao, '%d/%m/%Y %H:%i:%s') as dt_conclusao_form FROM atendimentos WHERE status_atendimento = 'Em atendimento' or status_atendimento = 'Não iniciado' ORDER BY dt_solicitacao_form DESC");
                        $resultado = $cmd->fetchAll();
                        
                        
                        foreach($resultado as $key => $value){
                        #altera a cor do tr de acordo com o status
                        if($value['status_atendimento'] == 'Não iniciado'){
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
                            echo "<td>".$value['id_anydesk']."</td>";
                            echo "<td>".$value['tp_cliente']."</td>";
                            echo "<td>".$value['tp_servico']."</td>";
                            echo "<td>".$value['detalhes_demanda']."</td>";
                            echo "<td>".$value['dt_solicitacao_form']."</td>";
                            echo "<td>
                            
                            <form action='status.php' method='POST'>
                                <input type='hidden' name='id_atendimento' value='$value[id_atendimento]'>
                                <div class='form-group ml-auto mr-auto'>";
                                
                                #verifica o status e modifica o botão select
                                if($value['status_atendimento'] == 'Não iniciado'){
                                    echo "
                                    <select class='form-control' name='status' style='text-align: center; width: 170px;'>
                                        <option>$value[status_atendimento]</option>
                                        <option>Em atendimento</option>
                                        <option>Concluído</option>
                                    </select>
                                    ";
                                }
                                elseif ($value['status_atendimento'] == 'Em atendimento') {
                                    $cmd = $conn->query("SELECT * FROM atendimentos");
                                    echo "
                                    <select class='form-control' name='status' style='text-align: center; width: 170px;'> ";  
                                        echo "<option>$value[status_atendimento]</option>";
                                        echo "<option>Concluído</option>
                                    </select>
                                    ";
                                }
                                elseif ($value['status_atendimento'] == 'Concluído') {
                                    $cmd = $conn->query("SELECT * FROM atendimentos");
                                    echo "
                                    <select class='form-control' name='status' style='text-align: center; width: 170px;'> ";  
                                        echo "<option>$value[status_atendimento]</option>
                                    </select>
                                    ";
                                }
                                
                            
                            echo "</td>
                            
                            <td>
                            <div class='form-group ml-auto mr-auto'>
                                <button class='btn btn-primary' type='submit' style='border-radius: 100%;'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check' viewBox='0 0 16 16'>
                                    <path d='M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z'/>
                                </svg>
                                </button>
                            </div>
                            </td>
                            </form>
                            </tr>";

                            
                        }
                
                    }


                    echo"
                    
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    ";

                }

            }

            ?>

</div>
     

 



<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
</body>

</html>
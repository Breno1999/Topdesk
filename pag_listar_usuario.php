<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<?php

include_once('config.php');
$sql = "SELECT * FROM usuarios";

$result = $mysql_con->query($sql);

   
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <link rel="stylesheet" href="CSS\estilo-telas-table.css">
    <link rel="stylesheet" href="CSS\estilo1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
  
    <script>
        jQuery(function ($) {

        $(".sidebar-dropdown > a").click(function() {
        $(".sidebar-submenu").slideUp(200);
        if (
        $(this)
        .parent()
        .hasClass("active")
        ) {
        $(".sidebar-dropdown").removeClass("active");
        $(this)
        .parent()
        .removeClass("active");
        } else {
        $(".sidebar-dropdown").removeClass("active");
        $(this)
        .next(".sidebar-submenu")
        .slideDown(200);
        $(this)
        .parent()
        .addClass("active");
        }
        });

        $("#close-sidebar").click(function() {
        $(".page-wrapper").removeClass("toggled");
        });
        $("#show-sidebar").click(function() {
        $(".page-wrapper").addClass("toggled");
        });




        });
    </script>

<title>Atendimentos</title>
 

</head>

<body>

<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
        <div class="sidebar-brand">
            <a>Menu</a>
            <div id="close-sidebar">
            <i class="fas fa-times"></i>
            </div>
        </div>

        <div class="sidebar-menu">
            <ul>
            <li class="header-menu">
                <span>Geral</span>
            </li>
            <li class="sidebar">
                <a href="pag_inicial_adm.php">
                <span>Painel</span>
                </a>
            </li>
            <li class="sidebar">
                <a href="pag_chamados_adm.php">
                <span>Atendimentos</span>
                </a>
            </li>
            <li class="sidebar-dropdown">
                <a href="#">
                <span>Editar conta</span>
                </a>
                <div class="sidebar-submenu">
                <ul>
                    <li>
                    <a data-toggle="modal" data-target="#modalAlterarSenha" href="">Alterar Senha</a>
                    </li>
                    <li>
                    <a data-toggle="modal" data-target="#modalAlterarDados" href="">Editar dados</a>
                    </li>
                </ul>
                </div>
            </li>

            <li class="sidebar-dropdown">
                <a href="#">
                <span>Administração</span>
                </a>
                <div class="sidebar-submenu">
                <ul>
                    <li>
                    <a data-toggle="modal" data-target="#modalCadastro" href="#">Criar novo usuário</a>
                    </li>
                    <li>
                    <a data-toggle="modal" data-target="#modalEditarUsuario" href="#">Editar usuário</a>
                    </li>
                    <li>
                    <a data-toggle="modal" data-target="#modalExcluirUsuario" href="#">Excluir usuário</a>
                    </li>
                </ul>
                </div>
            </li>
        


            <li class="sidebar">
                <a href="index.php">
                <span>Sair</span>
                </a>
            </li>
    </nav>
  
  <header>
        <div class="titulo">
            <h1>Atendimentos</h1> 
        </div>
 </header>

    <!-- Modal alterar senha -->
    <div class="modal fade" id="modalAlterarSenha" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
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
                    <input type="password" class="form-control col-7" id="exampleInputPassword1" placeholder="Senha">
                    <br>
                    <input type="password" class="form-control col-7" id="exampleInputPassword2" placeholder="Confirmar senha">
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
<div class="modal fade" id="modalAlterarDados" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
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
            <label for="Nome">Nome</label>
            <input type="text" class="form-control" id="Nome" placeholder="Nome completo">
        
            <label for="Email sm-6">Email</label>
            <input type="email" class="form-control " id="Email" placeholder="Email">
        
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="dt_nascimento">Data de nascimento</label>
                        <input type="date" class="form-control" id="dt_nascimento" placeholder="Data de nascimento">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" id="cidade" placeholder="Cidade">
                    </div>
                    
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Salvar alterações</button>
      </div>
    </div>
  </div>
</div>

        <!-- Modal Criar ususario ADM-->
        <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCentralizado">Novo usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
              <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email"name="email" placeholder="Email">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="dt_nascimento">Data de nascimento</label>
                        <input type="date" class="form-control" id="dt_nascimento" name="dt_nascimento" placeholder="Data de nascimento">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputCity">Cidade</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade">
                        </div>
                    </div>
                    <div class="form-group">
                                <label for="exampleInputPassword1">Senha</label>
                                <input type="password" class="form-control col-7" id="exampleInputPassword1" name="senha" placeholder="Senha">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary" >Criar</button>
                    </div>
                    </form>
              </div>
            </div>
        </div>
        </div>

         <!-- Modal alterar todos dados ADM -->
         <div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCentralizado">Editar usuário</h5>
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
                
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="dt_nascimento">Data de nascimento</label>
                            <input type="date" class="form-control" id="dt_nascimento" placeholder="Data de nascimento">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" id="cidade" placeholder="Cidade">
                        </div>
                    </div>
                    <div class="form-group">
                            <label for="exampleInputPassword1">Nova senha</label>
                            <input type="password" class="form-control col-7" id="exampleInputPassword1" placeholder="Nova senha">
                    </div>

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

        <!-- Modal excluir usuario   -->
        <div class="modal fade" id="modalExcluirUsuario" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="TituloModalCentralizado">Excluir usuário</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">CPF</label>
                            <input type="text" class="form-control border-danger col-8" id="exampleInputEmail1" aria-describedby="cpf-excluir" placeholder="Informe o CPF">
                            <small id="cpf" class="form-text text-muted">Informe o CPF do usuário que deseja excluir.</small>
                        </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#modal6">Excluir</button>
                    </div>
                    </div>
                </div>
        </div>

        <!-- Excluir usuario ADM mensagem-->
        <div class="modal fade" id="modalConfExcluir" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCentralizado">Excluir usuário permanetemente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>As informações desse usuário serão apagadas permanentemente. Deseja continuar?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Continuar</button>
              </div>
            </div>
          </div>
        </div>


        <div class="container">
            <div class="fundo-tabela">
                <div class="scroll">
                    <table class="table table-responsive-sm text-dark table-hover" >
                            <thead class="thead-light ">
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">cpf</th>
                                    <th scope="col">email</th>
                                    <th scope="col">data de nascimento</th>
                                    <th scope="col">Perfil de acesso</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                        
                        <tbody class="bg-light">
                            <?php
                                while($user_data = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>".$user_data['nome']."</td>";
                                    echo "<td>".$user_data['cpf']."</td>";
                                    echo "<td>".$user_data['email']."</td>";
                                    echo "<td>".$user_data['dt_nascimento']."</td>";
                                    echo "<td>".$user_data['perfil_acesso']."</td>";
                                    echo "<td>
                                    <a class='btn btn-sm btn-primary' href='editar_usuario.php?cpf=$user_data[cpf]' title='Editar'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                    </svg>
                                    </a>

                                    <a class='btn btn-sm btn-danger' href='deletar_usuario.php?cpf=$user_data[cpf]' title='Deletar'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                    </svg>
                                    </a>
                                        </td>";
                                    echo "</tr>";
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
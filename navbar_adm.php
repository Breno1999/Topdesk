

<?php

        echo "

        <header>

            <nav class='navbar navbar-expand-sm navbar-light bg-light'>
            <a class='navbar-brand ml-3' href='pag_inicial.php'>
                <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-house' viewBox='0 0 16 16'>
                    <path d='M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z'/>
                </svg>
            </a>
                
                <div class='collapse navbar-collapse' id='collapsibleNavId'>
                    <ul class='navbar-nav mr-auto mt-2 mt-lg-2'>
                        <li class='nav-item'>
                            <a class='nav-link' href='pag_atendimentos.php'>Atendimentos <span class='sr-only'>(current)</span></a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='pag_inventarios.php'>Inventário de máquina</a>
                        </li>
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' id='dropdownId' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Administração</a>
                            <div class='dropdown-menu' aria-labelledby='dropdownId'>
                                <h6 class='dropdown-header'>Usuários</h6>
                                <a class='dropdown-item' href='pag_listar_usuario.php'>Listar usuários</a>
                                <a class='dropdown-item' data-toggle='modal' data-target='#modalCadastrar'>Cadastrar usuário</a>
                                <a class='dropdown-item' data-toggle='modal' data-target='#modalEditarUser'>Editar usuário</a>
                                <a class='dropdown-item' data-toggle='modal' data-target='#modalDesativar'>Ativar/Desativar acesso</a>
                                <a class='dropdown-item' data-toggle='modal' data-target='#modalDeletar'>Deletar usuário</a>
                                <h6 class='dropdown-header'>Atendimento</h6>
                                <a class='dropdown-item' href='pag_atendimentos_adm.php'>Inspecionar atendimentos</a>
                            </div>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='pag_listar_gestor.php'>Gestores</a>
                        </li>

                    </ul>

                    <ul class='navbar-nav mr-4'>
                    
                        <li class='nav-item dropdown dropleft mt-lg-2 mr-2'>
                            <a class='nav-link dropdown-toggle' href='#' id='dropdownId' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-person-fill' viewBox='0 0 16 16'>
                                    <path d='M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z'/>
                                </svg>
                            </a>
                            <div class='dropdown-menu' aria-labelledby='dropdownId'>
                                <h6 class='dropdown-header'>Perfil</h6>
                                <a class='dropdown-item' data-toggle='modal' data-target='#modalAlterarSenha'>Alterar senha</a>
                                <a class='dropdown-item' data-toggle='modal' data-target='#modalEditar'>Editar dados</a>
                                <a class='dropdown-item' href='deslogar.php'>Sair</a>
                            </div>
                        </li>

                        <li class='nav-item mt-lg-3 '>
                            <p style='color: black;'>
                                $_SESSION[nome]
                            </p>
                        </li>

                    </ul>

                    
                </div>
            </nav>

        </header>



        <div class='modal fade' id='modalCadastrar' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
            <div class='modal-body'>
            <form action='cadastrar_usuario.php' method='POST'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='TituloModalCentralizado'>Cadastrar usuário</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='form-group'>
                    <div class='row form-group mx-auto'>
                        <div class='mx-auto'>
                        <label>Nome</label>
                            <input type='text' class='form-control col-12 ' id='Nome' name='nome'placeholder='Nome completo' maxlength='40' required>
                        </div>
                        <div class='ml-4'>
                        <label for='cidade'>Cidade</label>
                            <input type='text' class='form-control col-10' id='cidade' name='cidade' placeholder='Cidade' required>
                        </div>
            
                    </div>

                    
                    <div class='mx-3'>
                        <label for='Email sm-6'>Email</label>
                            <input type='email' class='form-control col-7' id='Email' name='email' placeholder='Email' required>
                    </div>

                    <div class='row form-group mx-3'>
                        <div class='mt-3'>
                        <label>CPF</label>
                            <input type='text' class='form-control col-12 ' id='cpf' name='cpf' placeholder='CPF' maxlength='11' required>
                        </div>
                        <div class='mt-3 mx-auto'>
                        <label for='dt_nascimento'>Data de nascimento</label>
                            <input type='date' class='form-control col-12' id='dt_nascimento' name='dt_nascimento' required>
                        </div>
            
                    </div>
                    <div class=' row mx-3 mt-auto'>
                        <div class='mt-3'>
                          <label for=''>Perfil de Acesso</label>
                          <select class='form-control col-12' name='tp_acesso' id='perfil_acesso' required>
                            <option>AGR</option>
                            <option>Técnico</option>
                            <option>Administrador</option>
                          </select>
                        </div>

                        <div class='mt-3 mx-4'>
                          <label for=''>Status</label>
                          <select class='form-control col-12' name='status' id='status' required>
                            <option>Ativo</option>
                            <option>Inativo</option>
                          </select>
                        </div>
                    </div>

                    <div class=' row mx-0 mt-3'>

                        <div class='col-6'>
                          <label for=''>Responsavel</label>
                          <select class='form-control col-10' name='responsavel' id='responsavel' required>
                            <option>Nenhum</option>
                          ";

                            include_once('config.php');

                            $cmd = $conn->query("SELECT * FROM usuarios WHERE user_status = 'Ativo'  and gestor = 'Sim'");
                            $resultado = $cmd->fetchAll();
                                    
                                      
                            foreach($resultado as $key => $value){
            
                                    
                                        #gera a tabela com os registros do banco de dados
                                        echo "<option>".$value['nome']."</option>";

                            }
                
                    echo" </select>
                        </div>

                        <div >
                        <label>Gestor</label>
                            <div class='form-check'>
                                <label class='form-check-label'>
                                    <input type='radio' class='form-check-input' name='option' id='option1' value='Sim' >
                                    Sim
                                </label>
                                <label class='form-check-label ml-5'>
                                    <input type='radio' class='form-check-input' name='option' id='option2' value='Não' >
                                    Não
                                </label>
                            </div>
                        </div>

                    </div>
        
                    
                </div>
                        <div class='form-group mx-3'>
                            <label for='exampleInputPassword1'>Senha</label>
                            <input type='password' class='form-control col-6' id='exampleInputPassword1' name='senha' placeholder='Senha' required>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                            <button type='submit' class='btn btn-primary'>Cadastrar</button>
                        </div>
                </form>
            </div>
            </div>
        </div>
        </div>



        <!-- Modal alterar dados -->
  <div class='modal fade' id='modalEditar' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
            <div class='modal-body'>
            <form action='editar_dados.php' method='POST'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='TituloModalCentralizado'>Alterar meus dados</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='form-group'>
                    <div class='row form-group'>
                        <div class='mx-auto'>
                        <label>Nome</label>
                            <input type='text' class='form-control col-12 ' id='Nome' name='nome' placeholder='Nome completo' required>
                        </div>
                        <div class='ml-4'>
                        <label for='cidade'>Cidade</label>
                            <input type='text' class='form-control col-10' id='cidade' name='cidade' placeholder='Cidade' required>
                        </div>
            
                    </div>

                    
                    <div class='mx-3'>
                        <label for='Email sm-6'>Email</label>
                            <input type='email' class='form-control col-7' id='Email' name='email' placeholder='Email' required>
                    </div>
                    <div class='mt-3 mx-3'>
                        <label for='dt_nascimento'>Data de nascimento</label>
                            <input type='date' class='form-control col-5 ' id='dt_nascimento' name='dt_nascimento' placeholder='Data de nascimento' required>
                    </div>
    
                    
                </div>
                        <div class='form-group mx-3'>
                            <label for='exampleInputPassword1'>Senha</label>
                            <input type='password' class='form-control col-6' id='exampleInputPassword1' name='senha' placeholder='Senha' required>
                            <br>
                            <input type='password' class='form-control col-6' id='exampleInputPassword2' name='conf_senha' placeholder='Confirmar senha' required>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                            <button type='submit' class='btn btn-primary'>Salvar alterações</button>
                        </div>
                </form>
            </div>
            </div>
        </div>
        </div>

        <!--modal alterar todos os dados -->
        <div class='modal fade' id='modalEditarUser' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
            <div class='modal-body'>
            <form action='cadastrar_usuario.php' method='POST'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='TituloModalCentralizado'>Editar dados do usuário</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='form-group mt-3'>
                    <div class='row form-group mx-auto'>
                        <div class='mx-auto'>
                        <label>Nome</label>
                            <input type='text' class='form-control col-12 ' id='Nome' name='nome'placeholder='Nome completo' maxlength='40' required>
                        </div>
                        <div class='ml-4'>
                        <label>CPF</label>
                            <input type='text' class='form-control col-12 ' id='cpd' name='cpf'placeholder='CPF' maxlength='11' required>
                        </div>
            
                    </div>

                    
                    <div class='mx-3'>
                        <label for='Email sm-6'>Email</label>
                            <input type='email' class='form-control col-7' id='Email' name='email' placeholder='Email' required>
                    </div>

                    <div class='row form-group mx-3'>
                        <div class='mt-3'>
                        <label for='cidade'>Cidade</label>
                            <input type='text' class='form-control col-10' id='cidade' name='cidade' placeholder='Cidade' required>
                        </div>
                        
                        <div class='mt-3 mx-auto'>
                        <label for='dt_nascimento'>Data de nascimento</label>
                            <input type='date' class='form-control col-12' id='dt_nascimento' name='dt_nascimento' required>
                        </div>
            
                    </div>
                    <div class=' row mx-3'>
                        <div class='mt-3'>
                          <label for=''>Perfil de Acesso</label>
                          <select class='form-control col-12' name='tp_acesso' id='perfil_acesso' required>
                            <option>AGR</option>
                            <option>Técnico</option>
                            <option>Administrador</option>
                          </select>
                        </div>

                        <div class='mt-3 mx-auto'>
                          <label for=''>Status</label>
                          <select class='form-control col-12' name='status' id='status' required>
                            <option>Ativo</option>
                            <option>Inativo</option>
                          </select>
                        </div>
                    </div>
        
                    
                </div>
                        <div class='form-group mx-3'>
                            <label for='exampleInputPassword1'>Senha</label>
                            <input type='password' class='form-control col-6' id='exampleInputPassword1' name='senha' placeholder='Senha' required>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                            <button type='submit' class='btn btn-primary'>Salvar alterações</button>
                        </div>
                </form>
            </div>
            </div>
        </div>
        </div>

        <!-- Modal alterar senha -->
    <div class='container-fluid'>
        <div class='modal fade' id='modalAlterarSenha' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered' role='document'>
                    <div class='modal-content'>
                    <div class='modal-body'>
                        <form action='alterar_senha.php' method='POST'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='TituloModalCentralizado'>Alterar senha</h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                            <div class='form-group mx-3 mt-3'>
                                <label for='exampleInputEmail1'>Endereço de email</label>
                                <input type='email' class='form-control col-8' name='email' aria-describedby='emailHelp' placeholder='Seu email' required>
                                <small id='emailHelp' class='form-text text-muted'>Nunca vamos compartilhar seu email, com ninguém.</small>
                            </div>
                                    <div class='form-group mx-3'>
                                        <label for='exampleInputPassword1'>Senha</label>
                                        <input type='password' class='form-control col-6' name='senha' placeholder='Senha' required>
                                        <br>
                                        <input type='password' class='form-control col-6' name='conf_senha' placeholder='Confirmar senha' required>
                                    </div>

                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                        <button type='submit' class='btn btn-primary'>Alterar senha</button>
                                    </div>
                            </form>
                    </div>
                
                    </div>
                </div>
        </div>


        <!-- Modal desativar-->
        <div class='modal fade' id='modalDesativar' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
            <div class='modal-body'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLongTitle'>Permitir ou bloquear acesso</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <br>
                <form action='libera_acesso.php' method='POST'>
                    <label for='cpf'>CPF</label>
                    <input class='form-control col-7' type='text' name='cpf' id='cpf' placeholder='CPF' required>
                    <small id='emailHelp' class='form-text text-muted'>Informe o cpf do usuário.</small>

                    <div class='mt-3 mx-auto'>
                          <label for=''>Status do usuário</label>
                          <select class='form-control col-3' name='status' id='status' required>
                            <option>Ativo</option>
                            <option>Inativo</option>
                          </select>
                    </div>
                
                <br>

                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                    <button type='submit' class='btn btn-danger'>Salvar</button>
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>


        <!-- Modal deletar-->
        <div class='modal fade' id='modalDeletar' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
            <div class='modal-body'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLongTitle'>Excluir usuário</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <br>
                <form action='deletar.php' method='POST'>
                    <label for='cpf'>CPF</label>
                    <input class='form-control col-7' type='text' name='cpf' id='cpf' placeholder='CPF'>
                    <small id='emailHelp' class='form-text text-muted'>Esse usuário será excluido permanetemente.</small>
                
                <br>

                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                    <button type='submit' class='btn btn-danger'>Deletar</button>
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>


        ";

?>
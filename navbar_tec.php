

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
                        <li class='nav-item'>
                            <a class='nav-link' href='pag_listar_usuario.php'>Usuários</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='pag_listar_gestor.php'>Gestores</a>
                        </li>


                    </ul>

                    <ul class='navbar-nav mr-4'>
                    
                        <li class='nav-item dropdown dropleft mt-lg-2 mr-2'>
                            <a class='nav-link dropdown-toggle' href='#' id='dropdownId' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='28' height='28' fill='currentColor' class='bi bi-person-circle' viewBox='0 0 16 16'>
                                <path d='M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z'/>
                                <path fill-rule='evenodd' d='M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z'/>
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



        <!-- Modal alterar todos dados -->
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
                            <input type='text' class='form-control col-12 ' id='Nome' name='nome' value='$_SESSION[nome]' placeholder='Nome completo'>
                        </div>
                        <div class='ml-4'>
                        <label for='cidade'>Cidade</label>
                            <input type='text' class='form-control col-10' id='cidade' name='cidade' placeholder='Cidade'>
                        </div>
            
                    </div>

                    
                    <div class='mx-3'>
                        <label for='Email sm-6'>Email</label>
                            <input type='email' class='form-control col-7' id='Email' value='$_SESSION[email]' name='email' placeholder='Email'>
                    </div>
                    <div class='mt-3 mx-3'>
                        <label for='dt_nascimento'>Data de nascimento</label>
                            <input type='date' class='form-control col-5 ' id='dt_nascimento' name='dt_nascimento' placeholder='Data de nascimento'>
                    </div>
    
                    
                </div>
                        <div class='form-group mx-3'>
                            <label for='exampleInputPassword1'>Senha</label>
                            <input type='password' class='form-control col-6' id='exampleInputPassword1' name='senha' placeholder='Senha'>
                            <br>
                            <input type='password' class='form-control col-6' id='exampleInputPassword2' name='conf_senha' placeholder='Confirmar senha'>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
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
                            <div class='form-group'>
                                <label for='exampleInputEmail1'>Endereço de email</label>
                                <input type='email' class='form-control col-8' name='email' aria-describedby='emailHelp' placeholder='Seu email'>
                                <small id='emailHelp' class='form-text text-muted'>Nunca vamos compartilhar seu email, com ninguém.</small>
                            </div>
                                    <div class='form-group'>
                                        <label for='exampleInputPassword1'>Senha</label>
                                        <input type='password' class='form-control col-6' name='senha' placeholder='Senha'>
                                        <br>
                                        <input type='password' class='form-control col-6' name='conf_senha' placeholder='Confirmar senha'>
                                    </div>

                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
                                        <button type='submit' class='btn btn-primary'>Alterar senha</button>
                                    </div>
                            </form>
                    </div>
                
                    </div>
                </div>
        </div>

        ";

?>
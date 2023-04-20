

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
                            <a class='nav-link' href='#'>Inventário de máquina</a>
                        </li>
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' id='dropdownId' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Administração</a>
                            <div class='dropdown-menu' aria-labelledby='dropdownId'>
                                <h6 class='dropdown-header'>Usuários</h6>
                                <a class='dropdown-item' href='#'>Listar usuários</a>
                                <a class='dropdown-item' href='#'>Cadastrar usuário</a>
                                <a class='dropdown-item' href='#'>Editar usuário</a>
                                <a class='dropdown-item' href='#'>Deletar usuário</a>
                                <h6 class='dropdown-header'>Atendimento</h6>
                                <a class='dropdown-item' href='pag_atendimentos_adm.php'>Inspencionar atendimentos</a>
                            </div>
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

        <!-- Modal alterar todos dados -->
        <div class='modal fade' id='modalEditar' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered' role='document'>
            <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='TituloModalCentralizado'>Alterar meus dados</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
            <form >
                <div class='form-group'>
                    <label for='exampleInputEmail1'>Nome</label>
                    <input type='text' class='form-control' id='Nome' placeholder='Nome completo'>

                    <label for='Email sm-6'>Email</label>
                    <input type='email' class='form-control ' id='Email' placeholder='Email'>
                
                    <label for='dt_nascimento'>Data de nascimento</label>
                    <input type='date' class='form-control col-4 ' id='dt_nascimento' placeholder='Data de nascimento'>

                </div>
                        <div class='form-group'>
                            <label for='exampleInputPassword1'>Senha</label>
                            <input type='password' class='form-control col-7' id='exampleInputPassword1' placeholder='Senha'>
                            <br>
                            <input type='password' class='form-control col-7' id='exampleInputPassword2' placeholder='Confirmar senha'>
                        </div>
                </form>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
                <button type='button' class='btn btn-primary' data-dismiss='modal'>Salvar alterações</button>
            </div>
            </div>
        </div>
        </div>

        <!-- Modal alterar senha -->
    <div class='container-fluid'>
        <div class='modal fade' id='modalAlterarSenha' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered' role='document'>
                    <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='TituloModalCentralizado'>Alterar senha</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <form action='alterar_senha.php' method='POST'>
                            <div class='form-group'>
                                <label for='exampleInputEmail1'>Endereço de email</label>
                                <input type='email' class='form-control' name='email' aria-describedby='emailHelp' placeholder='Seu email'>
                                <small id='emailHelp' class='form-text text-muted'>Nunca vamos compartilhar seu email, com ninguém.</small>
                            </div>
                                    <div class='form-group'>
                                        <label for='exampleInputPassword1'>Senha</label>
                                        <input type='password' class='form-control' name='senha' placeholder='Senha'>
                                        <br>
                                        <input type='password' class='form-control' name='conf_senha' placeholder='Confirmar senha'>
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
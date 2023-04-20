

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
                                <a class='dropdown-item' href='#'>Alterar senha</a>
                                <a class='dropdown-item' data-toggle='modal' data-target='#editarModal'>Editar dados</a>
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

        ";

?>
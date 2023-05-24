<?php

#inclui o arquivo de configuração do banco de dados
include_once('config.php');

#traz os valores dos campos da tela de login
$login = $_POST['login'];
$senha = $_POST['senha'];
$senha = md5($senha);


#traz todos os registros do usuario 
try{
    $cmd = $conn->query("SELECT * FROM usuarios WHERE email = '$login'");
    $result = $cmd->fetch(PDO::FETCH_ASSOC);

    if($result == 0){
        echo "<script>alert('Nenhum usuario encontrado! Por favor cadastre-se com o adm do sistema.');</script>";
        echo "<script>location.href= 'index.php';</script>";
    }
}
#menssagem de falha ao trazer dados do usuario
catch(PDOExeption $e){
    echo "<script>alert('Falha ao trazer dados do usuário!');</script>".$e->getMessage();
    echo "<script>location.href= 'index.php';</script>";
}

        #verifica se o email e senha passados são iguais ao cadastrado no banco de dados
        if($result['email'] == $login and $result['senha'] == $senha){

            #verifica o tipo de perfil de acesso e inicia a sessão
            if($result['perfil_acesso'] == 'Administrador' && $result['user_status'] == 'Ativo'){
                
                session_start();
                    $_SESSION['nome'] = $result['nome'];
                    $_SESSION['email'] = $result['email'];
                    $_SESSION['cpf'] = $result['cpf'];
                    $_SESSION['senha'] = $result['senha'];
                    $_SESSION['tipo_acesso'] = $result['perfil_acesso'];
                echo "<script>location.href= 'pag_inicial.php';</script>";
            }
            elseif($result['user_status'] == 'Inativo'){

                    echo "<script>alert('Usuário sem acesso!');</script>";
                    echo "<script>location.href='index.php';</script>";
                
            }
            else{
                #verifica o tipo de perfil de acesso e inicia a sessão
                if($result['perfil_acesso'] == 'Técnico' && $result['user_status'] == 'Ativo'){
                    session_start();
                        $_SESSION['nome'] = $result['nome'];
                        $_SESSION['email'] = $result['email'];
                        $_SESSION['cpf'] = $result['cpf'];
                        $_SESSION['senha'] = $result['senha'];
                        $_SESSION['tipo_acesso'] = $result['perfil_acesso'];
                    echo "<script>location.href= 'pag_inicial.php';</script>";
                }
                elseif($result['user_status'] == 'Inativo'){

                    
                        echo "<script>alert('Usuário sem acesso!');</script>";
                        echo "<script>location.href= 'index.php';</script>";
                    
                }
                else{
                    #verifica o tipo de perfil de acesso e inicia a sessão
                    if($result['perfil_acesso'] == 'AGR' && $result['user_status'] == 'Ativo'){
                        session_start();
                        $_SESSION['nome'] = $result['nome'];
                        $_SESSION['email'] = $result['email'];
                        $_SESSION['cpf'] = $result['cpf'];
                        $_SESSION['senha'] = $result['senha'];
                        $_SESSION['tipo_acesso'] = $result['perfil_acesso'];
                        echo "<script>location.href= 'abrir_solicitacao.php';</script>";
                    }
                    elseif($result['user_status'] == 'Inativo'){

                       
                            echo "<script>alert('Usuário sem acesso!');</script>";
                            echo "<script>location.href= 'index.php';</script>";
                        
                    }
                }
            }

        }
        else{
            #mensagem de dados incorretos
            echo "<script>alert('Dados incorretos');</script>";
            echo "<script>location.href= 'index.php';</script>";
            
        }


?>
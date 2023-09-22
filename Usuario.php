<?php

    class Usuario{

        private $nome;
        private $cpf;
        private $email;
        private $perfil_acesso;
        private $cidade;
        private $dt_nascimento;
        private $status;
        private $responsavel;
        private $gestor;
        private $senha;

        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            return $this->nome = $nome;
        }

        public function getCpf(){
            return $this->cpf;
        }
        public function setCpf($cpf){
            return $this->cpf = $cpf;
        }

        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            return $this->email = $email;
        }

        public function getTelefone(){
            return $this->senha;
        }
        public function setTelefone($telefone){
            return $this->telefone = $telefone;
        }

        public function getPerfil(){
            return $this->perfil_acesso;
        }
        public function setPerfil($perfil_acesso){
            return $this->perfil_acesso = $perfil_acesso;
        }

        public function getCidade(){
            return $this->cidade;
        }
        public function setCidade($cidade){
            return $this->cidade = $cidade;
        }

        public function getDt_nascimento(){
            return $this->dt_nascimento;
        }
        public function setDt_nascimento($dt_nascimento){
            return $this->dt_nascimento = $dt_nascimento;
        }

        public function getStatus(){
            return $this->status;
        }
        public function setStatus($status){
            return $this->status = $status;
        }

        public function getResponsavel(){
            return $this->responsavel;
        }
        public function setResponsavel($responsavel){
            return $this->resposavel = $responsavel;
        }

        public function getGestor(){
            return $this->gestor;
        }
        public function setGestor($gestor){
            return $this->gestor = $gestor;
        }

        public function getSenha(){
            return $this->senha;
        }
        public function setSenha($senha){
            return $this->senha = $senha;
        }

        #metodo para cadastrar o usuario
        public function cadastrarUsuario($nome,$cpf,$email,$telefone, $perfil_acesso, $cidade, $dt_nascimento, $status, $responsavel, $gestor, $senha){

            try {
                include_once('config.php');

                $this->nome = $nome;
                $this->cpf = $cpf;
                $this->email = $email;
                $this->telefone = $telefone;
                $this->perfil_acesso = $perfil_acesso;
                $this->cidade = $cidade;
                $this->dt_nascimento = $dt_nascimento;
                $this->status = $status;
                $this->responsavel = $responsavel;
                $this->gestor = $gestor;
                $this->senha = $senha;

                #cadastra o novo usuario na base de dados
                $cmd = $conn->query("INSERT INTO usuarios VALUES ('','$nome','$cpf','$email', '$telefone', '$perfil_acesso','$cidade','$dt_nascimento','$status','$responsavel', '$gestor', '$senha')");
    

                if($cmd){
                    echo "<script>alert('Cadastro realizado com sucesso!');</script>";
                    echo "<script>location.href= 'pag_inicial.php';</script>";
                }
            
            } catch (\Exception $e) {
                
                echo "<script>alert('Falha ao cadastrar novo usuário!');</script>" .$e;
            }

        }

        #metodo para alterar a senha do usuario
        public function alterarSenha($e, $s){


            try {
                include_once('config.php');

                $this->email = $e;
                $this->senha = $s;

                #faz alteração da senha no banco de dados 
                $cmd = $conn->prepare("UPDATE usuarios SET senha = :s WHERE email = :e");
                $cmd->bindValue(":e", $e);
                $cmd->bindValue(":s", $s);
                $cmd->execute();

                if($cmd){
                    echo "<script>alert('Senha alterada com sucesso!');</script>";
                    echo "<script>location.href= 'pag_inicial.php';</script>";
                }
            
            } catch (\Exception $e) {
                
                echo "<script>alert('Falha ao alterar senha!');</script>" .$e;
            }

            
        }
        

        #metodo para editar dados do usuarios 
        public function editarDados($nome, $email, $cidade, $dt_nascimento, $senha){


            try {
                include_once('config.php');

                $this->nome = $nome;
                $this->email = $email;
                $this->cidade = $cidade;
                $this->dt_nascimento = $dt_nascimento;
                $this->senha = $senha;

                #faz alterar os valores do usuario na base de dados
                $cmd = $conn->prepare("UPDATE usuarios SET nome = :n,  email = :e, dt_nascimento = :dt, senha = :s WHERE email = :e");
                $cmd->bindValue(":n", $nome);
                $cmd->bindValue(":e", $email);
                $cmd->bindValue(":c", $cidade);
                $cmd->bindValue(":dt", $dt_nascimento);
                $cmd->bindValue(":s", $senha);
                $cmd->execute();

                if($cmd){
                    echo "<script>alert('Dados alterados com sucesso!');</script>";
                    echo "<script>location.href= 'pag_inicial.php';</script>";
                }
            
            } catch (\Exception $e) {
                
                echo "<script>alert('Falha ao alterar dados!');</script>" .$e;
            }

            
        }


        #metodo para desativar usuarios 
        public function liberaAcesso($cpf, $status){


            try {
                include_once('config.php');

                $this->cpf = $cpf;
                $this->status = $status;


                    #faz alterar os valores do usuario na base de dados
                    $cmd = $conn->prepare("UPDATE usuarios SET user_status = :s WHERE cpf = :cpf");
                    $cmd->bindValue(":cpf", $cpf);
                    $cmd->bindValue(":s", $status);
                    $cmd->execute();

                    if($cmd){       

                        $cmd = $conn->query("SELECT * FROM usuarios WHERE cpf = '$cpf' ");
                        $resultado = $cmd->fetch();

                        if($resultado['user_status'] == 'Ativo'){
                            echo "<script>alert('Acesso do usuario Ativado!');</script>";
                            echo "<script>location.href= 'pag_listar_usuario.php';</script>";
                        }
                        elseif($resultado['user_status'] == 'Inativo'){
                            
                            echo "<script>alert('Acesso do usuario Desativado!');</script>";
                            echo "<script>location.href= 'pag_listar_usuario.php';</script>";
                            
                        }
                        elseif(empty($resultado)){
                            echo "<script>alert('Nenhum CPF encontrado!');</script>";
                            echo "<script>location.href= 'pag_listar_usuario.php';</script>";
                        }
                    }

                

                
            
            } catch (\Exception $e) {
                
                echo "<script>alert('Não foi possivel desativar esse usuario!');</script>" .$e;
            }

            
        }

        public function deletarUsuario($cpf){


            try {
                include_once('config.php');

                $this->cpf = $cpf;

                $cmd = $conn->query("SELECT * FROM usuarios WHERE cpf = '$cpf' ");
                $resultado = $cmd->fetch();

                if($cmd){


                    if($resultado){

                        #faz alteração da senha no banco de dados 
                        $cmd = $conn->prepare("DELETE FROM usuarios WHERE cpf = :cpf");
                        $cmd->bindValue(":cpf", $cpf);
                        $cmd->execute();

                        echo "<script>alert('Usuario apagado com sucesso!');</script>";
                        echo "<script>location.href= 'pag_listar_usuario.php';</script>";
                    }
                    elseif(empty($resultado)){
                        echo "<script>alert('Nenhum CPF encontrado!');</script>";
                        echo "<script>location.href= 'pag_listar_usuario.php';</script>";
                    }
                    
                }
                
            
            } catch (\Exception $e) {
                
                echo "<script>alert('Falha ao excluir usuário!');</script>" .$e;
            }

            
        }

    }

   
?>  
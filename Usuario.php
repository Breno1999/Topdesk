<?php

    class Usuario{

        private $pdo;

        public function __construct(){

            try{

                include_once('config.php');

                
            }
            catch(PDOException $e){
                echo" Error com banco de dados: ".$e->getMessage();
                exit();
            }
            catch(Exception $e){
                echo" Error generico: ".$e->getMessage();
                exit();
            }
        }

        public function alterarSenha($email, $senha){


            $cmd = $this->pdo->prepare("UPDATE usuarios SET senha = :s WHERE email = :e");
            $cmd->bindValue(":e", $email);
            $cmd->bindValue(":s", $senha);
            $cmd->execute();
        }

    }

   
?>  
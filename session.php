<?php
//Inicialização de sessão.
if(!isset($_SESSION)){
    session_start();
    

}

if(empty($_SESSION)){
    echo "<script>alert('Usuário não autenticado!');</script>";
    echo "<script>location.href= 'index.php';</script>";
}

?>
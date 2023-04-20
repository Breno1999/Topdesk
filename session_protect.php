<?php


include_once('session.php');


if(empty($_SESSION)){
    echo "<script>alert('Usuário deslogado!');</script>";
    echo "<script>location.href= 'index.php';</script>";

}

else{

    if($_SESSION['tipo_acesso'] == 'Administrador' || $_SESSION['tipo_acesso'] == 'Técnico'){

        
    
    }
    else{

        echo "<script>alert('Usuário sem permissão!');</script>";
        session_destroy();
        echo "<script>location.href= 'index.php';</script>";

    }
    



}



?>
<?php


include_once('session.php');


if ($_SESSION['tipo_acesso'] != 'Administrador' && $_SESSION['tipo_acesso'] != 'Técnico') {

    echo "<script>alert('Usuário sem permissão!');</script>";
    echo "<script>location.href= 'index.php';</script>";
  }
else{


    include_once('verifica_acesso.php');
  

}
    



?>
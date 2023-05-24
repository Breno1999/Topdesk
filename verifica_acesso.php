<?php

  include_once('session.php');
  include_once('config.php');

    $cmd = $conn->query("SELECT * FROM usuarios WHERE email = '$_SESSION[email]'");
    $resultado = $cmd->fetch();
  
  if($_SESSION['tipo_acesso'] == 'Administrador'){

    if($resultado['user_status'] != 'Ativo'){
        session_destroy();
        echo "<script>alert('Seu acesso foi desativado! Contate o administrador do sistema.');</script>";
        echo "<script>location.href= 'index.php';</script>";
    }
    else{
        include_once('navbar_adm.php');
    }    

  }
  elseif($_SESSION['tipo_acesso'] == 'Técnico'){

    if($resultado['user_status'] != 'Ativo'){
        session_destroy();
        echo "<script>alert('Seu acesso foi desativado! Contate o administrador do sistema.');</script>";
        echo "<script>location.href= 'index.php';</script>";
    }
    else{
        include_once('navbar_tec.php');
    }
    
  }
  elseif ($_SESSION['tipo_acesso'] == 'AGR') {

    if($resultado['user_status'] != 'Ativo'){
        session_destroy();
        echo "<script>alert('Seu acesso foi desativado! Contate o administrador do sistema.');</script>";
        echo "<script>location.href= 'index.php';</script>";
    }
    else{

      if(!isset($_SESSION)){
          session_start();
          
      
      }
    }
    
  }
  
  
?> 
<?php
    include_once('session.php');

    if(!empty($_SESSION)){

        session_destroy();
        echo "<script>location.href= 'index.php';</script>";

    }
?>
<?php
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('BASE', 'topdesk');

    try {
        $conn = new PDO("mysql:dbname=topdesk;host=localhost", USER, PASS);
    } 
    catch(PDOException $e){
        echo "<script>alert('Falha ao se conectar com banco de dados')</script>".$e->getMessage();

    }
    catch (Exception $e) {
        echo "<script>alert('Error! ')</script>".$e->getMessage();
    }
    

?>
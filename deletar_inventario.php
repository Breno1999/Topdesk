<?php
require_once('config.php');

$id_maquina = $_POST['id_maquina'];

$cmd = $conn->query("DELETE FROM maquinas WHERE id_maquina = '$id_maquina'");

if ($cmd) {

    echo "<script>location.href= 'pag_inventarios.php';</script>";
}
else{
    echo "<script>alert('Não foi possivel apagar esse inventário!');</script>";
    echo "<script>location.href= 'pag_inventarios.php';</script>";
}


?>  
<?php
session_start();
if ($_SESSION["tipo"]!=='admin'){
        session_destroy();
        header("Location: ../error.php");

    }
$categoria = $_GET['idcategoria'];
include("../conexion/conexion.php");
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}
if ($result = $connection->query("DELETE FROM categoria
     where idcategoria=$categoria")) {
    header("Location: ../usuarios/admin.php");
} else {
    mysqli_error($connection);
}
?>
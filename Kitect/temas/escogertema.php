<?php
if (isset($_SESSION["tipo"])){
                     $usuario=$_SESSION["idusuario"];
                  $sql= "select tema from usuarios where idusuario=$usuario";
                  if ($result = $connection->query($sql)){
                
                while($obj = $result->fetch_object()){
       echo'<link href="assets/css/'.$obj->tema.'.css" rel="stylesheet">';
       echo'<link href="css/'.$obj->tema.'.css" rel="stylesheet">';
     }
     }
        } else{
        echo'<link rel="stylesheet" href="vendor/bootstrap/css/Predeterminado.css" type="text/css" media="screen" />';
        echo'<link href="css/Predeterminado.css" rel="stylesheet">';


                                                         }
?>
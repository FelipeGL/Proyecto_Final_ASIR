
<?php
    if (isset($_SESSION["tipo"])){
                      $usuario=$_SESSION["us"];
                  $sql= "select tema from usuarios where idusuario=$usuario";
                  if ($result = $connection->query($sql)){
          while($obj = $result->fetch_object()){
               echo'<link href="../assets/css/bootstrap.css" rel="stylesheet">';          
      echo'<link href="../assets/css/'.$obj->tema.'.css" rel="stylesheet">';
     }
     }
     } else{
        echo'<link href="../assets/css/main.css" rel="stylesheet">';


                                                         }

                                                   ?>


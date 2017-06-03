<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href=" ">
    </head>
    <body>
<?php
    include("../conexion/conexion.php");
    
    $insert1="INSERT INTO `categoria` (`idcategoria`, `nombre`) VALUES (1, 'ejemplo');";
        
    $result = $connection->query($insert1);
        if (!$result) {
            echo "Query Error";
        var_dump($insert1);
    }

        header("Refresh:0; url=index.php");
?>

    </body>
</html>
<!DOCTYPE html>
<html lang="en">
<?php
    ob_start();
?>
<?php
    session_start();
    include("../conexion/conexion.php");
    ?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

        <title>Kitect.com</title>

        <!-- Bootstrap core CSS -->
        <link href="../assets/css/bootstrap.css" rel="stylesheet">


        <!-- Custom styles for this template -->
        <link href="../assets/css/main.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="../assets/js/hover.zoom.js"></script>
        <script src="../assets/js/hover.zoom.conf.js"></script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
    </head>

    <body>

        <!-- Static navbar -->
        <div class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../index.php"><img src="../iconos/kitect.png" width='4%' ;>KITECT.COM</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>

        <!-- +++++ Welcome Section +++++ -->
        <div id="ww">
            <?php if (!isset($_POST["nick"])) : ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 centered">
                        <h3>Cuarta ventana</h3>
                        <p class="help-block text-danger"></p>
                        <form  method="post">
                            <span>Nick admin</span><input type="text" name="nick"/><p></p>
                            <span>Nombre admin</span><input type="text" name="nombre"/><p></p>
                            <span>Apellidos admin</span><input type="text" name="apellidos"/><p></p>
                            <span>Correo electrónico admin</span><input type="email" name="email" value="@kitect.com"/><p></p>
                            <span>Contraseña admin</span><input type="password" name="pass"/><p></p>
                            <button type="submit" class="btn btn-default col-md-4 col-md-offset-9">Siguiente</button>
                        </form>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /ww -->
        <?php else :?>
        
        <?php
        $nick= $_POST["nick"];
        $nombre= $_POST["nombre"];
        $apellidos= $_POST["apellidos"];
        $correo= $_POST["email"];
        $password= $_POST["pass"];

        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        $sql="INSERT INTO usuarios (idusuario,nick,nombre,apellidos,correo,fecha_reg,password,tipo)
        VALUES ('1','$nick','$nombre','$apellidos','$correo',sysdate(),md5('$password'),'admin')";
        $result = $connection->query($sql);
            
           if (!$result) {
           echo "error";
            var_dump($sql);
        } else {
          header("Refresh:0; url=ventana5.php");
        }

        ?>
        
        <?php endif ?>
            

            <!-- +++++ Projects Section +++++ -->




            <!-- +++++ Footer Section +++++ -->

            <?php
        include("../pie.php")
        ?>


                <!-- Bootstrap core JavaScript
================================================== -->
                <!-- Placed at the end of the document so the pages load faster -->
                <script src="../assets/js/bootstrap.min.js"></script>
    </body>
<?php
ob_end_flush();
?>
</html>

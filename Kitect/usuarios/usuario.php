<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    if ($_SESSION["tipo"]!=='user'){
        session_destroy();
        header("Location: error.php");
    }
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
                    <a class="navbar-brand" href="../index.php"><img src="../iconos/kitect.png" width='4%';>KITECT.COM</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <h3>PANEL DE CONTROL DE USUARIO</h3>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>

        <!-- +++++ Welcome Section +++++ -->
        <div id="ww">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 centered">
                        <?php
                        include("../conexion/conexion.php");


                        if ($connection->connect_errno) {
                            printf("Connection failed: %s\n", $connection->connect_error);
                            exit();
                        }
                        $usuario=$_SESSION['nick'];
                        if ($result = $connection->query("SELECT * FROM usuarios where nick='$usuario';")) {
                            echo'<div>';
                            echo"<table style='border:1px solid black'>";
                            echo"<h3>Datos de $usuario</h3>";
                            echo"<thead>";
                            echo"<tr>";
                            echo"<th>IdUsuario </th>";
                            echo"<th>Nombre</th>";
                            echo"<th>Apellidos</th>";
                            echo"<th>Correo</th>";
                            echo "<th></th>";
                            echo"</thead>";
                            while($obj = $result->fetch_object()) {
                                echo "<tr>";
                                echo "<td>".$obj->idusuario."</td>";
                                echo "<td>".$obj->nombre."</td>";
                                echo "<td>".$obj->apellidos."</td>";
                                echo "<td>".$obj->correo."</td>";
                                echo "<td>
                                                 <a href='../delete_update/deleteuser.php?id=$obj->idusuario'>
                                                 <img src='../iconos/borraruser.png' width='10%';/>
                                               </a></td>";
                                echo "</tr>";
                            }
                            $result->close();
                            unset($obj);
                            unset($connection);
                        }

                        $nick=$_SESSION['nick'];
                        include("../conexion/conexion.php");
                        $sql= "SELECT * FROM usuarios WHERE nick='$nick'";
                        if ($result = $connection->query($sql)){
                            $obj = $result->fetch_object();
                            $user=$obj->idusuario; 
                        }


                        include("../conexion/conexion.php");
                        if ($result = $connection->query("SELECT * FROM suscripcion JOIN categoria ON suscripcion.idcategoria=categoria.idcategoria where idusuario='$user';")) {
                            echo'<div>';
                            echo"<table style='border:1px solid black'>";
                            echo"<h3>Suscripciones de $nick</h3>";
                            echo"<thead>";
                            echo"<tr>";
                            echo"<th>Categoria</th>";
                            echo "<th></th>";
                            echo"</thead>";
                            while($obj = $result->fetch_object()) {
                                echo "<tr>";
                                echo "<td><a href='../categoria/categoriadeterminada.php?id=$obj->idcategoria'>.$obj->nombre.</a></td>";
                                echo "<td>
                                                 <a href='../delete_update/deletesub.php?idcategoria=$obj->idcategoria'>
                                                 <img src='../iconos/cancelarsub.png' width='90%';/>
                                               </a></td>";
                                echo "</tr>";

                            }
                            $result->close();
                            unset($obj);
                            unset($connection);
                        }
                        echo"</table>";
                        echo"</div>";
                        ?>
                        
                    
                        <br>
                        <br>
                        <a href="../delete_update/updatepass.php"><input type="button" value="Cambiar la contraseña"/></a>
                    </div><!-- /col-lg-8 -->
                </div><!-- /row -->
            </div> <!-- /container -->
        </div><!-- /ww -->


        <!-- +++++ Projects Section +++++ -->

        <div class="container pt">

        </div><!-- /container -->


        <!-- +++++ Footer Section +++++ -->

        <?php
        include("../actualizaciones/dashboard.php")
        ?>
        
        <?php
        include("../pie.php")
        ?>


        <!-- Bootstrap core JavaScript
================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../assets/js/bootstrap.min.js"></script>
    </body>
</html>
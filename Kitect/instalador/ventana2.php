<!DOCTYPE html>
<html lang="en">
<?php
    ob_start();
?>
<?php
    session_start();
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
            <?php if (!isset($_POST["bdname"])) : ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 centered">
                        <h3>Segunda ventana</h3>
                        <p class="help-block text-danger"></p>
                        <form method="post" action="ventana2.php">
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Nombre de la base de datos</label>
                                    <input type="text" class="form-control" name="bdname" placeholder="Nombre de la base de datos " id="bdname">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>IP de la base de datos</label>
                                    <input type="text" class="form-control" name="ipbd" placeholder="IP de la base de datos " id="ipbd">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Nombre del usuario de la base de datos</label>
                                    <input type="text" class="form-control" name="bdusername" placeholder="Nombre del usuario de la base de datos " id="bdusername">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Contraseña de la base de datos</label>
                                    <input type="text" class="form-control" name="bdpass" placeholder="Contraseña de la base de datos " id="bdpass">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <button type="submit">Siguiente</button>
                            </div>
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
        
        $bdname=$_POST["bdname"];
        $ip=$_POST["ipbd"];
        $username=$_POST["bdusername"];
        $bdpass=$_POST["bdpass"];
        
        $a = '<?php $connection = new mysqli("'.$ip.'", "'.$username.'", "'.$bdpass.'", "'.$bdname.'");';

        $file=fopen("../conexion/conexion.php","w");
        fwrite($file,$a);
        fclose($file);

        $connection = new mysqli("$ip","$username","$bdpass");
        $sql= "create database $bdname;";
        $result = $connection->query($sql);
            if (!$result) {
                echo "Query Error";
                var_dump($sql);
            }

        header("Refresh:0; url=ventana3.php");

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

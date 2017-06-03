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
            <?php if (!isset($_POST["bdname"])) : ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 centered">
                        <h3>Tercera ventana</h3>
                        <p class="help-block text-danger"></p>
                        <?php
                        
                        $sql1="CREATE TABLE `categoria` (
                        `idcategoria` int(11) NOT NULL,
                        `nombre` varchar(100) NOT NULL
                        );";
                        
                        $result = $connection->query($sql1);
                          if (!$result) {
                             echo "Query Error";
                           var_dump($sql1);
                        }
                        
                        $sql2="CREATE TABLE `comentario` (
                        `idcomentario` int(11) NOT NULL,
                        `contenido` varchar(500) DEFAULT NULL,
                        `fecha` date NOT NULL,
                        `usuario` varchar(100) NOT NULL,
                        `idnoticia` int(11) NOT NULL
                        );";
                        
                        $result = $connection->query($sql2);
                          if (!$result) {
                             echo "Query Error";
                           var_dump($sql2);
                        }
                        
                        $sql3="CREATE TABLE `noticias` (
                        `idnoticia` int(11) NOT NULL,
                        `titulo` varchar(100) NOT NULL,
                        `cuerpo` varchar(20000) NOT NULL,
                        `imagen` varchar(500) NOT NULL,
                        `fecha_de_creacion` date NOT NULL,
                        `fecha_modificacion` date DEFAULT NULL,
                        `idusuario` int(11) NOT NULL,
                        `idcategoria` int(11) NOT NULL
                        );";
                        
                        $result = $connection->query($sql3);
                          if (!$result) {
                             echo "Query Error";
                           var_dump($sql3);
                        }
                        
                        $sql4="CREATE TABLE `suscripcion` (
                        `idusuario` int(11) NOT NULL,
                        `idcategoria` int(11) NOT NULL
                        );";
                        
                        $result = $connection->query($sql4);
                          if (!$result) {
                             echo "Query Error";
                           var_dump($sql4);
                        }
                        
                        $sql5="CREATE TABLE `usuarios` (
                        `idusuario` int(11) NOT NULL,
                        `nick` varchar(50) NOT NULL,
                        `nombre` varchar(100) NOT NULL,
                        `apellidos` varchar(100) NOT NULL,
                        `fecha_reg` date NOT NULL,
                        `correo` varchar(100) NOT NULL,
                        `password` varchar(100) NOT NULL,
                        `tipo` varchar(100) NOT NULL,
                        `tema` varchar(255) DEFAULT 'main'
                        );";
                        
                        $result = $connection->query($sql5);
                          if (!$result) {
                             echo "Query Error";
                           var_dump($sql5);
                        }
                        
                        $sql6="ALTER TABLE `categoria`
                        ADD PRIMARY KEY (`idcategoria`);";
                        
                        $result = $connection->query($sql6);
                          if (!$result) {
                             echo "Query Error";
                           var_dump($sql6);
                        }
                        
                        $sql7="ALTER TABLE `comentario`
                        ADD PRIMARY KEY (`idcomentario`),
                        ADD KEY `fkidnoticia` (`idnoticia`);";
                        
                        $result = $connection->query($sql7);
                          if (!$result) {
                             echo "Query Error";
                           var_dump($sql7);
                        }
                        
                        $sql8="ALTER TABLE `noticias`
                        ADD PRIMARY KEY (`idnoticia`),
                        ADD KEY `fkidusuario` (`idusuario`),
                        ADD KEY `noticias_ibfk_2` (`idcategoria`);";
                        
                        $result = $connection->query($sql8);
                          if (!$result) {
                             echo "Query Error";
                           var_dump($sql8);
                        }
                        
                        $sql9="ALTER TABLE `suscripcion`
                        ADD PRIMARY KEY (`idusuario`,`idcategoria`),
                        ADD KEY `idcategoria` (`idcategoria`);";
                        
                        $result = $connection->query($sql9);
                          if (!$result) {
                             echo "Query Error";
                           var_dump($sql9);
                        }
                        
                        $sql10="ALTER TABLE `usuarios`
                        ADD PRIMARY KEY (`idusuario`);";
                        
                        $result = $connection->query($sql10);
                          if (!$result) {
                             echo "Query Error";
                           var_dump($sql10);
                        }
                        
                        $sql11="ALTER TABLE `categoria`
                        MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;";
                        
                        $result = $connection->query($sql11);
                          if (!$result) {
                             echo "Query Error";
                           var_dump($sql11);
                        }
                        
                        $sql12="ALTER TABLE `comentario`
                        MODIFY `idcomentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;";
                        
                        $result = $connection->query($sql12);
                          if (!$result) {
                             echo "Query Error";
                           var_dump($sql12);
                        }
                        
                        $sql13="ALTER TABLE `noticias`
                        MODIFY `idnoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;";
                        
                        $result = $connection->query($sql13);
                          if (!$result) {
                             echo "Query Error";
                           var_dump($sql13);
                        }
                        
                        $sql14="ALTER TABLE `usuarios`
                        MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;";
                        
                        $result = $connection->query($sql14);
                          if (!$result) {
                             echo "Query Error";
                           var_dump($sql14);
                        }
                        
                        $sql15="ALTER TABLE `comentario`
                        ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`idnoticia`) REFERENCES `noticias` (`idnoticia`) ON DELETE CASCADE ON UPDATE CASCADE;";
                        
                        $result = $connection->query($sql16);
                          if (!$result) {
                             echo "Query Error";
                           var_dump($sql16);
                        }
                        
                        $sql16="ALTER TABLE `noticias`
                        ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE,
                        ADD CONSTRAINT `noticias_ibfk_2` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE CASCADE ON UPDATE CASCADE;";
                        
                        $result = $connection->query($sql16);
                          if (!$result) {
                             echo "Query Error";
                           var_dump($sql16);
                        }
                        
                        $sql17="ALTER TABLE `suscripcion`
                        ADD CONSTRAINT `suscripcion_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE,
                        ADD CONSTRAINT `suscripcion_ibfk_2` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE CASCADE ON UPDATE CASCADE;";
                        
                        $result = $connection->query($sql17);
                          if (!$result) {
                             echo "Query Error";
                           var_dump($sql17);
                        }else
                        
                        {
                          header("Refresh:0; url=ventana4.php");
                        }

                        
                        ?>
                        <div class="form-group col-xs-12">
                                <button type="submit">Siguiente</button>
                        </div>
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

        $file=fopen("../conexion/conexionbd.php","w");
        fwrite($file,$a);
        fclose($file);

        $connection = new mysqli("$ip","$username","$pass");
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

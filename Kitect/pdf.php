<?php
    session_start();
    ?>
<?php

    $var=$_GET['idnoticia'];
    
    include ("conexion/conexion.php");
    require("fpdf/fpdf.php");
    $pdf=new FPDF();
    //var_dump(get_class_methods($pdf));
    $pdf->AddPage();
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(20,5,"Titulo",1,0,'C');
    $pdf->Cell(32,5,"Fecha",1,0,'C');
    $pdf->Cell(20,5,"Cuerpo",1,0,'C');
    $pdf->ln();
    
    if ($result = $connection->query("SELECT * FROM notcias  where idnoticia='$var';")) {
        while($obj = $result->fetch_object()) {
            $pdf->Cell(20,5,$obj->titulo,1,0,'C');
            $pdf->Cell(32,5,$obj->fecha_de_creacion,1,0,'C');
            $pdf->Cell(20,5,$obj->cuerpo,1,0,'C');
            $pdf->ln();
            }  
            }
    $pdf->Output();
?>
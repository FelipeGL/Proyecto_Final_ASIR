<?php
    
    require ("conexion/conexion.php");
    include("fpdf/fpdf.php");
   function Footer()
{
$this->SetY(-10);
$this->SetFont('Arial','I',8);
$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

    $pdf=new FPDF();
    //var_dump(get_class_methods($pdf));
    $pdf->AddPage();
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(30,5,"Nick",1,0,'C');
    $pdf->Cell(30,5,"Nombre",1,0,'C');
    $pdf->Cell(30,5,"Apellidos",1,0,'C');
    $pdf->Cell(30,5,"Fecha registro",1,0,'C');
    $pdf->Cell(40,5,"Correo",1,0,'C');
    $pdf->ln();
    
    if ($result = $connection->query("SELECT * FROM usuarios;")) {
        while($obj = $result->fetch_object()) {
            $pdf->Cell(30,5,$obj->nick,1,0,'C');
            $pdf->Cell(30,5,$obj->nombre,1,0,'C');
            $pdf->Cell(30,5,$obj->apellidos,1,0,'C');
            $pdf->Cell(30,5,$obj->fecha_reg,1,0,'C');
            $pdf->Cell(40,5,$obj->correo,1,0,'C');
            $pdf->ln();
            }  
            }
$pdf->output();
 ?>
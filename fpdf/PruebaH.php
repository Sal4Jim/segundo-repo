<?php
require('./fpdf.php');
include '../php/conexion.php';

class PDF extends FPDF
{
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        // Usar mb_convert_encoding en lugar de utf8_decode
        $this->Cell(0, 10, mb_convert_encoding('Página ', 'ISO-8859-1', 'UTF-8') . $this->PageNo() . '/{nb}', 0, 0, 'C');
        
        $hoy = date('d/m/Y');
        $this->Cell(0, 10, mb_convert_encoding($hoy, 'ISO-8859-1', 'UTF-8'), 0, 0, 'R');
    }
}

$pdf = new PDF();
$pdf->AddPage("landscape");
$pdf->AliasNbPages();

$consulta = "SELECT * FROM usuarios";
$resultado = mysqli_query($conexion, $consulta);

$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163);

$i = 1;
while($row = mysqli_fetch_array($resultado)) {
    $pdf->Cell(30, 10, $i, 1, 0, 'C', 0);
    $pdf->Cell(40, 10, mb_convert_encoding($row['nombre_completo'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', 0);
    $pdf->Cell(40, 10, mb_convert_encoding($row['usuario'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', 0);
    $pdf->Cell(40, 10, mb_convert_encoding($row['correo'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', 0);
    $pdf->Cell(85, 10, mb_convert_encoding("                    ", 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', 0);
    $pdf->Cell(40, 10, mb_convert_encoding("Activo", 'ISO-8859-1', 'UTF-8'), 1, 1, 'C', 0);
    $i++;
}

$pdf->Output('Reporte_Usuarios.pdf', 'I');
mysqli_close($conexion);
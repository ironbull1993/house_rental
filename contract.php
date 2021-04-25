<?php

include 'db_connect.php'; 
require('fpdf.php');
//$query=mysqli_query($conn,"select amount from payments where	tenant_id = '".$_GET['id']."'");
$query =mysqli_query($conn,"SELECT * FROM tenants inner join payments on  tenants.id=payments.tenant_id  where tenants.id = '".$_GET['id']."'");
$invoice=mysqli_fetch_array($query);



$pdf = new FPDF('P','mm','A4');
$pdf ->AddPage();
$pdf->SetFont('Arial','B',16);



$pdf->Cell(40,10,'                                                                                           Contract Term','','1','C');
$pdf->Cell('',10,'Your name: '.$invoice['firstname'].' '.$invoice['firstname'].' have paidjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjJJJJJJJJJJJJJJJJJJJJJJJJJ','','','L');

//$pdf->Cell(40	,10,$invoice['amount'],0,1);
ob_start();
$pdf->Output();





















?>

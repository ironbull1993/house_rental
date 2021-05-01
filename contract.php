<?php

include 'db_connect.php'; 
require('fpdf.php');
//$query=mysqli_query($conn,"select amount from payments where	tenant_id = '".$_GET['id']."'");
$query =mysqli_query($conn,"SELECT * FROM tenants inner join payments on  tenants.id=payments.tenant_id  where tenants.id = '".$_GET['id']."'");
$query1 =mysqli_query($conn,"SELECT * FROM houses inner join tenants on  houses.id=tenants.house_id  where tenants.id = '".$_GET['id']."'");
$invoice=mysqli_fetch_array($query);
$invoice1=mysqli_fetch_array($query1);
$duration=$invoice['amount']/$invoice1['price'];
$query2=$conn->query("SELECT * FROM system_settings");
$phoner=mysqli_fetch_array($query2);
$phone_sender=$phoner['contact'];
$emailer=$phoner['email'];

$pdf = new FPDF('P','mm','A4');
$pdf ->AddPage();

$pdf->SetFont('Arial','B',16);

$pdf->Cell(40,10,'','','','C');
$pdf->SetFont('Arial','BU',16);
$pdf->Cell(40,10,'Contract Term','','','C');
$pdf->SetFont('Arial','B',16);    
$pdf->Cell(40,10,'','','1','C');
$pdf->SetFont('Arial','',16);
$pdf->Cell('',10,'Your name: '.$invoice['firstname'].' '.$invoice['lastname'].' have paid '.$invoice['amount'].'  for  '.$duration.'  months.','','1','L');
$pdf->Cell('',10,'Starting from  '.$invoice['date_created'].' after the term ends you are required to ','','1','L');
$pdf->Cell('',10,'pay again.','','1','L');
$pdf->Cell('',10,'Take care of the funitures in the house.','','1','L');
$pdf->Cell('',10,'Contact '.$phone_sender.' or email me via '.$emailer.' for more info.','','1','L');
$pdf->Cell('',10,'Parking is at your own risk.','','1','L');

//$pdf->Cell(40	,10,$invoice['amount'],0,1);
ob_start();
$pdf->Output();





















?>

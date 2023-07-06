<?Php

$db_host = 'localhost'; 
$db_user = 'root';
$db_pass = ''; 
$db_name = 'aegis_test_db'; 

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$count="SELECT br.`ID`, br.`ITEM_CODE`, br.`ITEM_NAME`, ck.`FINAL_QTY` 
        FROM barang br join stock ck on br.`ITEM_CODE`=ck.`ITEM_CODE` LIMIT 0,10"; // SQL to get 10 records 
require('../../controllers/fpdf/fpdf.php');
$pdf = new FPDF(); 
$pdf->AddPage();

$width_cell=array(20,50,40,40,40);
$pdf->SetFont('Arial','B',16);

$pdf->SetFillColor(193,229,252); // Background color of header 
// Header starts /// 
$pdf->Cell($width_cell[0],10,'ID',1,0,C,true); // First header column 
$pdf->Cell($width_cell[1],10,'CODE',1,0,C,true); // Second header column
$pdf->Cell($width_cell[2],10,'NAME',1,0,C,true); // Third header column 
$pdf->Cell($width_cell[3],10,'QTY',1,1,C,true); // Fourth header column


//// header ends ///////

$pdf->SetFont('Arial','',14);
$pdf->SetFillColor(235,236,236); // Background color of header 
$fill=false; // to give alternate background fill color to rows 

/// each record is one row  ///
foreach ($conn->query($count) as $row) {
$pdf->Cell($width_cell[0],10,$row['ID'],1,0,C,$fill);
$pdf->Cell($width_cell[1],10,$row['ITEM_CODE'],1,0,L,$fill);
$pdf->Cell($width_cell[2],10,$row['ITEM_NAME'],1,0,C,$fill);
$pdf->Cell($width_cell[3],10,$row['FINAL_QTY'],1,1,C,$fill);
$fill = !$fill;
}
/// end of records /// 

$pdf->Output();

?>

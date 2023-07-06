
<link rel="stylesheet" href="../../controllers/css/style.css">
<?php

session_start();

$db_host = 'localhost'; 
$db_user = 'root';
$db_pass = ''; 
$db_name = 'aegis_test_db'; 

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Gagal terhubung MySQL: ' . mysqli_connect_error());	
}

$sql = 'SELECT br.`ID`, br.`ITEM_CODE`, br.`ITEM_NAME`, ck.`FINAL_QTY` 
		FROM barang br join stock ck on br.`ITEM_CODE`=ck.`ITEM_CODE` ';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}

echo '
<div id = "frm"> 
<table >
		<thead>
		<tr><form class="form-inline" method="post" action="generate_pdf.php">
<button type="submit" id="pdf" name="generate_pdf" class="btn btn-primary"><i class="fa fa-pdf" "="" aria-hidden="true"></i>
Generate PDF</button> </form></tr>
			<tr>
				<th>ITEM CODE</th>
				<th>ITEM NAME</th>
				<th>QTY</th>
				
			</tr>
		</thead>
		<tbody>';
		
while ($row = mysqli_fetch_array($query))
{
	echo '<tr>
			<td>'.$row['ITEM_CODE'].'</td>
			<td>'.$row['ITEM_NAME'].'</td>
			<td>'.number_format($row['FINAL_QTY'], 0, ',', '.').'</td>
			
		</tr>';
}
echo '
	</tbody>
</table>
</div>';



?>
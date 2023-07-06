
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

$sql = 'SELECT `NIK`, `NAME`, `PASSWORD`, `LEVEL` 
		FROM user ';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}

echo '
<div id = "frm"> 
<table>
		<thead>
			<tr>
				<th>NIK</th>
				<th>NAME</th>
				<th>LEVEL</th>
				
				
			</tr>
		</thead>
		<tbody>';
		
while ($row = mysqli_fetch_array($query))
{
	echo '<tr>
			<td>'.$row['NIK'].'</td>
			<td>'.$row['NAME'].'</td>
			<td>'.$row['LEVEL'].'</td>
			
			
		</tr>';
}
echo '
	</tbody>
</table>

</div>
';



?>
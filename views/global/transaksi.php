

<link rel="stylesheet" href="../../controllers/css/style.css">
<?php

session_start();
$_SESSION['NIK']; 


$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'aegis_test_db'; // Nama Database

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
<h1> Tabel Stock </h1>
<table>
		<thead>
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
</div>
';


$sql1 = 'SELECT tr.`ID`,tr.`INPUTBY`, sr.`NAME`, tr.`INPUTTIME`, tr.`ITEM_CODE`, br.`ITEM_NAME`, tr.`QTY_OUT` 
        FROM transaksi tr join barang br on tr.`ITEM_CODE`=br.`ITEM_CODE`
        join user sr on sr.`NIK`=tr.`INPUTBY` ';
        
$query1 = mysqli_query($conn, $sql1);

if (!$query1) {
    die ('SQL Error: ' . mysqli_error($conn));
}

echo '
<div id = "frm2">
<h1> Tabel Transaksi </h1>
<table>
        <thead>
            <tr>
                <th>INPUT BY</th>
                <th>INPUTTIME</th>
                <th>ITEM CODE</th>
                <th>ITEM NAME</th>
                <th>QTY OUT</th>
                
            </tr>
        </thead>
        <tbody>';
        
while ($row1 = mysqli_fetch_array($query1))
{
    echo '<tr>
            <td>'.$row1['NAME'].'</td>
            <td>'.$row1['INPUTTIME'].'</td>
            <td>'.$row1['ITEM_CODE'].'</td>
            <td>'.$row1['ITEM_NAME'].'</td>
            <td>'.number_format($row1['QTY_OUT'], 0, ',', '.').'</td>
            
        </tr>';
}
echo '
    </tbody>
</table>
</div>
';



?>
<form action="../global/prosestransaksi.php" method="POST">
    <div id = "frm1">
        <h1> Transaksi Pengurangan</h1>
        <table >
            <tr>
                <td>Pilih Barang</td>
                <td>
                    <?php
                    $selBar    =mysqli_query($conn, "SELECT * FROM barang ORDER BY ITEM_NAME");        
                    echo '<select name="ITEM_CODE" required>';    
                    echo '<option value="">--pilih--</option>';    
                    while ($rowbar = mysqli_fetch_array($selBar)) {    
                    echo '<option value="'.$rowbar['ITEM_CODE'].'">'.$rowbar['ITEM_CODE'].'_'.$rowbar['ITEM_NAME'].'</option>';    
                    }    
                    echo '</select>';
                    ?>
                </td>
            </tr>
            
            <tr>
                <td>Jumlah</td>
                <td><input type="text" name="QTY_OUT" maxlength="11" required /></td>
            </tr>
            <tr height="36">
                <td></td>
                <td><input type="submit" name="Submit" value="Submit"/> </td>
            </tr>
        </table>
    </div>
    </form>
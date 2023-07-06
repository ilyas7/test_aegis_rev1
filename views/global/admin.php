<?php
session_start();

$_SESSION['name'] = $_POST['name'];  
$_SESSION['password'] = $_POST['pass'];  
?>

<!DOCTYPE html>
<html>
<head>

	<title>Halaman Admin</title>

	<link rel="stylesheet" href="../../controllers/css/style.css">
</head>
<body>

    <div id = "frm"> 
	<table> 
<tr><td><a href="../../views/global/user.php">Managemen User</a></td></tr>
<tr><td><a href="../../views/global/product.php">Master Data Produk</a></td></tr>
<tr><td><a href="../../views/global/transaksi.php">Transaksi</a></td></tr>

</table>
</div>
</body>
</html>
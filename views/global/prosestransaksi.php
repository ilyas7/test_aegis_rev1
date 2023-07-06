<?php

session_start();
$INPUTBY = $_SESSION['NIK'];  
  

if ($_POST['Submit'] == "Submit") {
   
    $ITEM_CODE        =$_POST['ITEM_CODE'];
    $QTY_OUT        =$_POST['QTY_OUT'];
    
$db_host = 'localhost'; 
$db_user = 'root'; 
$db_pass = '';
$db_name = 'aegis_test_db'; 

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name); 

    $trans =mysqli_query($conn, "SELECT * FROM stock WHERE ITEM_CODE='$ITEM_CODE'");
    $sto    =mysqli_fetch_array($trans);
    $stok    =$sto['FINAL_QTY'];

    $sisa    =$stok-$QTY_OUT;
   
    if ($stok < $QTY_OUT) {
        ?>
        <script language="JavaScript">
            alert('Oops! Jumlah pengeluaran lebih besar dari stok ...');
            document.location='./';
        </script>
        <?php
    }
    //proses    
    else{
        $insert =mysqli_query($conn, "INSERT INTO transaksi (ID,INPUTBY , INPUTTIME, ITEM_CODE, QTY_OUT) VALUES ('$ID','$INPUTBY', NOW(), '$ITEM_CODE', '$QTY_OUT')");
            if($insert){
                
                $upstok= mysqli_query($conn, "UPDATE stock SET FINAL_QTY='$sisa', INPUTBY='$INPUTBY', INPUTTIME = now() WHERE ITEM_CODE='$ITEM_CODE'");
                ?>
                <script language="JavaScript">
                    alert('Good! Input transaksi pengeluaran barang berhasil ...');
                    document.location='../global/transaksi.php';
                </script>
                <?php
            }
            else {
                echo "<div><b>Oops!</b> 404 Error Server.</div>";
            }
    }
    }
?>
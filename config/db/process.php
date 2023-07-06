<?php   

session_start();   
    include('../../config/db/connect.php');  
    $NIK = $_POST['NIK'];  
    $password = $_POST['pass']; 
    $_SESSION['NIK'] = $NIK;
    
 
      
       
        $NIK = stripcslashes($NIK);  
        $password = stripcslashes($password);  
        $NIK = mysqli_real_escape_string($con, $NIK);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from user where NIK = '$NIK' and PASSWORD = md5('$password')";  
        $result = mysqli_query($con, $sql);
        
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        

        if($count == 1){  



        	if($row['LEVEL']=="ADMIN"){

            header("Location: ../../views/global/admin.php");}
        else {header("Location: ../../views/global/kasir.php"); }
        }  
        else{  
            echo "<h1> Login failed. Invalid nik or password.</h1>";  
        }     
?>  
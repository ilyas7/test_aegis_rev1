<?php

session_start();


?>


<!DOCTYPE HTML>
<html>
<head>
    <title>Halaman Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    
    
    <link rel="stylesheet" href="../../controllers/css/style.css">
</head>
   

<body>  

    <div id = "frm"> 
    <table> 
        <h1>Login</h1>  
        <form  action = "../../config/db/process.php" method = "POST">  
            <tr>  
                <td><label> NIK: </label>  </td>
                <td><input type = "text" id ="NIK" name  = "NIK" />  </td>
            </tr>  
            <tr>  
               <td> <label> Password: </label>  </td>
                <td> <input type = "password" id ="pass" name  = "pass" />  </td>
            </tr> 
            <tr>     
               <td> <input type =  "submit" value = "Login" /> </td>  
            </tr>  
        </form>
    </table>      
    </div>  
    
    
</body>   
</html>

<?php

    $user =$_POST['username'];
    $pass =$_POST['password'];

    require_once('homeConnect.php');
    $output = "666";
    $sql = "select username,password from users where username ='$user' and password='$pass'";
    
    $result = $con->query($sql);
    
   
        while($row = $result->fetch()){
             echo("Good");
            return;
        }

        echo trim($output,$character_mask = " \t\n\r\0\x0B");


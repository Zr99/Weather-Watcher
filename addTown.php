<?php
    require_once('homeConnect.php');
    ini_set("error_reporting",E_ALL); 
	ini_set("log_errors","1"); 
	ini_set("error_log","php_errors.txt");
    $use =$_POST['username'];
    $town = $_POST['town'];
    $id=0;

    
    if($use == "Fred"){
        $id=1;
    }
    if($use == "Jo"){
        $id=2;
    }
    if($use == "Test"){
        $id=3;
    }
    if($use == "Bill"){
        $id=4;
    }
    $output = "888";
    

    $query = "select count(*) from usercontain where uid=$id and town ='$town'";   
    $result = $con->query($query);
    $number_of_rows = $result->fetchColumn();
  
        if($number_of_rows > 0){
            echo $output;
            return;
        }
        else{
            $q2 = "insert into usercontain values($id,'$town')";
            $result2 = $con->query($q2);
            echo '99';
            return;
        }
    
        echo -50;
   
?>

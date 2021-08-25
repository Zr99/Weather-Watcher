<?php
    require_once('homeConnect.php');
    $use =$_POST['username'];
    $pas =$_POST['password'];
    
    $query = "select * from weather w, users u, usercontain c where u.uid = c.uid and w.town = c.town and username ='".$use."' and password='".$pas."'";
    
    $result = $con->query($query);
    $button = "More +";
    $rowIndex = 0;

    if($result){
        echo "<table>";
        echo "<tr><th>Town</th><th>Current Temperature</th><th>Summary</th><th>Min Temperature</th><th>Max Temperature</th></tr>";

	    while($row = $result->fetch()){
            echo "<td>".$row['town']."</td>";
            echo "<td>".$row['currTemp']."</td>";
            echo "<td>".$row['summary']."</td>";
            echo "<td>".$row['min_temp']."</td>";
            echo "<td>".$row['max_temp']."</td>";
           
                       
            echo "</tr>";
            $rowIndex++;
        }

		   
        echo "</table>";
    }
    else{
        echo "Error updating record because : " . $result->error;
    }
        
   
?>
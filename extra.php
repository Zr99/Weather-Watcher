<?php
    require_once('homeConnect.php');

    $use =$_POST['username'];

    $query = "select * from weather w, users u, usercontain c where u.uid = c.uid and w.town = c.town and username ='".$use."'";

    $result = $con->query($query);

    if($result){
        echo "<table>";
        echo "<tr><th>Outlook</th><th>Tomorrow</th></tr>";

	    while($row = $result->fetch()){
            echo "<td>".$row['outlook']."</td>";
            echo "<td>".$row['tomorrow']."</td>";
		    echo "</tr>";
        }
        echo "</table>";
    }
    else{
        echo "Error updating record because : " . $result->error;
    }
?>
<?php
 
include 'DBConfig.php';
 
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName); 
 $json = file_get_contents('php://input'); 
 $obj = json_decode($json,true);

 $S_ID = $obj['student_id']; 
 $Sql_Query = "DELETE FROM StudentDetailsTable WHERE student_id = '$S_ID'" ;
 
 
 if(mysqli_query($con,$Sql_Query)){ 
	$MSG = 'Record Deleted Successfully.' ; 
	$json = json_encode($MSG); 
 	echo $json ; 
 } else{
 	echo 'Try Again'; 
 }
 
 mysqli_close($con);
?>
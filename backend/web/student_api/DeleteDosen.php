<?php
 
include 'DBConfig.php';
 
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName); 
 $json = file_get_contents('php://input'); 
 $obj = json_decode($json,true);

 $id_dosen = $obj['id_dosen']; 
 $Sql_Query = "DELETE FROM dosen WHERE id_dosen = '$id_dosen'" ;
 
 
 if(mysqli_query($con,$Sql_Query)){ 
	$MSG = 'Record Deleted Successfully.' ; 
	$json = json_encode($MSG); 
 	echo $json ; 
 } else{
 	echo 'Try Again'; 
 }
 
 mysqli_close($con);
?>
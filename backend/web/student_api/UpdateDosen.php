<?php
 
// Importing DBConfig.php file.
include 'DBConfig.php';
 
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);  
 $json = file_get_contents('php://input'); 
 $obj = json_decode($json,true);
 
 $id_dosen = $obj['id_dosen']; 
 $nama_dosen = $obj['nama_dosen']; 
 $bidang = $obj['bidang']; 
 $homebase = $obj['homebase']; 
 
 // Creating SQL query and insert the record into MySQL database table.
 $Sql_Query = "update rn_latihan.dosen set   				
  				nama_dosen = '$nama_dosen',
  				bidang = '$bidang',
  				homebase = '$homebase'
			   where id_dosen = '$id_dosen'; ";
 
 if(mysqli_query($con,$Sql_Query)){ 
	$MSG = 'Record Successfully Inserted Into MySQL Database.' ; 
	$json = json_encode($MSG); 
 	echo $json ; 
 } else{ 
 	echo 'Try Again'; 
 }
 
 mysqli_close($con);
?>
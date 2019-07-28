<?php
 
 include 'DBConfig.php'; 
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName); 
 $json = file_get_contents('php://input'); 
 $obj = json_decode($json,true); 

 $nama_dosen = $obj['nama_dosen']; 
 $bidang = $obj['bidang']; 
 $homebase = $obj['homebase']; 
 
 // Creating SQL query and insert the record into MySQL database table.
 $Sql_Query = "insert into rn_latihan.dosen (nama_dosen,bidang,homebase)
				values ('$nama_dosen','$bidang','$homebase');";
  
 if(mysqli_query($con,$Sql_Query)){ 
	$MSG = 'Record Successfully Inserted Into MySQL Database.' ;
	$json = json_encode($MSG); 
 	echo $json ; 
 }else{ 
 	echo 'Try Again'; 
 }
 mysqli_close($con);
?>
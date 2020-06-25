<?php  
    $conn=mysqli_connect("localhost","root","","web_mvcphu");
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	mysqli_query($conn,"SET NAMES 'UTF8'");
?>
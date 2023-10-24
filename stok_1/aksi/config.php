<?php
	 require "mysql_mysqli.inc.php";
	$conn = mysqli_connect('localhost', 'barcodeb_basarta_data', 'basarta_dat12345', 'barcodeb_basarta_data');
	
	if(!$conn){
		die(mysqli_error($conn));
	}
?>
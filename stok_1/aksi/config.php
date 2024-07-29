<?php
	 require "mysql_mysqli.inc.php";
	$conn = mysqli_connect('localhost', 'root', '', 'modul');
	
	if(!$conn){
		die(mysqli_error($conn));
	}
?>
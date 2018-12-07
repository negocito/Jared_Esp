<?php 
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$database = "bd_libros";
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $database);
	if (! $conn)
	{
		die("no se puede conectar:" + mysqli_error());
	}

 ?>
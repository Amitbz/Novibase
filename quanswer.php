<?php
	header("Access-Control-Allow-Origin: http://130.206.123.31:8080");
	header("Access-Control-Allow-Method: POST");
	
	$ml = $_POST['Idml'];
	$a1 = $_POST['a1'];
	$a2 = $_POST['a2'];
	$a3 = $_POST['a3'];
	$a4 = $_POST['a4'];
	$usradmin = "noviqr_Amit";
	$pssadmin = "a1s2d3f4s4xn2r";
	$dmn = "localhost";
	// Establishing Connection with Server by passing server_name, user_id and password as a parameter
	$conn = mysql_connect($dmn, $usradmin, $pssadmin);

	//select a database to work with
	$selected = mysql_select_db("noviqr_Users",$conn);

	//execute the SQL query and return records
	$rslt = mysql_query("SELECT * FROM Users WHERE email='$ml'");
	$arr = mysql_fetch_array($rslt);
	
	if(isset($arr{'email'})) {
		$b1 = mysql_query("INSERT INTO Reports (ID, A1, A2, A3, A4) VALUES ('$ml', '$a1', '$a2', '$a3', '$a4')");
		$b2 = mysql_query("UPDATE Users SET qse='1' WHERE email='$ml'");
		echo "One or more unsuccessful queries";
	}
	else {echo "Couldn't find the user";}
	mysql_close($conn);
?>
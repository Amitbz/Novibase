<?php
	if (session_id()){session_destroy();}
	session_start();
	$usradmin = "noviqr_Amit";
	$pssadmin = "a1s2d3f4s4xn2r";
	$dmn = "localhost";
	
	$usr = $_POST['Username'];
	$pss = $_POST['Password'];
	
	// Establishing Connection with Server by passing server_name, user_id and password as a parameter
	$conn = mysql_connect($dmn, $usradmin, $pssadmin);
	
	//select a database to work with
	$selected = mysql_select_db("noviqr_Users",$conn);
	
	$rslt = mysql_query("SELECT * FROM Users WHERE username='$usr' AND password='$pss'");
	$arr = mysql_fetch_array($rslt);
	
	if(isset($arr{'email'})){
		$_SESSION['username'] = $arr{'username'};
		$_SESSION['password'] = $arr{'password'};
		$_SESSION['email'] = $arr{'email'};
		$_SESSION['qse'] = $arr{'qse'};
		$_SESSION['report'] = $arr{'report'};
		$_SESSION['fiwareUser'] = $arr{'fiwareUser'};
		header("location: http://www.noviqr.eu/user-space.php");
	}
	else {
		header("location: http://www.noviqr.eu/login.php?state=wup");
	
	}
	mysql_close($conn);
?>
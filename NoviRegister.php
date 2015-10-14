<?php
if (session_id()){session_destroy();}
session_start();
$usr = $_POST['Username'];
$email = $_POST['Email'];
$pss1 = $_POST['Password1'];
$pss2 = $_POST['Password2'];
$usradmin = "noviqr_Amit";
$pssadmin = "a1s2d3f4s4xn2r";
$dmn = "localhost";

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$conn = mysql_connect($dmn, $usradmin, $pssadmin);

//select a database to work with
$selected = mysql_select_db("noviqr_Users",$conn);

//execute the SQL query and return records
$usrresult = mysql_query("SELECT * FROM Users WHERE username='$usr'");
$emailresult = mysql_query("SELECT * FROM Users WHERE email='$email'");

$arr = mysql_fetch_array($emailresult);

//A Fiware user with the same email is registered
if ($arr) {
    if ($arr{'fiwareUser'}=="1") {
   	 if ($pss1 == $pss2) {
  	  	$sql = "UPDATE Users SET username='$usr', password='$pss1' WHERE email='$email'";
  	  	mysql_query($sql);
  	  	setNewSession($usr, $pss1, $email, $arr{'qse'}, $arr{'report'}, 1);
  	  	header("location: http://www.noviqr.eu/user-space.php");
   	 }
    }
    //Username already exists (Non Fiware)
    else {
        header("location: /login.php?state=uae");
    }
}
//New user registering
else {
    if ($pss1 == $pss2) {
    	$sql = "INSERT INTO Users (username, password, email, qse, report, fiwareUser) VALUES ('$usr', '$pss1','$email', '0', '0', '0')";
    	mysql_query($sql);
    	setNewSession($usr, $pss1, $email, 0, 0, 0);
        header("location: http://www.noviqr.eu/user-space.php");
    }
    else {
   	header("location: http://www.noviqr.eu/register.html");
    }
}

mysql_close($conn); // Closing Connection

function setNewSession($un, $ps, $ml, $qs, $rp, $fi) {
    $_SESSION['username'] = $un;
    $_SESSION['password'] = $ps;
    $_SESSION['email'] = $ml;
    $_SESSION['qse'] = $qs;
    $_SESSION['report'] = $rp;
    $_SESSION['fiwareUser'] = $fi;
}
?>
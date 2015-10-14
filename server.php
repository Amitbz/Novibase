<?php
    if (session_id()){session_destroy();}
    session_start();
    $at = $_GET['access_token'];
    $JSON =  file_get_contents("http://account.lab.fiware.org/user?access_token={$at}");
    $usrdata = json_decode($JSON);
    $email = $usrdata->{'email'};
    $id = $usrdata->{'id'};
    $usradmin = "noviqr_Amit";
    $pssadmin = "a1s2d3f4s4xn2r";
    $dmn = "localhost";

    // Establishing Connection with Server by passing server_name, user_id and password as a parameter
    $conn = mysql_connect($dmn, $usradmin, $pssadmin);
    
    //select a database to work with
    $selected = mysql_select_db("noviqr_Users",$conn) 
      or die("Could not select examples");
    
    //execute the SQL query and return records
    $result = mysql_query("SELECT * FROM Users WHERE email='$email'");

    //fetch tha data from the database
    $row = mysql_fetch_array($result);

    //The Fiware user already has an entry in the website
    if (!empty($row)) { 
    	//The regular user also uses the email in a fiware account
        if ($row{'email'}==$email && $row{'fiwareUser'}=='0') {
            mysql_query("UPDATE Users SET fiwareUser='1' WHERE email='$email'");
        }
        //No further information to be set
        setNewSession($row{'username'}, $row{'email'}, $row{'qse'}, $row{'report'}, 1);
        if(isset($row{'password'})){$_SESSION['password'] = $row{'password'};}
    }
    else {
    	// Fi ware user, First time on the site
        $sql = "INSERT INTO Users (username, email, qse, report, fiwareUser) VALUES ('$id', '$email', 0, 0, 1)";
        mysql_query($sql);
        setNewSession($id, $email, 0, 0, 1);
    }

    mysql_close($conn); // Closing Connection


    function setNewSession($un, $ml, $qs, $rp, $fi) {
    $_SESSION['username'] = $un;
    $_SESSION['email'] = $ml;
    $_SESSION['qse'] = $qs;
    $_SESSION['report'] = $rp;
    $_SESSION['fiwareUser'] = $fi;
    }
    
?>
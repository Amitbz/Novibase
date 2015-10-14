<?php
    try {
    	session_unset();
    }
    catch(Exception $e) {
    	echo 'Error: '.$e;
    }
    header("location: /login.php");
?>
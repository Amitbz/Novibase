<?php
    session_start();
    if(!isset($_SESSION['email'])){header("location: http://www.noviqr.eu/login.php");}
    $eml = $_SESSION['email'];
    $at = $_GET['access_token'];
    if($at) {
    	include("server.php");
    }
    $handle = fopen("personareport-content/".$eml.".txt", "r");
    if($handle) {
            $usradmin = "noviqr_Amit";
            $pssadmin = "a1s2d3f4s4xn2r";
            $dmn = "localhost";
            // Establishing Connection with Server by passing server_name, user_id and password as a parameter
            $conn = mysql_connect($dmn, $usradmin, $pssadmin);
            //select a database to work with
            $selected = mysql_select_db("noviqr_Users",$conn) or die("Could not select examples");

            mysql_query("UPDATE Users SET report='1' WHERE email='$eml'");
            mysql_close($conn);
            fclose($handle);
    }
?>

<html lang="en" hola_ext_inject="disabled">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>NoviQr Report</title>
    <!-- Bootstrap core CSS -->
    <link href="http://www.noviqr.com/report/css/bootstrap.css" rel="stylesheet">
    <!-- Load Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic"
        rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="http://www.noviqr.com/report/css/bootstrap-theme.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
    <style type="text/css"></style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="http://www.noviqr.eu/css/overriding.css" />
    <link rel="stylesheet" type="text/css" href="http://www.noviqr.com/report/css/printStyling.css" />
    <link rel="stylesheet" id="coToolbarStyle" href="chrome-extension://cjabmdjcfcfdmffimndhafhblfmpjdpe/toolbar/styles/placeholder.css"
        type="text/css">
    <script type="text/javascript" id="cosymantecbfw_removeToolbar">        (function () { var toolbarElement = {}, parent = {}, interval = 0, retryCount = 0, isRemoved = false; if (window.location.protocol === 'file:') { interval = window.setInterval(function () { toolbarElement = document.getElementById('coFrameDiv'); if (toolbarElement) { parent = toolbarElement.parentNode; if (parent) { parent.removeChild(toolbarElement); isRemoved = true; if (document.body && document.body.style) { document.body.style.setProperty('margin-top', '0px', 'important'); } } } retryCount += 1; if (retryCount > 10 || isRemoved) { window.clearInterval(interval); } }, 10); } })();</script>
</head>
<body style="overflow-x: hidden;">
    <!-- Navbar -->
    <div class="container">
        <div class="row">
            <nav class="navbar">
                <div style="height: 80px">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                            aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                                class="icon-bar"></span><span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="htt://www.noviqr.eu/">
                            <img src="http://www.noviqr.com/report/img/noviQr-logo.png"></a>
                    </div>
                    <div id="navbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="http://www.noviqr.eu/logout.php">Logout</a></li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </nav>
        </div>
    </div>
    <div class="row" style="background-size: 100% 130px; background: url('/img/novislide.png') no-repeat center;">
        <div class="container" style="height: 130px">
            <div class="row" style="margin-top: 3%;">
                <div class="col-md-4 text-primary col-md-offset-4">
                    <p class="text-center" style="font-weight: 700; font-family: @Adobe Gothic Std B;
                        font-size: 300%; color: RGB(165,208,40)">
                        My Dashboard</p>
                </div>
            </div>
        </div>
    </div>
     <div class="row" style="min-height: 44%;">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="padding: 35px 0px;">
                    <div class="row">
                        <p class="text-center col-md-8 col-md-offset-2" style="font-size: medium;">
                            Hi! Welcome to your dashboard!<br />
                            Here you can access all the different portals of your account and start taking action
                            about your condition.</p>
                    <div class="row" style="padding-top: 100px;">
                        <div class="col-md-4 col-md-offset-2">
                            <div class="novibutton"><a href="http://www.noviqr.eu/report.php?id=<?php echo $_SESSION['email']; ?>">
                                <img alt="" src="/img/my_report_icon.png" style="height: 70%; width: 12%; border-right: 1px solid Gray; padding: 0px 8px;" /><label class="lead" style="font-size: 1.95em; position: relative; font-weight: 600; top: 15%;line-height: 1.25em ;">&nbsp;My Initial Report</label></a></div>
                            <div class="novibutton"><a href="http://130.206.123.31:8080/web-tester/pages/questionnaire/main/questionnaire.html?userId=1&userToken=token1&userCode=User1&telecareProgramCode=DB&questionnaireId=4">
                                <img alt="" src="/img/my_medical_info_icon.png" style="height: 70%; width: 12%; border-right: 1px solid Gray; padding: 0px 8px;" /><label class="lead" style="font-size: 1.95em; position: relative; font-weight: 600; top: 15%;line-height: 1.25em ;">&nbsp;My Medical Information</label></a>
                            </div>
                            <div class="novibutton" onclick="alert('Coming soon...');">
                                <img alt="" src="/img/complimentry_services.png" style="height: 70%; width: 12%; border-right: 1px solid Gray; padding: 0px 8px;" /><label class="lead" style="font-size: 1.95em; position: relative; font-weight: 600; top: 15%;line-height: 1.25em ;">&nbsp;Complementary Services</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="novibutton" onclick="alert('Coming soon...');">
                                <img alt="" src="/img/My_practitioners_icon.png" style="height: 70%; width: 12%; border-right: 1px solid Gray; padding: 0px 8px;" /><label class="lead" style="font-size: 1.95em; position: relative; font-weight: 600; top: 15%;line-height: 1.25em ;">&nbsp;My Practitioners</label>
                            </div>
                            <div class="novibutton" onclick="alert('Coming soon...');">
                                <img alt="" src="/img/My_future_appointments_icon.png" style="height: 70%; width: 12%; border-right: 1px solid Gray; padding: 0px 8px;" /><label class="lead" style="font-size: 1.95em; position: relative; font-weight: 600; top: 15%;line-height: 1.25em ;">&nbsp;My Future Appointments</label>
                            </div>
                            <div class="novibutton" onclick="alert('Coming soon...');">
                                <img alt="" src="/img/consultation_history.png" style="height: 70%; width: 12%; border-right: 1px solid Gray; padding: 0px 8px;" /><label class="lead" style="font-size: 1.95em; position: relative; font-weight: 600; top: 15%;line-height: 1.25em ;">&nbsp;History of Appointments</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="padding: 15px 0; background-color: RGB(235,235,235);" id="regFooter">
        <div class="text-center col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
            <div class="row">
                <ul style="list-style-type: none;">
                    <a href="http://noviqr.eu/#about"><li>About</li></a> 
                    <a href="http://www.noviqr.eu/FAQ"><li>FAQ</li></a> 
                    <a href="http://www.noviqr.eu/"><li>Terms Of Service</li></a> 
                    <a href="http://www.noviqr.eu/"><li>Privacy Policy</li></a> 
                    <a href="http://noviqr.eu/contact-us/"><li>Contact</li></a>
                </ul>
            </div>
            <div class="row">
                <p style="font-size: small;">
                    Copyright &#169 2015 NoviQr. All right reserved.</p>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/jscript">
    
        document.ready = setup();

	function setup(){
	    var qse = <?php echo $_SESSION['qse']; ?>,
	        rprt = <?php echo $_SESSION['report']; ?>,
	        acbtn = $("#nextAction");
	    if (qse == 1) {
	    	if (rprt == 1) {
	    	    acbtn.text("Personal Report");
	    	}
	    	else {
	    	    acbtn.text("Hold tight");
                    acbtn.attr("disabled", "disabled");
	    	}
	    }
	    else {
	        acbtn.text("Fill Out Your Personal Questionnaire");
	    }
	    switch(acbtn.text()){
                case "Personal Report":
                    $("#aaction").attr("href", "/report.php?id=<?php echo $_SESSION['email']; ?>");
                    break;
                case "Fill Out Your Personal Questionnaire":
                    $("#aaction").attr("href", "http://130.206.123.31:8080/web-tester/pages/questionnaire/main/questionnaire.html?userId=1&userToken=token1&userCode=<?php echo $_SESSION['email']; ?>&telecareProgramCode=BD&questionnaireId=1");
                    break;
            }
	}
    </script>
</body>
</html>
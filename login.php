<?php
session_unset();
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
    <link href="http://www.noviqr.eu/css/bootstrap.css" rel="stylesheet">
    <!-- Load Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic"
        rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="http://www.noviqr.eu/css/bootstrap-theme.css" rel="stylesheet">
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
    <link rel="stylesheet" type="text/css" href="http://www.noviqr.eu/css/printStyling.css" />
    <link rel="stylesheet" id="coToolbarStyle" href="chrome-extension://cjabmdjcfcfdmffimndhafhblfmpjdpe/toolbar/styles/placeholder.css"
        type="text/css">
    <script type="text/javascript" id="cosymantecbfw_removeToolbar">        (function () { var toolbarElement = {}, parent = {}, interval = 0, retryCount = 0, isRemoved = false; if (window.location.protocol === 'file:') { interval = window.setInterval(function () { toolbarElement = document.getElementById('coFrameDiv'); if (toolbarElement) { parent = toolbarElement.parentNode; if (parent) { parent.removeChild(toolbarElement); isRemoved = true; if (document.body && document.body.style) { document.body.style.setProperty('margin-top', '0px', 'important'); } } } retryCount += 1; if (retryCount > 10 || isRemoved) { window.clearInterval(interval); } }, 10); } })();</script>
</head>
<body style="overflow-x: hidden; height: 100%;">
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
                        <a class="navbar-brand" href="#">
                            <img src="http://www.noviqr.eu/img/noviQr-logo.png"></a>
                    </div>
                    <!--<div id="navbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="http://noviqr.eu/">Home</a></li>
                            <li><a href="http://noviqr.eu/#services">About</a></li>
                            <li><a href="http://noviqr.eu/#about">Contact</a></li>
                        </ul>
                    </div> -->
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
                        LOGIN</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="padding: 10px 0; background-color: RGB(250,250,250); min-height: 52%;">
        <div class="container" id="regContainer">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 text-center" id="login-errors" style="display:none;">
                
            </div>
            <div class="row">
                <form method="post" onsubmit="return loginCheck()" action="NoviLogin.php">
            <div id = "nuisance" class="col-md-5 col-md-offset-1 col-sm-6  col-xs-12" style="margin-top: 20px;">
                 <div class="row">
                        <div class="col-md-2 ">
                            <label>
                                Username:</label>
                        </div>
                       <div class="col-md-3 col-sm-6 col-xs-8 col-md-offset-2">
                        <input type="text" placeholder="Username" required="required" id="Username" name="Username" autocomplete="on" autofocus="autofocus"/>
                    </div>
				</div>
                <div class="row">
                    <div class="col-md-2">
                        <label>
                            Password:</label>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-8 col-md-offset-2">
                        <input type="password" required="required" id="Password" placeholder="Password" name="Password" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-sm-3">
                        <input type="submit" value="Sign In" style="line-height: 0;padding: 0;height: 35px; width: 130px; background-color: RGB(165,208,40);
                            color: White; font-weight: 800; font-family: @Adobe Gothic Std B; font-size: 1.45em;
                            border: 2px solid RGB(183,220,69); border-radius: 1px;" />
                    </div>
                </div>
            </div>
            </form>
            <div class="col-md-6 col-sm-6 pull-right">
                    <div class="row col-md-10 pull-left">
                        <p class="lead text-center" style="font-size: medium; color: Black;">
                            You can also use your Fi-Ware account to log in:</p>
                        <p class="lead text-center">
                            <a href="https://account.lab.fiware.org/oauth2/authorize?response_type=token&client_id=4b450e3b981f4b39aaee127c2d2b902c&redirect_uri=http://www.noviqr.eu/callbackserver.php"><img id="FiwareLoginBtn" src="http://www.noviqr.eu/RegImgs/Fi-Ware-Login.png" alt="" /></a></p>
                    </div>
                </div>
			</div>
        </div>
    </div>
    <div class="row" style="bottom: 0; padding: 15px 0; background-color: RGB(235,235,235);" id="regFooter">
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
    <script type="text/javascript">
        (function () {
            
            $("#FiwareLoginBtn").on("mouseover", function () {
                $("#FiwareLoginBtn").attr("src", "http://www.noviqr.eu/RegImgs/Fi-Ware-Login-Hover.png");
            }).on("mouseout", function () {
                $("#FiwareLoginBtn").attr("src", "http://www.noviqr.eu/RegImgs/Fi-Ware-Login.png");
            })
            var sPageURL = String(window.location);
            var state = sPageURL.substring((sPageURL.indexOf("state=")+6), sPageURL.length);
            if (state) {
                if (state=="uae") {
                    $("#login-errors").html("<ul style='color:red; list-style-type: none;'><li>Username Already Exists!</li></ul>").show("fast");
                }
                if (state=="wup") {
                    $("#login-errors").html("<ul style='color:red; list-style-type: none;'><li>Wrong Username or Password</li></ul>").show("fast");
                }
            }

        })();


        
        function loginCheck() {
            return true;
        }
    </script>
</body>
</html>
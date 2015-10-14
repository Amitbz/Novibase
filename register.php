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
                        <a class="navbar-brand" href="#">
                            <img src="http://www.noviqr.eu/img/noviQr-logo.png"></a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="row" style="background-size: 100% 150px; background-image: url('/RegImgs/signup-wallpaper.jpg');
        background-repeat: no-repeat">
        <div class="container" style="height: 150px">
            <div class="row" style="margin-top: 3%;">
                <div class="col-md-4 text-primary col-md-offset-4">
                    <p class="text-center" style="font-weight: 700; font-family: @Adobe Gothic Std B;
                        font-size: 300%; color: RGB(165,208,40)">
                        SIGNUP</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="padding: 10px 0; background-color: RGB(250,250,250); min-height: 45%;">
        <div class="container" id="regContainer">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 text-center"
                    id="signup-errors" style="display: none">
                </div>
                <form method="post" onsubmit="return signupCheck()" action="http://www.noviqr.eu/NoviRegister.php">
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 col-sm-6 col-xs-12">
                            <label>
                                Username:</label>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-8 col-md-offset-2">
                            <input type="text" value="Username" required="required" id="Username" name="Username" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 col-sm-6 col-xs-12">
                            <label>
                                Email:</label>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 col-md-offset-2">
                            <input type="email" value="Email" id="Email" name="Email" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 col-sm-6 col-xs-12">
                            <label>
                                Password:</label>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 col-md-offset-2">
                            <input type="password" required="required" id="Password1" value="Password1" name="Password1" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 col-sm-6 col-xs-12">
                            <label style="white-space: nowrap">
                                Repeat Password:</label>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 col-md-offset-2">
                            <input type="password" required="required" id="Password2" value="Password2" name="Password2" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1 col-sm-6 col-xs-12 col-sm-offset-2">
                            <input type="submit" value="Submit" style="line-height: 0; padding: 0; height: 35px;
                                width: 130px; background-color: RGB(165,208,40); color: White; font-weight: 800;
                                font-family: @Adobe Gothic Std B; font-size: 1.55em; border: 2px solid RGB(183,220,69);
                                border-radius: 1px;" />
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="row" style="margin-top: 15px;">
                <div class="col-md-8 col-md-offset-2">
                    <p class="text-center lead" style="font-size: medium; font-weight: 400;">
                        Oh wait... You are a practitioner? You are more than welcome to apply to NoviQr <a href="http://noviqr.com/practicioner-registration/" target="_blank">HERE</a>!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="padding: 30px 0; background-color: RGB(235,235,235);" id="regFooter">
        <div class="text-center col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
            <div class="row">
                <ul style="list-style-type: none;">
                    <a href="http://noviqr.com/#about"><li>About</li></a> 
                    <a href="http://www.noviqr.com/FAQ"><li>FAQ</li></a> 
                    <a href="http://www.noviqr.com/"><li>Terms Of Service</li></a> 
                    <a href="http://www.noviqr.com/"><li>Privacy Policy</li></a> 
                    <a href="http://noviqr.com/contact-us/"><li>Contact</li></a>
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
        (function () {
            $("#regContainer input").focus(function () {
                if ($(this).attr("value") == $(this).attr("id"))
                    $(this).attr("value", "");

            }).focusout(function () {
                if ($(this).attr("value") == "") {
                    $(this).attr("value", $(this).attr("id"));
                }
            })
        })();

        
        function signupCheck() {
            var usr = $("#Username").val(),
                email = $("#Email").val(),
                pss = $("#Password1").val(),
                pss2 = $("#Password2").val(),
                errdiv = $("#signup-errors"),
                errors = '<ul style="color:red; list-style-type: none;">';

            if (usr == "Username" || pss == "Password" || pss2 == "Repeat-Password" || email == "Email") {
                errors += '<li>All fields are mandatory!</li>';
            }

            if (pss.length < 6 || pss.length > 16) { errors += '<li>Password must be 6-16 characters</li>'; }

            if (pss != pss2) { errors += '<li>Passwords do not match!</li>'; }
            if (errors != '<ul style="color:red; list-style-type: none;">') {
                errors += '</ul>';
                errdiv.html(errors);
                errdiv.show("fast");
                return false;
            }
            else {
                return true;
            }
        }
    </script>
</body>
</html>

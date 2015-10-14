<?php
session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['email'])) {
    header("location: /login.php");
}
?>﻿
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
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Load Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic"
        rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
    <style type="text/css"></style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="css/overriding.css" />
    <link rel="stylesheet" type="text/css" href="css/printStyling.css" />
    <link rel="stylesheet" id="coToolbarStyle" href="chrome-extension://cjabmdjcfcfdmffimndhafhblfmpjdpe/toolbar/styles/placeholder.css"
        type="text/css">
    <script type="text/javascript" id="cosymantecbfw_removeToolbar">        (function () { var toolbarElement = {}, parent = {}, interval = 0, retryCount = 0, isRemoved = false; if (window.location.protocol === 'file:') { interval = window.setInterval(function () { toolbarElement = document.getElementById('coFrameDiv'); if (toolbarElement) { parent = toolbarElement.parentNode; if (parent) { parent.removeChild(toolbarElement); isRemoved = true; if (document.body && document.body.style) { document.body.style.setProperty('margin-top', '0px', 'important'); } } } retryCount += 1; if (retryCount > 10 || isRemoved) { window.clearInterval(interval); } }, 10); } })();</script>
</head>
<script src="http://noviqr.com/report/Scripts/Chart.js"></script>
<body>
    <!--------------  cover for dimming background -------------->
    <div id="dimmer" style="height: 100%; width: 100%; z-index: 998; position: fixed;
        display: none; background-color: rgba(60,60,60, 0.5)">
    </div>
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
                            <img src="img/noviQr-logo.png"></a>
                    </div>
                    <div id="navbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="http://www.noviqr.eu/user-space.php">My Dashboard</a></li>
                            <li><a href="http://www.noviqr.eu/logout.php">Logout</a></li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </nav>
        </div>
    </div>
    <!-- Personalized Report Title -->
    <div class="row" style="margin: 0">
        <h2 style="text-align: center; background-color: #055555; line-height: 60px; color: #fff;
            font-weight: 800; margin: 0">
            YOUR PERSONALIZED REPORT</h2>
    </div>
    <!-- Report Navigation Image -->
    <div style="background: url('http://noviqr.com/report/reportBgs/nq-top.png') center top no-repeat;">
        <div id="secPic" class="row hidden-xs hidden-sm nqtop" style="background: url('http://noviqr.com/report/reportBgs/nq-top.png') center top no-repeat;
            margin: 0; height: 715px">
            <div class="container">
                <a id="sec0" href="#summary" style="text-align: center">
                    <p>
                        Report Summary +
                        <br>
                        Info on Current Treatment</p>
                    <p>
                        <img src="img/nq-icon-01.png"></p>
                </a>
                <div class="row" style="padding: 90px 60px 0;">
                    <div class="col-md-4">
                        <a id="sec1" href="#conventional" class="pull-right">
                            <p>
                                Conventional Solutions
                                <img src="img/nq-icon-02.png"></p>
                        </a>
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <a id="sec2" href="#alternative">
                            <p>
                                <img src="img/nq-icon-03.png" class="pull-left" style="margin-right: 8px">
                                Nutritional &amp; Alternative Solutions</p>
                        </a>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row" style="padding: 110px 80px 0;">
                    <div class="col-md-4">
                        <a id="sec3" href="#clinical" class="pull-right">
                            <p>
                                Clinical Trials
                                <img src="img/nq-icon-04.png"></p>
                        </a>
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <a id="sec4" href="#blog">
                            <p>
                                <img src="img/nq-icon-05.png" class="pull-left" style="margin-right: 8px">
                                Well-being &amp;<br>
                                Lifestyle</p>
                        </a>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
    </div>
    <div class="row visible-xs-block visible-sm-block nq-top-btn hidden-print" style="margin: 0">
        <a href="#summary">
            <button type="button" class="btn btn-info btn-md btn-block" style="background-color: #47aea1;
                border: none;">
                <img src="img/nq-icon-01.png">
                Report Summary +
                <br>
                Info on Current Treatment
            </button>
        </a><a href="#conventional">
            <button type="button" class="btn btn-info btn-md btn-block" style="background-color: #c5aa63;
                border: none; line-height: 50px;">
                <img src="img/nq-icon-02.png">
                Conventional Solutions
            </button>
        </a><a href="#alternative">
            <button type="button" class="btn btn-info btn-md btn-block" style="background-color: #7ac563;
                border: none;">
                <img src="img/nq-icon-03.png">
                Nutritional &amp;<br>
                Alternative Solutions
            </button>
        </a><a href="#clinical">
            <button type="button" class="btn btn-info btn-md btn-block" style="background-color: #a863c5;
                border: none; line-height: 50px;">
                <img src="img/nq-icon-04.png">
                Clinical Trials
            </button>
        </a><a href="#blog">
            <button type="button" class="btn btn-info btn-md btn-block" style="background-color: #63a3c5;
                border: none; line-height: 50px;">
                <img src="img/nq-icon-05.png">
                Well-being &amp; Lifestyle
            </button>
        </a>
    </div>
    <!-- Your Report -->
    <div id="summary" class="row" style="padding: 30px 0px 0px 0px; margin: 0; background-color: RGB(213, 238, 235)">
        <div class="container">
            <p class="lead">
                <span style="color: #63a3c5">Overview</span><br />
                & info on your <span style="color: #63a3c5">current treatment</span></p>
        </div>
        <br />
        <div class="container">
            <p class="lead">
                Your current medication:
        </div>
    </div>
    <!-- Current Treatment -->
    <div id="current" class="row" style="padding: 10px 0; margin: 0; background-color: RGB(213, 238, 235)">
        <div class="container" id="treatHolder">
        </div>
    </div>
    <!-- Conventional -->
    <div id="conventional" class="row" style="padding: 60px 0; background-color: RGB(223, 208, 170);
        margin: 0">
        <div class="container" id="convHolder">
            <div id="convPopup" style="display: none; z-index: 1000; position: absolute; top: 20;">
                <div class="container">
                    <div class="nqbox" style="background-color: rgb(240,240,240)">
                        <div class="row doctor-thumbnails-title">
                            <div class="col-md-8 col-md-offset-2 text-center">
                                <p class="lead text-center" style="display: inline;">
                                    We Suggest the Following <span style="color: #63a3c5">Team</span> For You:</p>
                            </div>
                            <div class="col-md-2">
                                <p class="pull-right">
                                    <a data-toggle="tooltip docs" data-placement="bottom" title="Integrated health care, often referred to as interdisciplinary health care, is an approach
                                        characterized by a high degree of collaboration and communication among health
                                        professionals. What makes integrated health care unique is the sharing of information among
                                        team members related to patient care and the establishment of a comprehensive treatment plan
                                        to address the biological, psychological, and social needs of the patient.">
                                        <img src="img/info-icon.png" /></a>
                                    <img class="eXit" src="img/exit.png" onclick="exit(this)" /></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-bottom:35px">
                <p class="lead pull left col-md-6">
                    <span style="color: #63a3c5">Conventional</span> solutions</p>
                     <div class="col-md-4 hidden-xs pull-right" style="text-align: center">
                        <a href="#convApp">
                            <button id="convApp" type="button" class="btn btn-success btn-lg btn-block">
                                Schedule an Appointment</button></a></div>
                 <div class="row">
                </div>
            </div>
        </div>
        <!-- /.container -->
    </div>
    <!-- Alternative -->
    <div id="alternative" class="row" style="padding: 60px 0; background-color: RGB(194, 230, 185);
        margin: 0">
        <div class="container">
            <div id="altPopup" style="display: none; z-index: 1000; position: absolute; top: 20;">
                <div class="container">
                    <div class="nqbox" style="background-color: rgb(240, 240, 240)">
                        <div class="row doctor-thumbnails-title">
                            <div class="col-md-8 col-md-offset-2 text-center">
                                <p class="lead text-center" style="display: inline;">
                                    We Suggest the Following <span style="color: #63a3c5">Team</span> For You:</p>
                            </div>
                            <div class="col-md-2">
                                <p class="pull-right">
                                    <a data-toggle="tooltip docs" data-placement="bottom" title="Integrated health care, often referred to as interdisciplinary health care, is an approach
                                        characterized by a high degree of collaboration and communication among health
                                        professionals. What makes integrated health care unique is the sharing of information among
                                        team members related to patient care and the establishment of a comprehensive treatment plan
                                        to address the biological, psychological, and social needs of the patient.">
                                        <img src="img/info-icon.png" /></a>
                                    <img class="eXit" src="img/exit.png" onclick="exit(this)" /></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <p class="lead">
                        <span style="color: #63a3c5">Nutritional and Alternative </span>Medicine</p>
                    <p class="col-md-8"></p>
                    <div class="col-md-4 hidden-xs" style="text-align: center">
                        <a href="#altApp">
                            <button id="altApp" type="button" class="btn btn-success btn-lg btn-block">
                                Schedule an Appointment</button></a>
                    </div>
                    <br />
                    <p style="color: #63a3c5" class="col-md-10">
                        <strong>Option for new treatments</strong>:</p>
                </div>
            </div>
        </div>
        <!-- /.container -->
    </div>
    <!-- Clinical -->
    <div id="clinical" class="row" style="padding: 60px 0; background-color: RGB(230, 208, 238);
        margin: 0">
        <div class="container">
            <div class="row">
                <p class="lead">
                    <span style="color: #63a3c5">Clinical </span>Trials</p>
                <p style="color: #63a3c5">
                    <strong>Option for new treatments</strong>:</p>
            </div>
        </div>
        <!-- /.container -->
    </div>
    <!-- Print Button -->
    <div class="row" style="margin: 0">
        <div id="printMe" style="text-align: center; padding: 30px 0">
            <a class="btn btn-info" href="#"><i class="fa fa-print fa-lg"></i><strong>Print your
                Report</strong></a></div>
    </div>
    <!-- Wellbeing & Lifestyle -->
    <div id="blog" class="row" style="padding: 60px 0; background-color: RGB(213, 238, 235);
        margin: 0">
        <div class="container">
            <p class="lead">
                <span style="color: #63a3c5">Wellbeing</span> And <span style="color: #63a3c5">Lifestyle</span></p>
            <p>
                Etiam consectetur vulputate arcu. Mauris varius nisi eget tincidunt sodales. Maecenas
                est diam, pellentesque sed maximus sit amet, sollicitudin ac felis. Donec non dapibus
                enim. Mauris quis tincidunt urna, ac feugiat leo. In ut ex vitae dui luctus mollis
                non ut lectus. Curabitur hendrerit nunc vitae ipsum consectetur pretium.</p>
            <div class="row" style="padding-top: 20px;">
                <div class="col-md-4 nq-entry">
                    <img src="img/image.jpg">
                    <h3>
                        Hello world!</h3>
                    <p>
                        Etiam consectetur vulputate arcu. Mauris varius nisi eget tincidunt sodales. Maecenas
                        est diam, pellentesque sed maximus sit amet, sollicitudin ac felis. Donec non dapibus
                        enim.</p>
                    <p>
                        <button type="button" class="btn btn-primary">
                            Read more</button></p>
                </div>
                <div class="col-md-4 nq-entry">
                    <img src="img/image-md.jpg">
                    <h3>
                        Medicom Welcomes You!</h3>
                    <p>
                        Donec non dapibus enim. Mauris quis tincidunt urna, ac feugiat leo. In ut ex vitae
                        dui luctus mollis non ut lectus. Curabitur hendrerit nunc vitae ipsum consectetur
                        pretium.Etiam consectetur vulputate arcu. Mauris varius nisi eget tincidunt sodales.
                        Maecenas est diam, pellentesque sed maximus sit amet, sollicitudin ac felis. Donec
                        non dapibus enim.</p>
                    <p>
                        <button type="button" class="btn btn-primary">
                            Read more</button></p>
                </div>
                <div class="col-md-4 nq-entry">
                    <img src="img/image-md.jpg">
                    <h3>
                        Standard Post</h3>
                    <p>
                        Etiam consectetur vulputate arcu. Mauris varius nisi eget tincidunt sodales. Maecenas
                        est diam, pellentesque sed maximus sit amet, sollicitudin ac felis. Donec non dapibus
                        enim.</p>
                    <p>
                        Curabitur auctor placerat ex eget interdum. Pellentesque vitae lacus eget est vestibulum
                        euismod. Etiam hendrerit nibh purus, id dapibus velit ultricies at. Quisque purus
                        augue, auctor nec ultricies sed, pretium id quam. In pretium pharetra quam et luctus.
                        Proin sagittis ante et varius varius.</p>
                    <p>
                        <button type="button" class="btn btn-primary">
                            Read more</button></p>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="Scripts/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="/Scripts/tooltip.js"></script>

    <script type="text/javascript">
        var sPageURL = String(window.location);
        var email = sPageURL.substring((sPageURL.indexOf("id=")+3), sPageURL.length);
        if ("<?php echo $_SESSION['email']; ?>" != email) {
            document.location.href = "/login.php";
        }
    </script>

    <script src="/Scripts/report-data.js"></script>
    <script src="/Scripts/behavior-animation.js"></script>
</body>
    

<div id="coFrameDiv" style="height: 0px; display: none;">
    <iframe id="coToolbarFrame" src="chrome-extension://cjabmdjcfcfdmffimndhafhblfmpjdpe/toolbar/placeholder.html"
        style="height: 0px; width: 100%; display: none;"></iframe>
</div>
</html>
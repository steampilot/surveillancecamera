<?php
/**
 * Created by PhpStorm.
 * User: ShinKenDo
 * Date: 07.06.2015
 * Time: 17:09
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Narrow Jumbotron Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/jumbotron-narrow.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="header clearfix">
        <nav>
            <ul class="nav nav-pills pull-right">
                <li role="presentation"><a href="off.php">OFF</a></li>
                <li role="presentation"><a href="stream.php">STREAM</a></li>
                <li role="presentation"><a href="capture.php">CAPTURE</a></li>
            </ul>
        </nav>
        <h3 class="text-muted">SURVEILLANCE MODE</h3>
    </div>
    <div class="jumbotron">
        <h1>Steampilot Surveillance Camera</h1>

        <p class="lead">Welcome to the Steampilot Surveillance Camera Suite. Please tate your time and read the
            following instructions</p>

        <h3>SURVEILLANCE MODE OFF</h3>

        <p>To Stop the surveillance please <b>click the OFF button</b> in the top right corner. No stream or video motion
            capture will be active in this mode. How ever, in this mode, you will be able to configure the stream source
            addresses of all the web cams.</p>

        <h3>SURVEILLANCE MODE STREAM</h3>

        <p>If you want to see what the camera is doing live please <b>click the STREAM button</b> in the top right corner.
            This mode features a multi view of all the connected web camera servers which can be configured in the OFF
            mode.</p>

        <h3>SURVEILLANCE MODE CAPTURE</h3>

        <p>You are away and no access to the life feed for some time? No problem. Just <b>click the CAPTURE
            button</b> in the top right corner. While active the camera will detect pixel motion per frame and records it
            into a convenient movie that you can replay later.</p>

        <h3>HELP AND SUPPORT</h3>

        <p>If you have any questions or you are in need of help, please contact the developer at
        <address>info.steampilot.ch</address>
        </p>
    </div>
    <footer class="footer">
        <p>&copy; Steampilot 2015</p>
    </footer>
</div>
<!-- /container -->
</body>
</html>

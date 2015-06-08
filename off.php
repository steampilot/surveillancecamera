<?php
/**
 * Created by PhpStorm.
 * User: ShinKenDo
 * Date: 07.06.2015
 * Time: 17:09
 */
shell_exec('sh /var/www/stopmotion.sh');
$string = file_get_contents("streams.json");
$streams = json_decode($string, true);

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
                <li role="presentation" class="active"><a href="off.php">OFF</a></li>
                <li role="presentation"><a href="stream.php">STREAM</a></li>
                <li role="presentation"><a href="capture.php">CAPTURE</a></li>
            </ul>
        </nav>
        <h3 class="text-muted">SURVEILLANCE MODE</h3>
    </div>

    <div class="jumbotron">
        <h1>SURVEILLANCE MODE OFF</h1>

        <p class="lead">To add a Surveillance camera stream please click the ADD button bellow.</p>

        <p class="lead">To remove a Surveillance camera stream pleas click the REM button next to it</p>

        <p><a class="btn btn-lg btn-success" href="add.php" role="button">ADD</a></p>
    </div>
    <div class="row marketing">
        <div class="col-lg-12">
            <h4>Subscribed streams</h4>

            <p>This lists all the stream addresses that this STEAMPILOT SURVEILLANCE CAMERA SUITE is subscribed to.</p>

            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Address
                            </th>
                            <th>
                                Port
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                        <?php

                        foreach ($streams['streams'] as $id => $stream) {

                            $name = $stream['name'];
                            $address = urldecode($stream['address']);
                            $port = $stream['port'];

                            echo "<tr><td>$id</td><td>$name</td><td>$address</td><td>$port</td><td><a class='btn btn-danger' href='rem.php?id=$id'>REM</a></td></tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; Company 2014</p>
    </footer>

</div>
<!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>

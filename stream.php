<?php
/**
 * Created by PhpStorm.
 * User: ShinKenDo
 * Date: 07.06.2015
 * Time: 17:09
 */
// define variables and set to empty values
shell_exec('sh /var/www/startmotion.sh');
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
                <li role="presentation" ><a href="off.php">OFF</a></li>
                <li role="presentation" class="active"><a href="stream.php">STREAM</a></li>
                <li role="presentation"><a href="capture.php">CAPTURE</a></li>
            </ul>
        </nav>
        <h3 class="text-muted">SURVEILLANCE MODE</h3>
    </div>

    <div class="jumbotron">
        <h1>LIFE STREAM SURVEILLANCE MODE ON</h1>

        <p class="lead">Watch all the subscribed surveillance web cam stream and also the from the build in raspberry py
            cam</p>
        <p>This lists all the stream addresses that this STEAMPILOT SURVEILLANCE CAMERA SUITE is subscribed to.</p>

        <p>Please be patient while the streams are being loaded. If the do not appear in the a short time, please
            check the address and make sure the right port is assigned. To Change a Stream, set the STEAMPILOT
            SURVEILLANCES SUITE into its OFF mode and change the subscribed address.</p>
    </div>
    <div class="row marketing">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <h2>WEB CAM SURVEILLANCE STREAMS</h2>
                </div>
                <div class="panel-body">
                    <?php foreach ($streams['streams'] as $id => $stream) {

                    $name = $stream['name'];
                    $address = urldecode($stream['address']);
                    $port = $stream['port'];
                    ?>
                    <table class="table">
                        <tr>
                            <th class="col-lg-6">
                                <b>Stream</b>
                            </th>
                            <th class="col-lg-4">
                                <b>Description</b>
                            </th>
                        </tr>
                        <tr>
                            <td>

                                <div class="panel panel-body">
                                    <div class="stream">
                                        <img src="<?php echo $address . ':' . $port; ?>"
                                             alt="Please wait while the stream is being loaded."
                                             width="320" height="240"
                                             class="img-thumbnail"
                                            />
                                    </div>
                            </td>
                            <td>
                                <p><strong>ID</strong>
                                    <?php echo $id; ?>
                                </p>

                                <p><strong>Name</strong>
                                    <?php echo $name; ?>
                                </p>

                                <p><strong>Address</strong>
                                    <?php echo $address; ?>
                                </p>

                                <p><strong>Port</strong>
                                    <?php echo $port; ?>
                                </p>
                            </td>
                        </tr>
                </div>
            </div>
            <?php } ?>
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

<?php
/**
 * Created by PhpStorm.
 * User: ShinKenDo
 * Date: 07.06.2015
 * Time: 17:09
 */
$dir = "archiv";
$listing = scandir($dir, SCANDIR_SORT_DESCENDING);
array_pop($listing);
array_pop($listing);
$clips = array();
foreach ($listing as $id => $record) {
    $name = substr($record, 0, 2);

    $timestamp = substr($record, 3, 14);

    $clip = array(

        'url' => $record,
        'name' => $name,
        'datetime' => date("d. M Y - h:m:s", strtotime($timestamp)),
    );
    $clips += array($timestamp => $clip);
}
krsort($clips);
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
                <li role="presentation" class="active"><a href="capture.php">CAPTURE</a></li>
            </ul>
        </nav>
        <h3 class="text-muted">SURVEILLANCE MODE</h3>
    </div>

    <div class="jumbotron">
        <h1>MOVEMENT TRIGGERED CAPTURE MODE</h1>

        <p class="lead">In this mode, the STEAMPILOT WEB CAM SURVEILLANCE SUITE captures movie clips when ever some
            thing in the field of the camera view changes. The captured footage can be archived and watched later</p>

        <p>The clips are sorted in a way that the most recent clip appear at the top of the list. The oldest clip can be
            found at the end of the list.</p>

        <p>To watch the clips, simply use the play and pause controls in the video menus. In order to watch the clips it
            is recommended that Firefox or Chrome is used as client browser</p>
    </div>
    <div class="row marketing">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <h2>WEB CAM SURVEILLANCE STREAMS</h2>
                </div>
                <div class="panel-body">
                    <?php foreach ($clips as $clip) {
                    $name = $clip['name'];
                    $source = $clip['url'];
                    $datetime = $clip['datetime'];
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
                                <video width="320" height="240" controls>
                                    <source src="archiv/<?php echo $source; ?>" type="video/ogg">
                                    Your browser does not support the video tag.
                                </video>

                            </td>
                            <td>
                                <p><strong>Name</strong>
                                    <?php echo $name; ?>
                                </p>

                                <p><strong>Date and Time</strong>
                                    <br/><?php echo $datetime; ?>
                                </p>
                            </td>
                        </tr>
                </div>
            </div>
            <?php } ?>
            </table>
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

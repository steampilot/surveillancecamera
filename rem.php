<?php
/**
 * Created by PhpStorm.
 * User: ShinKenDo
 * Date: 07.06.2015
 * Time: 23:30
 */
$string = file_get_contents("streams.json");
$streams = json_decode($string, true);
$removed = '';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        if (!empty($streams['streams'][$id])){
            $removed = ($streams['streams'][$id]);
            unset($streams['streams'][$id]);
            $jsonData = json_encode($streams);
            file_put_contents('streams.json', $jsonData);
        }
    }
}
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
    <div class="jumbotron">
        <h1>SURVEILLANCE STREAM REMOVED</h1>

        <p class="lead">The selected surveillance stream has been removed</p>
        <?php if (!empty($removed)) { ?>
            <p> The stream Nr:<?php echo $_GET['id'] ?>, with the name <?php echo $removed['name']; ?> and the
                address <?php echo urldecode($removed['address']); ?>
                is no longer subscribed. How ever, this subscription can be re established by re adding it.</p>
        <?php } else { ?>
            <p>
                The selected stream could not be removed. It may have been removed before or it could be that the
                stream, wich was requestet actually never has been subscribet to. Either way. Nothing happend and this
                may be a good sign.
            </p>
        <?php } ?>
        <p class="">To see the result of this action, pleas click on the button bellow to return to the subscribed
            stream list</p>
        <p><a class="btn btn-lg btn-success" href="off.php" role="button">BACK</a></p>
    </div>
    <footer class="footer">
        <p>&copy; Steampilot 2015</p>
    </footer>
</div>
<!-- /container -->
</body>
</html>
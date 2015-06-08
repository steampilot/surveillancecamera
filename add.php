<?php
/**
 * Created by PhpStorm.
 * User: ShinKenDo
 * Date: 07.06.2015
 * Time: 18:57
 */

$name = $nameErr = $address = $addressErr = $port = $portErr = $successMessage = "";
$err = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
            $err = true;
        }
    }
    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
    } else {
        $address = test_input($_POST["address"]);
        if (!preg_match("/\b(?:(?:http?):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$address)) {
            $addressErr = "Invalid URL";
            $err = true;
        }
    }

    if (empty($_POST["port"])) {
        $portErr = "Port is required";
    } else {
        $port = test_input($_POST["port"]);
        if (!preg_match("/^([1-9][0-9]|[1-9][0-9][0-9]|[1-9][0-9][0-9][0-9])$/",$port)) {
            $portErr = "Must contain only 2 to 4 digits of 0-9 for example 8081";
            $err = true;
        }
    }
    if (!$err){
        $successMessage = save($name,$address,$port);
    }
}

function save($name,$address,$port){
    $json = file_get_contents("streams.json");
    $streams = json_decode($json, true);
    $addStream = array('name'=>$name,'address'=> urlencode($address),'port'=>$port);
    array_push($streams['streams'],$addStream);
    $jsonData = json_encode($streams);
    file_put_contents('streams.json', $jsonData);
    $successMessage = sprintf("<p> the stream: %s with the address: %s on port: %s has been added to the subscription list.", $name, $address , $port);
    return $successMessage;
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
    <div class="header clearfix">

        <nav>
            <ul class="nav nav-pills pull-right">
                <li role="presentation"><a href="off.php">CANCEL</a></li>
            </ul>
        </nav>

        <h3 class="text-muted">ADD SURVEILLANCE STREAM</h3>
    </div>
    <?php if (empty($successMessage)) {?>
    <div class="jumbotron">
        <h1>ADD SURVEILLANCE STREAM</h1>

        <p class="lead">Pleas enter the name, the address and the port of the survaillance camera stream that you wish
            to subscribe to.</p>

        <p class="">If you want to cancel the process, please click on the CANCEL button in the top right corner. This
            should bring you back to the OFF mode of the STEAMPILOT SURVEILLANCE CAMERA SUITE</p>

    </div>

    <div>
        <form action="" method="post">
            <div class="form-group">
                <label class="control-label" for="name">Name of the stream</label>
                <label class="control-label has-error alert-danger" for="name"><?php echo $nameErr; ?></label>
                <input
                    name="name"
                    type="text"
                       class="form-control"
                       id="name"
                       placeholder="Enter the name of the stream"
                       value="<?php echo $name; ?>"
                    >
            </div>
            <div class="form-group">
                <label for="address">Domain Name or IP Address of the stream</label>
                <label class="control-label has-error alert-danger" for="name"><?php echo $addressErr; ?></label>

                <input
                    name="address"
                    type="text"
                       class="form-control"
                       id="address"
                       placeholder="http://steampilot.ddns.ch or http://142.126.23.114"
                       value="<?php echo $address; ?>"
                    >
            </div>
            <div class="form-group">
                <label for="port">The Port on which the stream is running</label>
                <label class="control-label has-error alert-danger" for="name"><?php echo $portErr; ?></label>
                <input
                    name="port"
                    type="text"
                       class="form-control"
                       id="port"
                       placeholder="4755"
                       value="<?php echo $port; ?>"
                    >
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
    <?php } else { echo $successMessage; echo '<p><a class="btn btn-lg btn-success" href="off.php" role="button">BACK</a></p>';}?>
    <footer class="footer">
        <p>&copy; Steampilot 2015</p>
    </footer>
</div>
<!-- /container -->
</body>
</html>
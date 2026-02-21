<?php
$email = $_POST['email'];

$email = urlencode($email);

$url = "http://toglivvilgot.pythonanywhere.com/mail/$email";

$response = file_get_contents($url);

if ($response === FALSE) {
    echo "Request failed.";
} else {
    header("Location: index.php");
    exit();
}
?>
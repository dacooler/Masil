<?php
$email = $_POST['email'];
$username = $_POST['uname'];
$password = $_POST['psw'];


$email = urlencode($email);
$username = urlencode($username);
$password = urlencode($password);


$url = "http://toglivvilgot.pythonanywhere.com/users/create/$username/$password/$email";

$response = file_get_contents($url);

if ($response === FALSE) {
    echo "Request failed.";
} else {
    header("Location: index.php");
    exit();
}
?>
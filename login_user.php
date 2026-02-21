<?php
$id = $_POST['uname'];
$password = $_POST['psw'];
$remember = $_POST['remember'];

$id = urlencode($id);
$password = urlencode($password);


$url = "http://toglivvilgot.pythonanywhere.com/users/login/$id/$password";

$response = file_get_contents($url);

if ($response === FALSE) {
    echo "Request failed.";
} else {
    header("Location: nav/");
    exit();
}
?>
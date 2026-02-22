<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = urlencode($_POST['uname']);
    $password = urlencode($_POST['psw']);

    $url = "http://toglivvilgot.pythonanywhere.com/users/login/$id/$password";

    $response = file_get_contents($url);

    if ($response === FALSE) {
        http_response_code(500);
        echo json_encode(["success" => false, "message" => "Request failed."]);
    } else {
        // Return JSON instead of redirect
        echo json_encode(["success" => true]);
    }
} else {
    http_response_code(405); // Method not allowed
}
?>
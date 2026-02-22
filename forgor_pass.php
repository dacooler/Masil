<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = urlencode($_POST['email']);

    $url = "http://toglivvilgot.pythonanywhere.com/mail/$email";

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
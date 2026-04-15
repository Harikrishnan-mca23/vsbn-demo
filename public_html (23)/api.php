<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

$file = 'vsbn_data.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = file_get_contents('php://input');
    if(file_put_contents($file, $data)) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["error" => "Failed to write file. Check folder permissions."]);
    }
} else {
    if (file_exists($file)) {
        echo file_get_contents($file);
    } else {
        echo json_encode(["error" => "No data found"]);
    }
}
?>
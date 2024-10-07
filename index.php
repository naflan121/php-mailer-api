<?php
// Enable error reporting for debugging (optional)
error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Content-Type: application/json");

// Read the JSON input
$data = json_decode(file_get_contents('php://input'), true);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Invalid request method']);
    http_response_code(405);
    exit;
}

// Validate input data
$required_fields = ['subject', 'start_time', 'end_time', 'file_name', 'file_size', 'backup_server'];
foreach ($required_fields as $field) {
    if (empty($data[$field])) {
        echo json_encode(['error' => "Missing field: $field"]);
        http_response_code(400);
        exit;
    }
}

// Include the PHPMailer file
//require '../src/send_email.php';
require __DIR__ . '/src/send_email.php';


// Send the email
$result = sendEmail($data);

if ($result === true) {
    echo json_encode(['success' => 'Email sent successfully']);
} else {
    echo json_encode(['error' => $result]);  // Return the error message from PHPMailer
    http_response_code(500);
}

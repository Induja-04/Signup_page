<?php
header('Content-Type: application/json');

require_once '../../php/redis_connect.php'; // Redis connection
require_once '../../php/mongo_connect.php'; // MongoDB connection

// Get token from Authorization header
$headers = getallheaders();
$token = $headers['Authorization'] ?? null;

if (!$token || !$redis->exists($token)) {
    echo json_encode(["status" => "fail", "message" => "User not logged in"]);
    exit;
}

$email = $redis->get($token);

if (!$email) {
    echo json_encode(["status" => "fail", "message" => "Session expired"]);
    exit;
}

// MongoDB: Get user profile using email
$collection = $mongodb->selectCollection("user_profiles");
$document = $collection->findOne(["email" => $email]);

if ($document) {
    echo json_encode([
        "status" => "success",
        "data" => [
            "email" => $document['email'],
            "name" => $document['name'] ?? '',
            "phone" => $document['phone'] ?? '',
            "address" => $document['address'] ?? ''
        ]
    ]);
} else {
    echo json_encode([
        "status" => "fail",
        "message" => "User profile not found in MongoDB"
    ]);
}
?>

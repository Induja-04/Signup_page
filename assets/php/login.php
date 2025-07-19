<?php
require_once("db_connect.php");
require_once("redis_connect.php");
require_once(__DIR__ . '/../../vendor/autoload.php');


$redis = new Predis\Client();

$email = $_POST['email'];
$password = $_POST['password'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
    $token = bin2hex(random_bytes(16));
    $redis->set($token, $email); // store session
    echo json_encode(['status' => 'success', 'token' => $token]);
} else {
    echo json_encode(['status' => 'fail']);
}


?>

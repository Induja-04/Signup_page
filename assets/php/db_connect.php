<?php
$host = '127.0.0.1';
$port = 3326;  // VERY IMPORTANT: your MySQL is running on 3326
$dbname = 'test';  // Change to your actual DB name
$username = 'root';
$password = '';  // KEEP THIS BLANK if no password

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "✅ Connected to database successfully.";
} catch (PDOException $e) {
    echo "❌ Database connection failed: " . $e->getMessage();
}
?>


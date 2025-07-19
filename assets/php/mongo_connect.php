<?php
require_once(__DIR__ . '/../../../vendor/autoload.php'); // Now this will work!

$mongo = new MongoDB\Client("mongodb://localhost:27017");
$db = $mongo->guvt_intern;
$collection = $db->user_profiles;
?>

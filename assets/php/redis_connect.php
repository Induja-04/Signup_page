<?php
require_once __DIR__ . '/../../vendor/autoload.php'; // ✅ Correct path to vendor/autoload.php

$redis = new Predis\Client([
    'scheme' => 'tcp',
    'host'   => '127.0.0.1',
    'port'   => 6379,
]);
?>

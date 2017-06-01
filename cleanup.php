<?php
include('config.php');

$cleanup = $db->pdo->prepare('DELETE sightings WHERE last_updated BETWEEN DATE_SUB(NOW(),INTERVAL 7 DAY) AND DATE_SUB(NOW(),INTERVAL 1 DAY)');
$cleanup->execute();

$cleanup = $db->pdo->prepare('DELETE fort_sightings WHERE last_updated BETWEEN DATE_SUB(NOW(),INTERVAL 7 DAY) AND DATE_SUB(NOW(),INTERVAL 1 DAY)');
$cleanup->execute();

echo "Successfully executed cleanup at: " . date('Y-m-d H:i:s') . "\n";

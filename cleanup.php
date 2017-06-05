<?php
include('config.php');

$timestamp = strtotime("-1 day");
$timestamp_str = gmdate('Y-m-d H:i:s', $timestamp);

echo "GMT timestamp: ". $timestamp . "\n";
echo "GMT datetime: " . $timestamp_str . "\n";

#$cleanup = $db->pdo->prepare('DELETE FROM sightings WHERE last_updated BETWEEN DATE_SUB(NOW(),INTERVAL 7 DAY) AND DATE_SUB(NOW(),INTERVAL 1 DAY)');
#$cleanup->execute();
$cleanup = $db->pdo->prepare('DELETE FROM sightings WHERE last_updated < ?');
$cleanup->execute(array($timestamp_str));
echo "Cleaning sightings. Deleted rows:" . $cleanup->rowCount() . "\n";

$cleanup = $db->pdo->prepare('DELETE FROM mystery_sightings WHERE first_seen < ?');
$cleanup->execute(array($timestamp));
echo "Cleaning mystery_sightings. Deleted rows:" . $cleanup->rowCount() . "\n";

$cleanup = $db->pdo->prepare('DELETE FROM fort_sightings WHERE last_updated < ?');
$cleanup->execute(array($timestamp_str));
echo "Cleaning fort_sightings. Deleted rows:" . $cleanup->rowCount() . "\n";

echo "Successfully executed cleanup at: " . date('Y-m-d H:i:s') . "\n";

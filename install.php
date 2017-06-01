<?php
include('config.php');
//ALTER TABLE
//ALTER TABLE sightings ADD last_updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
$altertable = $db->pdo->prepare('ALTER TABLE sightings ADD last_updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP');
$altertable->execute();

$altertable2 = $db->pdo->prepare('ALTER TABLE fort_sightings ADD last_updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP');
$altertable2->execute();

$createindex = $db->pdo->prepare('CREATE INDEX last_updated_index ON sightings (last_updated)');
$createindex->execute();

$createindex2 = $db->pdo->prepare('CREATE INDEX last_updated_index ON fort_sightings (last_updated)');
$createindex2->execute();
echo "Successfully applied any changes that were needed!";

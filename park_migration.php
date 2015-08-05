<?php

require_once 'parks_config.php';
require_once 'db_connect.php';
echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . PHP_EOL;

$dropTableIfExists = 'DROP TABLE IF EXISTS national_parks';
$dbc->exec($dropTableIfExists);

$createNewTable = 'CREATE TABLE national_parks(
		id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		park VARCHAR(50) NOT NULL,
		location CHAR(2) NOT NULL,
		established DATE NOT NULL,
		area_in_acres DOUBLE(10,2) NOT NULL,
		description TEXT(300) NOT NULL,
		PRIMARY KEY (id),
		UNIQUE KEY park_location_unq (park, location)
	)';
$dbc->exec($createNewTable);

?>

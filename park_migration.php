<?php
define("DB_HOST", '127.0.0.1');
define("DB_NAME", 'parks_db'); 
define("DB_USER", 'parks_user'); 
define("DB_PASS", '  ');

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
		PRIMARY KEY (id)
	)';
$dbc->exec($createNewTable);

?>

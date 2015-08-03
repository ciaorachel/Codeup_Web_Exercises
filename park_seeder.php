<?php  

define("DB_HOST", '127.0.0.1');
define("DB_NAME", 'parks_db'); 
define("DB_USER", 'parks_user'); 
define("DB_PASS", '  ');

require_once 'db_connect.php';

$truncateTable = "TRUNCATE national_parks";
$dbc->exec($truncateTable);

$parks = [
	['park' => 'Arches', 'location' => 'UT', 'established' => '1929-04-12', 'area_in_acres' => '76518.98'],
	['park' => 'Badlands', 'location' => 'SD', 'established' => '1978-11-10', 'area_in_acres' => '242755.94'],
	['park' => 'Congaree', 'location' => 'SC', 'established' => '2003-11-10', 'area_in_acres' => '26545.86'],
	['park' => 'Denali', 'location' => 'AK', 'established' => '1917-02-26', 'area_in_acres' => '4740911.72'],
	['park' => 'Everglades', 'location' => 'FL', 'established' => '1934-05-30', 'area_in_acres' => '1508537.90'],
	['park' => 'Glacier', 'location' => 'MT', 'established' => '1910-05-11', 'area_in_acres' => '1013572.41'],
	['park' => 'Grand Canyon', 'location' => 'AZ', 'established' => '1919-02-26', 'area_in_acres' => '1217403.32'],
	['park' => 'Guadalupe Mountains', 'location' => 'TX', 'established' => '1966-10-15', 'area_in_acres' => '86415.97'],
	['park' => 'Hawaii Volcanoes', 'location' => 'HI', 'established' => '1916-08-01', 'area_in_acres' => '323431.38'],
	['park' => 'Yosemite', 'location' => 'CA', 'established' => '1890-10-01', 'area_in_acres' => '761266.19']
];

foreach ($parks as $info => $park) {
	$query = "INSERT INTO national_parks(park, location, established, area_in_acres) VALUES ('{$park['park']}', '{$park['location']}', '{$park['established']}', '{$park['area_in_acres']}')";

	$dbc->exec($query);

    echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
}


?>
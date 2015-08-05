<?php  

require_once 'parks_config.php';
require_once 'db_connect.php';

$truncateTable = 'TRUNCATE national_parks';
$dbc->exec($truncateTable);

$parks = [
	['park' => 'Arches', 'location' => 'UT', 'established' => '1929-04-12', 'area_in_acres' => '76518.98', 'description' => 'This site features more than 2,000 natural sandstone arches, including the famous Delicate Arch.'],
	['park' => 'Badlands', 'location' => 'SD', 'established' => '1978-11-10', 'area_in_acres' => '242755.94', 'description' => 'The Badlands are a collection of buttes, pinnacles, spires, and grass prairies.'],
	['park' => 'Congaree', 'location' => 'SC', 'established' => '2003-11-10', 'area_in_acres' => '26545.86', 'description' => 'On the Congaree River, this park is the largest portion of old-growth floodplain forest left in North America.'],
	['park' => 'Denali', 'location' => 'AK', 'established' => '1917-02-26', 'area_in_acres' => '4740911.72', 'description' => 'Centered around Mount McKinley, the tallest mountain in North America, Denali is serviced by a single road leading to Wonder Lake.'],
	['park' => 'Everglades', 'location' => 'FL', 'established' => '1934-05-30', 'area_in_acres' => '1508537.90', 'description' => 'The Everglades are the largest subtropical wilderness in the United States.'],
	['park' => 'Glacier', 'location' => 'MT', 'established' => '1910-05-11', 'area_in_acres' => '1013572.41', 'description' => 'The U.S. half of Waterton-Glacier International Peace Park, this park hosts 26 glaciers and 130 named lakes beneath a stunning canopy of Rocky Mountain peaks.'],
	['park' => 'Grand Canyon', 'location' => 'AZ', 'established' => '1919-02-26', 'area_in_acres' => '1217403.32', 'description' => 'The Grand Canyon, carved by the mighty Colorado River, is 277 miles long, up to 1 mile deep, and up to 15 miles wide.'],
	['park' => 'Guadalupe Mountains', 'location' => 'TX', 'established' => '1966-10-15', 'area_in_acres' => '86415.97', 'description' => 'This park boasts Guadalupe Peak, the highest point in Texas; the scenic McKittrick Canyon filled with Bigtooth Maples; and a corner of the arid Chihuahuan Desert.'],
	['park' => 'Hawaii Volcanoes', 'location' => 'HI', 'established' => '1916-08-01', 'area_in_acres' => '323431.38', 'description' => 'This park on the Big Island protects the famous Kīlauea and Mauna Loa volcanoes, two of the world\'s most active geological features.'],
	['park' => 'Yosemite', 'location' => 'CA', 'established' => '1890-10-01', 'area_in_acres' => '761266.19', 'description' => 'Yosemite features towering granite cliffs, dramatic waterfalls, and old-growth forests at a unique intersection of geology and hydrology.']
];

$stmt = $dbc->prepare('INSERT INTO national_parks(park, location, established, area_in_acres, description) VALUES (
	:park, 
	:location, 
	:established, 
	:area_in_acres,
	:description
)');

foreach ($parks as $park) {
	$stmt->bindValue(':park', Input::get('park'), PDO::PARAM_STR);
	$stmt->bindValue(':location', Input::get('location'), PDO::PARAM_STR);
	$stmt->bindValue(':established', Input::get('established'), PDO::PARAM_INT);
	$stmt->bindValue(':area_in_acres', Input::get('area_in_acres'), PDO::PARAM_INT);
	$stmt->bindValue(':description', Input::get('description'), PDO::PARAM_STR);

	$stmt->execute();

    echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
}


?>
<?php  

require_once '../parks_config.php';
require_once '../db_connect.php';

$stmt = $dbc->query('SELECT * FROM national_parks');

function getParks($dbc)
{	
    return $dbc->query('SELECT * FROM national_parks')->fetchAll(PDO::FETCH_ASSOC);
}

print_r(getParks($dbc));

?>
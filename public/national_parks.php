<?php

// Get new instance of PDO object
$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_pdo_test_db', 'greg', 'quiero');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

function getParks($dbc) {
    // Bring the $dbc variable into scope somehow
	
	$stmt = $dbc->query('SELECT * FROM national_parks');

    $national_parks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $national_parks;
}

?>
<html>
<head>
	<title>National Parks Exercise</title>
</head>
<body>
<table>
	<th>#</th>
	<th>Park</th>
	<th>State</th>
	<th>Date Established</th>
	<th>Area, in acres</th>	
	
		<? foreach (getParks($dbc) as $info => $park) { ?>
		<tr>
        	<? foreach ($park as $key => $value) { ?>
        		<?= "<td>" . $value . "</td>"; ?>
        	<? } ?> 
        </tr>	
        <? };?>
	
</table>
</body>
</html>
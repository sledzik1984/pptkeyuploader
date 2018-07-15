<?php

//SQL Needed
include 'mysql.php';

$event_id = $_POST['event_id'];
$pin_podany = $_POST['pin'];

//echo "<!DOCTYPE html>\n";
//echo "<html lang=\"pl\">\n<head>\n<title>System obsługi prezentacji</title>\n";
//echo "<link rel=\"stylesheet\" href=\"css/style.css\">\n";
//echo "</head>\n<body>\n";
//echo "<div class=\"form-style-8\">\n";
//echo "<form name=\"event\" action=\"event_chosen.php\" method=\"POST\">\n";

//Query
$sql = "SELECT * FROM `events` WHERE `id` = '$event_id'";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}


while($row = $result->fetch_assoc()){
	$event_id = $row['id'];
	$event_name = $row['event_name'];
	$pin = $row['pin'];

	if ($pin != $pin_podany) {

		$header = 'Location: https://prelegent.cma.pl/index.php?badpin=1';
		header($header);


	} else {


		$header = 'Location: https://prelegent.cma.pl/choose_room.php?event_id='.$event_id;
		header($header);


	}



}
//echo "<br>\n";
//echo "<input type=\"submit\" value=\"Wybierz salę wykładową\">\n";

//echo "</form></div>\n";
//echo "</body>\n</html>";


?>
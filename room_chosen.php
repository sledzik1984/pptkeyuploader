<?php

//SQL Needed
include 'mysql.php';


//Post VARS
$event_id = $_POST['event_id'];
$room = $_POST['room'];

echo "<!DOCTYPE html>\n";
echo "<html lang=\"pl\">\n<head>\n<title>System obsługi prezentacji</title>\n";
echo "<link rel=\"stylesheet\" href=\"css/style.css\">\n";
echo "</head>\n<body>\n";
echo "<div class=\"form-style-8\">\n";
echo "<form name=\"day\" action=\"day_chosen.php\" method=\"POST\">\n";
echo "<select name=\"date\" id=\"date\">\n";
//Query
$sql = "SELECT * FROM `dates` WHERE `event_id` = '$event_id' AND `room_id` = '$room' ORDER BY `date` ASC";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}


while($row = $result->fetch_assoc()){
	$date_id = $row['id'];
	$date = $row['date'];

	$sql_room_name = "SELECT `roomname` FROM `rooms` WHERE `id` = '$room'";

	if(!$result_room = $db->query($sql_room_name)){
		die('There was an error running the query [' . $db->error . ']');
	}


	while($row_room = $result_room->fetch_assoc()){

		$room_name = $row_room['roomname'];


	}


	$date_human = date("d-m-Y", $date) . ", Sala: " . $room_name;


	echo "<option value=\"".$date_id."\">".$date_human."</option>\n";

}
echo "</select>\n";
echo "<input type=\"hidden\" name=\"room_id\" id=\"room_id\" value=\"".$room."\">\n";
echo "<input type=\"hidden\" name=\"event_id\" id=\"event_id\" value=\"".$room."\">\n";


echo "<br>\n";
echo "<input type=\"submit\" value=\"Wybierz dzień wykładu\">\n";

echo "</form></div>\n";
echo "</body>\n</html>";


?>
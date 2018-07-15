<?php

//SQL Needed
include 'mysql.php';


//Post VARS
$event_id = $_POST['event_id'];
$room_id = $_POST['room_id'];
$day_id = $_POST['day_id'];


echo "<!DOCTYPE html>\n";
echo "<html lang=\"pl\">\n<head>\n<title>System obsługi prezentacji</title>\n";
echo "<link rel=\"stylesheet\" href=\"css/style.css\">\n";
echo "</head>\n<body>\n";
echo "<div class=\"form-style-8\">\n";
echo "<form name=\"day\" action=\"day_chosen.php\" method=\"POST\">\n";
echo "<select name=\"date\" id=\"date\">\n";
//Query
$sql = "SELECT * FROM `prezentacje` WHERE `event_id` = '$event_id' AND `room_id` = '$room_id' ORDER BY `timestart` ASC";

echo $sql;

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}


while($row = $result->fetch_assoc()){
	$ppt_id = $row['id'];
	$timestart = $row['timestart'];
	$timestart_human = date("d-m-Y H:i", $timestart);
	$title = $row['title'];
	$imie = $row['firstname'];
	$nazwisko = $row['lastname'];

	$select = $timestart_human . ": ".$title.", prelegent: " .$imie." ".$nazwisko;


	echo "<option value=\"".$ppt_id."\">".$select."</option>\n";

}
echo "</select>\n";


echo "<br>\n";
echo "<input type=\"submit\" value=\"Wybierz wykład\">\n";

echo "</form></div>\n";
echo "</body>\n</html>";


?>
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
echo "<form name=\"day\" action=\"upload_files.php\" method=\"POST\">\n";
echo "<select name=\"ppt_id\" id=\"ppt_id\">\n";
//Query
$sql = "SELECT * FROM `prezentacje` WHERE `event_id` = '$event_id' AND `room_id` = '$room_id' ORDER BY `timestart` ASC";

//echo $sql;

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
	$ver = $row['version'];
	$select = $timestart_human . ": ".$title.", prelegent: " .$imie." ".$nazwisko;


	echo "<option value=\"".$ppt_id."\">".$select."</option>\n";

}
echo "</select>\n";
echo "<input type=\"hidden\" name=\"event_id\" id=\"event_id\" value=\"" . $event_id . "\">\n";
echo "<input type=\"hidden\" name=\"room_id\" id=\"room_id\" value=\"" . $room_id . "\">\n";
echo "<input type=\"hidden\" name=\"day_id\" id=\"day_id\" value=\"" . $day_id . "\">\n";



echo "<br>\n";
echo "<input type=\"submit\" value=\"Wybierz wykład\">\n";

echo "</form></div>\n";
echo "</body>\n</html>";


?>
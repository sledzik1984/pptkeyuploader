<?php

//SQL Needed

include 'mysql.php';

if(isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];
} else {
    $event_id = 0;
}



echo "<!DOCTYPE html>\n";
echo "<html lang=\"pl\">\n<head>\n<title>System obsługi prezentacji</title>\n";
echo "<link rel=\"stylesheet\" href=\"css/style.css\">\n";
echo "</head>\n<body>\n";
echo "<div class=\"form-style-8\">\n";

echo "<form name=\"room\" action=\"room_chosen.php\" method=\"POST\">\n";
echo "<select name=\"room\" id=\"room\">\n";

//Query
$sql = "SELECT * FROM `rooms` WHERE `event_id` = '$event_id' ORDER BY `roomname` DESC";

//echo $sql;

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}


while($row = $result->fetch_assoc()){
	$event_id_sql = $row['event_id'];
	$room_name = $row['roomname'];
	$room_id = $row['id'];

	echo "<option value=\"".$room_id."\">".$room_name."</option>\n";


}
echo "</select>\n";
echo "<input type=\"hidden\" name=\"event_id\" value=\"".$event_id_sql."\">\n";
echo "<br>\n";
echo "<input type=\"submit\" value=\"Wybierz salę wykładową\">\n";

echo "</form></div>\n";
echo "</body>\n</html>";


?>
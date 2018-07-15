<?php

//SQL Needed

include 'mysql.php';
echo "<!DOCTYPE html>\n";
echo "<html lang=\"pl\">\n<head>\n<title>System obsługi prezentacji</title>\n";
echo "<link rel=\"stylesheet\" href=\"css/style.css\">\n";
echo "</head>\n<body>\n";
echo "<div class=\"form-style-8\">\n";
echo "<form name=\"event\" action=\"event_chosen.php\" method=\"POST\">\n";
echo "<select name=\"event\" id=\"event\">\n";

//Query
$sql = "SELECT * FROM `events` WHERE `active` = '1' ORDER BY `timeadded` DESC";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}


while($row = $result->fetch_assoc()){
	$event_id = $row['id'];
	$event_name = $row['event_name'];
	echo "<option value=\"".$event_id."\">".$event_name."</option>\n";

}
echo "</select>\n";
echo "<br>\n";
echo "<input type=\"submit\" value=\"Wybierz\">\n";

echo "</form></div>\n";
echo "</body>\n</html>";


?>
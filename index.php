<?php

//SQL Needed

include 'mysql.php';

if(isset($_GET['badpin'])) {
    $badpin = $_GET['badpin'];
} else {
    $badpin = 0;
}


echo "<!DOCTYPE html>\n";
echo "<html lang=\"pl\">\n<head>\n<title>System obsługi prezentacji</title>\n";
echo "<link rel=\"stylesheet\" href=\"css/style.css\">\n";
echo "</head>\n<body>\n";
echo "<div class=\"form-style-8\">\n";

if ($badpin == 1) {
	echo "<b>Podano błędny PIN konferencji. Proszę spróbować ponownie!<br><br>Wybierz konferencję:</b><br><br>\n";
} elseif ($badpin == 0) {
	echo "<b>Wybierz konferencję:</b><br><br>\n";
}

echo "<form name=\"event\" action=\"pin.php\" method=\"POST\">\n";
echo "<select name=\"event_id\" id=\"event_id\">\n";

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
echo "<input type=\"submit\" value=\"Wybierz konferencję\">\n";

echo "</form></div>\n";
echo "</body>\n</html>";


?>
<?php

//SQL Needed
include 'mysql.php';


//Post VARS
$event_id = $_POST['event_id'];


echo "<!DOCTYPE html>\n";
echo "<html lang=\"pl\">\n<head>\n<title>System obsługi prezentacji</title>\n";
echo "<link rel=\"stylesheet\" href=\"css/style.css\">\n";
echo "</head>\n<body>\n";
echo "<div class=\"form-style-8\">\n";
echo "<form name=\"event\" action=\"event_chosen.php\" method=\"POST\">\n";

if (!isset($badpin)) {
echo "Podaj PIN konferencji:\n";
} elseif ($badpin == 1) {
echo "Podano błędny PIN. Spróbuj ponownie:\n";
}



echo "<input type=\"text\" name=\"pin\" id=\pin\" size=\"4\" maxlenght=\"4\">\n";
echo "<input type=\"hidden\" name=\"event_id\" id=\"event_id\" value=\"".$event_id."\">\n";
echo "<br>\n";
echo "<input type=\"submit\" value=\"Zatwierdź\">\n";

echo "</form></div>\n";
echo "</body>\n</html>";


?>
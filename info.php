<?php

//SQL Needed

include 'mysql.php';

if(isset($_GET['badpin'])) {
    $badpin = $_GET['badpin'];
} else {
    $badpin = 0;
}

header( "Refresh:5; url=https://prelegent.cma.pl", true, 303);

echo "<!DOCTYPE html>\n";
echo "<html lang=\"pl\">\n<head>\n<title>System obsługi prezentacji</title>\n";
echo "<link rel=\"stylesheet\" href=\"css/style.css\">\n";
echo "</head>\n<body>\n";
echo "<div class=\"form-style-8\">\n";

	echo "<b>Pliki zapisane poprawnie!</b><br><br>\n";

echo "</div>\n";
echo "</body>\n</html>";




?>
<?php

//SQL Needed

include 'mysql.php';

if(isset($_GET['badpin'])) {
    $badpin = $_GET['badpin'];
} else {
    $badpin = 0;
}

header( "Refresh:15; url=https://prelegent.cma.pl", true, 303);

echo "<!DOCTYPE html>\n";
echo "<html lang=\"pl\">\n<head>\n<title>System obsługi prezentacji</title>\n";
echo "<link rel=\"stylesheet\" href=\"css/style.css\">\n";
echo "</head>\n<body>\n";
echo "<div class=\"form-style-8\">\n";

	echo "<b>Pliki zapisane poprawnie!</b><br><br><br>\n";
	echo "Prosimy aby posiadali Państwo awaryjnie swoją prezentację na nośniku USB.<br>Prosimy o weryfikację poprawności przesłanej prezentacji w centrum slajdów które znajdziecie Państwo w miejscu kongresu.\n";

echo "</div>\n";
echo "</body>\n</html>";




?>
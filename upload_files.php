<?php

//SQL Needed

$event_id = $_POST['event_id'];
$room_id = $_POST['room_id'];
$day_id = $_POST['day_id'];
$ppt_id = $_POST['ppt_id'];

include 'mysql.php';
echo "<!DOCTYPE html>\n";
echo "<html lang=\"pl\">\n<head>\n<title>System obsługi prezentacji</title>\n";
//echo "<link rel=\"stylesheet\" href=\"css/style.css\">\n";
echo "<link href=\"css/dropzone.css\" type=\"text/css\" rel=\"stylesheet\" />\n";

echo "<script src=\"dropzone.js\"></script>\n";
echo "</head>\n<body>\n";

echo " <div id=\"dropzone\"><form action=\"/upload.php\" class=\"dropzone needsclick\" id=\"demo-upload\">\n"; 
echo " <input type=\"hidden\" name=\"event_id\" id=\"event_id\" value=\"".$event_id."\">\n";
echo " <input type=\"hidden\" name=\"room_id\" id=\"room_id\" value=\"".$room_id."\">\n";
echo " <input type=\"hidden\" name=\"day_id\" id=\"day_id\" value=\"".$day_id."\">\n";
echo " <input type=\"hidden\" name=\"ppt_id\" id=\"ppt_id\" value=\"".$ppt_id."\">\n";


echo "\n"; 

echo "  <div class=\"dz-default dz-message\">\n"; 
echo "    <span class=\"note needsclick\">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>\n"; 
echo "  </div>\n"; 
echo "\n"; 
echo "</form></div>\n"; 
echo "\n";

echo "</body>\n</html>";


?>
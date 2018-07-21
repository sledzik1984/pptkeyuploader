<?php

include 'mysql.php';



$event_id = $_POST['event_id'];
$room_id = $_POST['room_id'];
$day_id = $_POST['day_id'];
$ppt_id = $_POST['ppt_id'];
$ppt_ver = $_POST['ppt_ver'];




//Pobieramy folder dla danego eventu


$sql_event = "SELECT `event_folder` FROM `events` WHERE `id` = '$event_id'";

if(!$result_event = $db->query($sql_event)){
    die('There was an error running the query [' . $db->error . ']');
}


while($row_event = $result_event->fetch_assoc()){
	$event_folder = $row_event['event_folder'];
}


//Pobieramy folder dla sali

$sql_room = "SELECT `roomname` FROM `rooms` WHERE `id` = '$room_id'";

if(!$result_room = $db->query($sql_room)){
    die('There was an error running the query [' . $db->error . ']');
}


while($row_room = $result_room->fetch_assoc()){
	$room_folder = $row_room['roomname'];
}


//Pobieramy folder dla dnia

$sql_day = "SELECT `date` FROM `dates` WHERE `id` = '$day_id'";

if(!$result_day = $db->query($sql_day)){
    die('There was an error running the query [' . $db->error . ']');
}


while($row_day = $result_day->fetch_assoc()){
	$day_timestamp = $row_day['date'];
	$date = date("d-m-Y", $day_timestamp);


}

//Pobeieramy folder dla konkretnej prezentacji

$sql_ppt = "SELECT * FROM `prezentacje` WHERE `id` = '$ppt_id'";

if(!$result_ppt = $db->query($sql_ppt)){
    die('There was an error running the query [' . $db->error . ']');
}


while($row_ppt = $result_ppt->fetch_assoc()){
	$ppt_timestamp = $row_ppt['timestart'];
	$ppt_date = date("Hi", $ppt_timestamp);
	$firstname = $row_ppt['firstname'];
	$lastname = $row_ppt['lastname'];
	$title = $row_ppt['title'];

	$ppt_folder = $ppt_date . "_" . $firstname . "_" . $lastname . "_" . $title;

}



if (!empty($_FILES)) {

    $tempFile = $_FILES['file']['tmp_name'];
    $targetPath = "/var/www/html/pptkeyuploader/uploads/".$event_folder."/".$date."/".$room_folder."/".$ppt_folder."/".$ppt_ver."/";
    echo $targetPath;



    if (!is_dir($targetPath)) {
		echo "Tworzę KATALOG";
		mkdir($targetPath, 0777, true);
    }

    $targetFile =  $targetPath. $_FILES['file']['name'];
    move_uploaded_file($tempFile,$targetFile);



}



?>
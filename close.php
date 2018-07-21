<?php

include 'mysql.php';

$ppt_id = $_POST['ppt_id_close'];
$new_ver = $_POST['new_ppt_ver'];

$sql = "UPDATE `prezentacje` SET `version` = '$new_ver' WHERE `id` = '$ppt_id'";

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

header("Location: https://prelegent.cma.pl/info.php");





?>
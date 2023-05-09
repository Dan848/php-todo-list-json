<?php
//Get Json data type
$listJson = file_get_contents("./js/data.json");

//Convert JSON to PHP type
$listPhp = json_decode($listJson, true);

if(isset($_POST['newItem'])) {
    $newItem = $_POST['newItem'];
    
    array_push($listPhp, $newItem);

    file_put_contents('./js/data.json', json_encode($listPhp));
}

header("Content-Type: application/json");
//Print JSON data type
echo json_encode($listPhp);
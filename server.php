<?php
//Get Json data type
$listJson = file_get_contents("./js/data.json");

//Convert JSON to PHP type
// $listPhp = json_decode($listJson, true);

header("Content-Type: application/json");
//Print JSON data type
echo $listJson;
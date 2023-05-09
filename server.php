<?php
//Get Json data type
$listJson = file_get_contents("./js/data.json");

//Convert JSON to PHP type
$listPhp = json_decode($listJson, true);

//ADD TASK
if(isset($_POST['newItem'])) {
    $newItem = $_POST['newItem'];
    
    array_push($listPhp, $newItem);

    file_put_contents('./js/data.json', json_encode($listPhp));
}

//DONE UNDONE TASK
if(isset($_POST['doneIndex'])){
    $index = $_POST['doneIndex'];
    if($listPhp[$index]["done"] == "no"){
        $listPhp[$index]["done"] = "yes";
    }
    elseif ($listPhp[$index]["done"] == "yes") {
        $listPhp[$index]["done"] = "no";
    }

    file_put_contents('./js/data.json', json_encode($listPhp));
}

//REMOVE TASK
if(isset($_POST['removeIndex'])){
    $index = $_POST['removeIndex'];
    array_splice($listPhp, $index, 1);
    file_put_contents('./js/data.json', json_encode($listPhp));
}

header("Content-Type: application/json");
//Print JSON data type
echo json_encode($listPhp);
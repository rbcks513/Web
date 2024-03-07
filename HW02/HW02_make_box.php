<?php
$input_id = "";
$input_id = $_POST["id"];
$file_name = "./data/".$input_id.".json";

if(file_exists($file_name)) {
    $file = fopen($file_name, "r");
    while(!feof($file)) {
        $json_schedule = trim(fgets($file));
        echo $json_schedule;
    }
fclose($file);

?>
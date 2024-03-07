<?php
$input_id = $input_date = $input_time = $input_title = $input_description = "";
$input_id = $_POST["id"];
$input_date = $_POST["date"];
$input_time = $_POST["time"];
$input_title = $_POST["title"];
$input_description = $_POST["description"];

$file_name = "./data/".$input_id.".json";

if(file_exists($file_name)) {
    $file = fopen($file_name, "r");
    while(!feof($file)) {
        $json_schedule = trim(fgets($file));
        $schedule = json_decode($json_schedule, true);
        if(strcmp($schedule["date"], $input_date) == 0 
        && strcmp($schedule["time"], $input_time) == 0){
            echo "이미 일정이가 존재합니다.";
            exit;
        }
    }
    fclose($file);
}

//join membership
$file = fopen($file_name, "a");
if(!isset($schedule)) $schedule = new stdClass();
$schedule = array(
    "date" => $input_date,
    "time" => $input_time,
    "title" => $input_title,
    "description" => $input_description
);
$json_schedule = json_encode($schedule);
fwrite($file, $json_schedule . "\n");
fclose($file);
echo "저장되었습니다.";

?>
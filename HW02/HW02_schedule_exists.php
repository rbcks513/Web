<?php
$input_id = "";

$input_id = test_input($_POST["id"]);

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$file_name = "./data/".$input_id.".json";
if(!file_exists($file_name)) {
    echo "등록된 일정이 없습니다.";
} else {
}
?>
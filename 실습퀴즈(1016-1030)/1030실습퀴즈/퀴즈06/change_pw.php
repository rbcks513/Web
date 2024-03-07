<?php
session_start();
$id = $_SESSION["id"];

$input_pw = test_input($_POST["input_pw"]);

//validation
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$file_name = "./data/person.json";
//Saves modified file contents
$modified_file_content = "";
$file = fopen($file_name, "r");
while(!feof($file)) {
    $json_person = trim(fgets($file));
    if(!isset($person)) $person = new stdClass();
    $person = json_decode($json_person, true);
    //Find ID to modify
    if(strcmp($person["id"], $id) == 0) {
        //modify password
        $person["pw"] = $input_pw;

        $json_person = json_encode($person);
        $modified_file_content .= ($json_person . "\n");
    }else {
        $modified_file_content .= ($json_person . "\n");
    }
}
fclose($file);

//Write modified file contents
$file = fopen($file_name, "w");
fwrite($file, $modified_file_content);
fclose($file);
echo"비밀번호 변경이 성공적으로 완료되었습니다.";
 ?>

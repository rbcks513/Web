<?php
$input_id = $input_pw = "";

$input_id = test_input($_POST["id"]);
$input_pw = test_input($_POST["pw"]);

//validation
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$file_name = "./data/person.json";
//Check whether ID exists

if(file_exists($file_name)) {
    $file = fopen($file_name, "r");
    while(!feof($file)) {
        $json_person = trim(fgets($file));
        $person = json_decode($json_person, true);
        if(strcmp($person["id"], $input_id) == 0){
            echo "이미 아이디가 존재합니다.";
            exit;
        }
    }
    fclose($file);
}

//join membership
$file = fopen($file_name, "a");
if(!isset($person)) $person = new stdClass();
$person = array("id" => $input_id, "pw" => $input_pw);
$json_person = json_encode($person);
fwrite($file, $json_person . "\n");
fclose($file);
echo "회원 가입이 완료되었습니다.";
?>

<?php
session_start();
$input_id = $input_pw = "";

$input_id = test_input($_POST["input_id"]);
$input_pw = test_input($_POST["input_pw"]);

//validation
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Login success status
$login_flag = false;
$file_name = "./data/person.json";
//Check if both ID and password match.
//zero members
if(!file_exists($file_name)) {
    exit("입력하신 id가 존재하지 않거나 패스워드가 틀립니다.");
} else{
    $file = fopen($file_name, "r");
    while(!feof($file)) {
        $json_person = trim(fgets($file));
        $person = json_decode($json_person, true);
        if(strcmp($person["id"], $input_id) == 0) {
            if(strcmp($person["pw"], $input_pw) == 0) {
                $login_flag = true;
                echo $input_id . "님 로그인이 되었습니다.";
                echo "<br><br>" . "<button type='button'><a href='change_pw.html'>비밀번호 변경</a></button>";

                $_SESSION["id"] = $input_id;
                break;
            }
        }
    }
    fclose($file);
}

if($login_flag == false) {
    exit("입력하신 id가 존재하지 않거나 패스워드가 틀립니다.");
}
?>

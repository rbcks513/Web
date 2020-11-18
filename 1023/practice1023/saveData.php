<?php

if(fileCheck()){
  fileSave();
  echo "저장되었습니다.";
} else {
  echo "저장되지 않았습니다.<br> 이전과 같은 화일이름으로 저장된 정보가 있습니다.";
}


function fileSave() {
    $file = fopen("data.txt","a+");
    $fileName_ = $_POST["name"]."\n";
    $fileValue_ = $_POST["value"]."\n";
    fwrite($file, $fileName_);
    fwrite($file, $fileValue_);
    fclose($file);
}

function fileCheck() {
    if ($_SERVER["REQUEST_METHOD"] != "POST"){
        return false;
    }
    if($_POST["name"] == "" || $_POST["value"] == "") return false;
    if(!is_file("data.txt")) return true;
    $file = fopen("data.txt", "r");
    $fileName_ = $_POST["name"];
    while(!feof($file)) {
        // 문자열 읽고 개행문자 삭제
        $checkName = fgets($file);
        $checkName = preg_replace('/\r\n|\r|\n/','',$checkName);
        if(strcmp($fileName_, $checkName) == 0) {
            fclose($file);
            return false;
        }
    }
    fclose($file);
    return true;
}
?>
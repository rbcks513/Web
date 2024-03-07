<?php

if(!fileVildation()) {
    echo "잘못된 입력입니다.";
}  else  {
    $infoArray = makeArray();
    $serchName = $_POST["name"];
    $serchVoka = $_POST["voka"];
    $nameArray = searchName($serchName);
    if(is_array($nameArray))  {
        foreach($nameArray as $name) {
            $value = makeArray()[$name];
            $num = searchValue($value, $serchVoka);
            if ($num > 0){
                // 정렬전 찾은 값들 임시 저장
                $temp[$name] = $value;
                // 정렬하기 위한 동일 개수 저장
                $numValue[$name] = $num;
            }
        }
        if($_POST["arrange"] == "up") {
            if(is_array($temp)) {
                if(is_array($numValue)) {
                    asort($numValue);
                    foreach($numValue as $key => $value) {
                    echo $key;
                    echo " : ";
                    echo $temp[$key];
                    echo "<br>";
                    }
                }
            }
        }
        if($_POST["arrange"] == "down") {
            if(is_array($temp)) {
                if(is_array($numValue)) {
                    arsort($numValue);
                    foreach($numValue as $key => $value) {
                    echo $key;
                    echo " : ";
                    echo $temp[$key];
                    echo "<br>";
                    }
                }
            }
        }
    }
}


function fileVildation() {
  if($_SERVER["REQUEST_METHOD"] != "POST") return false; 
  if($_POST["name"] == "" || $_POST["voka"] == "") return false;
  if(!$_POST["arrange"]) return false;
  return true;
}
function makeArray() {  // data.txt를 배열로 만든다
    $file = fopen("data.txt", "r");
    while(!feof($file)) {
        //  문자열 읽고 개행문자 삭제
        $nameKey = fgets($file);
        $nameKey = preg_replace('/\r\n|\r|\n/','',$nameKey); 
        $value = fgets($file);
        $value = preg_replace('/\r\n|\r|\n/','',$value); 
        $array[$nameKey] = $value;
    }
    fclose($file);
    return $array;
}
function keyArray(){  // data.txt의 파일이름으로만 배열
    $file = fopen("data.txt", "r");
    while(!feof($file)) {
        //  문자열 읽고 개행문자 삭제
        $nameKey = fgets($file);
        $nameKey = preg_replace('/\r\n|\r|\n/','',$nameKey); 
        $value = fgets($file);
        $array[] = $nameKey;
    }
    fclose($file);
    return $array;
}

function searchName($name) {
    $keyArray = keyArray();
    foreach($keyArray as $key)
    if(strpos($key, $name) !== false) {
    $array[] = $key;
    }
    return $array;
}

function searchValue($value, $voka) {  // 문열 쪼개서 비교
  $match  = 0;
  $array = explode(" ", $value);
  foreach($array as $str) {
    if(strcasecmp($str, $voka) == 0){
    $match++;
    }
  }
  return $match;
}
?>
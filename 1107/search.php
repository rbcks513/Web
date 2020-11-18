<?php
//  JSON파일에서 불러오기
$myData = file_get_contents("data.json");
$search = json_decode($myData, true);

//  HTML에서 JSON으로 전달받은 key값
$key = file_get_contents('php://input');
$arrayKey = json_decode($key, true);
$dataKey = $arrayKey["key"];

//  title만 있는 임시배열 temp 설정
foreach($search as $titles) {
    $temp[] = $titles["title"];
}

//  제목 string으로 검색 및 출력
foreach($temp as $string) {
    if($dataKey != NULL){
        if(stristr($string, $dataKey)){
            $tempString[] = stristr($string, $dataKey);
        }
    }
}
//  JSON으로 변환후 전달
$resultData = json_encode($tempString);
echo $resultData;
?>
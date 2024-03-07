
<?php
  //  post로 보낸 파일 받기
  $data = file_get_contents('php://input');
  saveData($data);

function saveData($data) {
  // 파일이 존재하지 않을 때
  if(!is_file("data.json")) {
    $file = file_put_contents("data.json", $data);
    echo "저장되었습니다.";
    return 0;
  }

  //  파일이 존재할 때
  if(is_file("data.json")) {
      $addObj = file_get_contents("data.json",true);
      
  //  기존 배열 나누어 합친배열에 저장
      $temp[] = json_decode($addObj,true);
      foreach($temp as $add) {
        foreach($add as $dData){
  //  두번째 가입 자의 경우 배열 
          if(!is_array($dData)) {
            $mergeData[] = $add;
            break;
          }
          $mergeData[] = $dData;
        }
      }
      $mergeData[] = json_decode($data, true);
      $resultData = json_encode( $mergeData );
  //  JSON파일로 저장
      $cData = file_put_contents("data.json", $resultData);
      echo "저장되었습니다.";
      return 1;
    }
}

?>
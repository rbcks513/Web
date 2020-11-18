<?php
  
  savePerson($_POST["ID"],$_POST["PW"]);
  
  function findPerson($ID, $PW) {
    //  파일이 존재하지 않을 때
    if(!is_file("./data/person.json")) return 3; 
    
    $myObj = file_get_contents("./data/person.json"); 
    $search = json_decode($myObj, true);
    //  문자 비교 위해 임시 배열 생성
    foreach($search as $person) {
    //  배열이 한개만 저장되어 있는 경우()
      if(!is_array($person)) {
        if($search["id"] == $ID) {
          if($search["pw"] == $PW) return 0;
          return 1;
        }
        break;
      }
      if($person["id"] == $ID) {
        if($person["pw"] == $PW) {
    //  아이디와 비밀번호가 동일할 때
          return 0;
        }
    //  동일 아이디가 존재할 때    
      return 1;
      }     
    } 
    //  존재하나 동일한 값이 없을 때
    return 2;
  }

  function savePerson($ID, $PW) {
    //findperson 먼저
    $case = findPerson($ID, $PW);  
    
    if(!isset($myObj)) $myObj = new stdClass();
    $myObj->id=$ID;
    $myObj->pw=$PW;
    $save = json_encode($myObj);

    // 파일이 존재하지 않을 때
    if($case == 3)  {
      $add = file_put_contents("./data/person.json", $save);
      echo "회원가입이 완료되었습니다.<br>";
      echo $save;
    }
    // 파일이 존재할 때
    if($case == 2) {
        $addObj = file_get_contents("./data/person.json",true);
    //  기존 배열 나누어 합친배열에 저장
        $temp[] = json_decode($addObj,true);
        foreach($temp as $add) {
          foreach($add as $person){
    //  두번째 가입 자의 경우 배열 
            if(!is_array($person)) {
              $mergeJSON[] = $add;
              break;
            }
            $mergeJSON[] = $person;
          }
        }
        $mergeJSON[] = json_decode($save, true);
        $resultJSON = json_encode( $mergeJSON );
        $add = file_put_contents("./data/person.json", $resultJSON);
        echo "회원가입이 완료되었습니다.<br>";
      }
    if($case == 0) {
      echo "이미 아이디가 존재합니다.";
    }
    if($case == 1) {
      echo "이미 아이디가 존재합니다.";
    }
  }
    
?>

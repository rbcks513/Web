<?php
  
  loginPerson($_POST["ID"],$_POST["PW"]);
  
  function findPerson($ID, $PW) {
    //  파일이 존재하지 않을 때
    if(!is_file("./data/person.json")) return 3; 
    
    $myObj = file_get_contents("./data/person.json"); 
    $search = json_decode($myObj, true);
    
    //  문자 비교 위해 임시 배열 생성
    foreach($search as $person) {
    //  배열이 한개만 저장되어 있는 경우
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

  function loginPerson($ID, $PW) {
    //findperson 먼저
    $case = findPerson($ID, $PW);  
    if($case == 2 || $case == 3)  {
      echo "입력하신 id가 존재하지 않거나 패스워드가 틀립니다.";
    }
    if($case == 0) {
      echo $ID."님 로그인이 되었습니다.<br>";
      $link =  "'PWchange.html'";
      print '<br><input type="button" value="비밀번호 변경" onClick = "location.href = '.$link.'">';
      session_start();
      $_SESSION['id'] = $ID;
    }
    if($case == 1) {
      echo "입력하신 id가 존재하지 않거나 패스워드가 틀립니다.";
    }
  }
?>

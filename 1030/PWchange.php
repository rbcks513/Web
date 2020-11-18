<?php
session_start();
$ID = $_SESSION['id'];
$cPW = $_POST["PW"];
findNchange($ID, $cPW);

function findNchange($ID, $PW) {
    
  $myObj = file_get_contents("./data/person.json"); 
  $search = json_decode($myObj, true);
  //  원하는 person에 접속
  foreach($search as $person) {
    //  해당 ID의 PW를 변경
    if ($person["id"] == $ID) {
      $person["pw"] = $PW;
    }
    echo var_dump($person);
    $temp[] = $person;     
  }
  $reWrite = json_encode($temp);
  $new = file_put_contents("./data/person.json", $reWrite);
}
?>
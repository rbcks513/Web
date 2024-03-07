<!DOCTYPE html>
<html>
<body>
<h2>숫자 맞추기 게임</h2>
당신이 생각한 숫자를 컴퓨터가 맞추는 게임입니다.<br><br>

<?php
$userNumber = 10;                   // 당신이 생각하는 숫자를 넣으시오.

$opportunity = 1;
$isCheck =  array();

$correct = 0;


while($opportunity <= 15){
  numgame();

  if($correct == $userNumber){
    break;
  }
}


function numgame() {
  $random_value = rand(1, 15);

  global $isCheck;

  if(!isset($isCheck[$random_value])){
    if($GLOBALS['userNumber'] == $random_value){
      echo "The number is {$random_value}<br/>\n";
      echo "correct<br/>\n";
      echo "<br/>\n";
      echo "Game opportunity : {$GLOBALS['opportunity']} times<br/>\n";
      $GLOBALS['correct'] = $random_value;
    }
    else{
      echo "The number is {$random_value}<br/>\n";
      echo "fail<br/>\n";

      $GLOBALS['opportunity'] += 1;
      $isCheck[$random_value] = 1;
    }
  }

}

#/Library/WebServer/Document -> localhost address

?>
</body>
</html>

<!DOCTYPE html>
<html>
<body>
<h2>숫자 맞추기 게임</h2>
당신이 생각한 숫자를 컴퓨터가 맞추는 게임입니다.<br><br>

<?php
$userNumber = 7;                   // 당신이 생각하는 숫자를 넣으시오
for($i = 0; $i < 15; $i++) {
    if(numgame()) {
        echo "correct!!<br>";
        echo "Game opportunity ".$i." times<br>";
    break;
    }
    else echo "false<br>";
}

function numgame() {
 static $used = array();
 global $userNumber;
 $computer = rand(1,15);
 while(isset($used[$computer])) {
    $computer = rand(1,15);
 }
 $used[$computer] = "used";
 echo "this number is ".$computer."<br>";
 if($userNumber === $computer) return true; 
 else return false;
}
?>
</body>
</html>

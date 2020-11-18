<!DOCTYPE html>
<html>
<body>
<h2>숫자 맞추기 게임</h2>
당신이 생각한 숫자를 컴퓨터가 맞추는 게임입니다.<br><br>

<?php
$userNumber = 7;                   // 당신이 생각하는 숫자를 넣으시오
for($i = 0; $i < 15; $i++) {
    if(numgame()) {
        echo "\ncorrect!!";
        echo "\nGame opportunity ".$i." times";
    break;
    }
    else echo "false";
}

function numgame() {
 $computer = rand(1,15);
 echo "this number is ".$computer;
 if($userNumber == $computer) retrun true;
 else return false;
}
?>
</body>
</html>

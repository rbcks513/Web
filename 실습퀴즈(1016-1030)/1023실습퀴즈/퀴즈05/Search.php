<?php
  $s_name  = $word =$sort= "";

  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $s_name = test_input($_GET["search_name"]);
    $word=test_input($_GET["search_word"]);     
    $sort=test_input($_GET["sort"]); 
  }//validation
  $file_path = "./data.txt";
  $file = fopen("data.txt","r"); 
  $temp_arr=file($file_path,FILE_IGNORE_NEW_LINES);
$arr=array();
for($i=0; $i<count($temp_arr); $i=$i+2){
  $arr[htmlspecialchars($temp_arr[$i])] = htmlspecialchars($temp_arr[$i+1]);
}
//이름과 내용은 대소문자 구분이 안되도록

//이름먼저 검사 strcasecmp 로 두문자를 검사하는데 
//내용을 공백으로 나눠서 단어별로 저장해 놓은걸 

$s_arr=array();//검색으로 찾은 이름과 내용

$num_arr=array();
foreach ($arr as $key=>$value){
    $lowerkey=strtolower($key);
    $lowers_name=strtolower($s_name);
    if(strpos($lowerkey,$lowers_name)!==false){//이름 대소문자 구분하여 두개의 스트링 비교하는 함수
        $num=0;
        $token=explode(" ",$value);
        for($i=0; $i<count($token);$i++){
           
            if(strcasecmp($token[$i],$word)==0){//검색내용이 포함 되어있는 value이면
                $num++;//찾은거 개수
                $s_arr[$key] = $value;
                $num_arr[$key]=$num;
               
            }
        }
      
    }
} 
//선택한 정렬에 따라 프린트
if($sort=="order"){
    asort($num_arr);//내용(개수)으로 정렬
    //print_r($num_arr);
    foreach($num_arr as $key=>$num){
        echo"<li>" .$key.": ".$s_arr[$key]."</li>";
        
    }
}else if($sort=="reverse"){//내림차순
    arsort($num_arr);
    //print_r($num_arr);
    foreach($num_arr as $key=>$num){
        echo "<li>".$key.": ".$s_arr[$key]."</li>";
    }

}

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>
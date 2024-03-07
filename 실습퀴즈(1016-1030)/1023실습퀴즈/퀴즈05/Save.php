<html>
    <head>

    </head>
    <body>
        
    <?php
   
   $fName  = $text = "";

   if ($_SERVER["REQUEST_METHOD"] == "GET") {
     $fName = test_input($_GET["file_name"]);
     $text=test_input($_GET["file_text"]);      
   }//validation

    $file_path = "./data.txt";
    $file = fopen("data.txt","a"); 
    $temp_arr=file($file_path,FILE_IGNORE_NEW_LINES);
$arr=array();


for($i=0; $i<count($temp_arr); $i=$i+2){
    $arr[htmlspecialchars($temp_arr[$i])] = htmlspecialchars($temp_arr[$i+1]);
}



if(  array_key_exists($fName , $arr) ){ //파일이름이 있으면 저장되면 안됨
 echo "저장되지 않았습니다." . "<br>" . "이전에 같은 화일이름으로 저장된 정보가 있습니다.";
}
else{
    $is_write =fwrite($file, $fName . "\n" . $text . "\n" );//파일이름 없어서 저장됨
    echo "저장되었습니다.";
}
   
    

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>
    </body>
</html>



StudentInfo.prototype.avg = function(k,m,e,s,h) {
  var sum = 0;
  var sub = 0;
  
  if(k != 0) {sum = sum + Number(this.infoArray[1]); sub++;}
  if(m != 0) {sum = sum + Number(this.infoArray[2]); sub++;}
  if(e != 0) {sum = sum + Number(this.infoArray[3]); sub++;}
  if(s != 0) {sum = sum + Number(this.infoArray[4]); sub++;}
  if(h != 0) {sum = sum + Number(this.infoArray[5]); sub++;}
  console.log(sum);
  console.log(sub);
  var avg = sum/sub;
  
  return avg;
};
// avg함수에 넘기기 위해서
var checkArray = [0,0,0,0,0]; 
// 로딩시 실행
window.addEventListener('DOMContentLoaded', starting());
var submit = document.getElementById("submit");
var form = document.getElementById("form");
submit.addEventListener("click",  function(event) {
  event.preventDefault();
  var checked = checkbox();
  // 제출된 form에서 가져오기
  var who = form.elements.item(0).value;  
  // control by name
  if(nameArray[who] != null){
    if(checked==0){  // 체크된 것이 없는 경우
      alert("Please select a subject or subjects");
      return;
    }
    var resultAVG = nameArray[who].avg(checkArray[0],checkArray[1],checkArray[2],checkArray[3],checkArray[4]);
    var result = "Student’s name is " + who + ", Average is "+resultAVG.toFixed(1);
    alert(result);
  } else if(who == "") {  // 학생이름을 입력하지 않았을 때
    if(checked==0){  // 체크된 것이 없는 경우
      alert("Please select a subject or subjects");
      return;
    }
    avgAll();
  } else {  // 잘못된 입력이 되었을 때
    alert("The name dose not exist");
  }

});

// 이름을 입력받아서 각 해당 값들 저장함
function StudentInfo(pname) { 
  var id = document.getElementById(pname);
  this.name = id.childNodes[1].childNodes[0].nodeValue;
  this.korean = id.childNodes[3].childNodes[0].nodeValue;
  this.math = id.childNodes[5].childNodes[0].nodeValue;
  this.english = id.childNodes[7].childNodes[0].nodeValue;
  this.society = id.childNodes[9].childNodes[0].nodeValue;
  this.history = id.childNodes[11].childNodes[0].nodeValue;
  this.infoArray = [this.name, this.korean, this.math, this.english, this.society, this.history];
}

function starting() {
  var trs = document.getElementsByTagName("tr");
  nameArray = new Array();
  // nameArray의 key값들을 가지고 있는 배열
  keyArray = new Array();
  for(var i= 1;i<trs.length;i++) {// 첫번째는 id를 가지고 있지 않기때문에 i = 1
    var x =  trs[i].childNodes[1].childNodes[0].nodeValue;
    keyArray[i-1] = x;
    nameArray[x] = new StudentInfo(x);
  }
  document.getElementById("table").remove(); //  표 삭제  
}

// 모든 학생 평균
function avgAll() {
  // 평균의 합
  var sumAll = 0; 
  for(var i= 0;i<keyArray.length;i++) {// 첫번째는 id를 가지고 있지 않기때문에 i = 1
    var x =  keyArray[i];
    sumAll = sumAll + nameArray[x].avg(checkArray[0],checkArray[1],checkArray[2],checkArray[3],checkArray[4]);
  }
  var result = sumAll/keyArray.length;
  alert("The average of all students’ subject grades is +"+ result.toFixed(1));
}
// 체크박스확인용
function checkbox(){
	var boxes = document.getElementsByName("subject");
  var checked = 0;
  checkArray = [0,0,0,0,0]; // avg함수에 넘기기 위해서

	for(i=0;i<boxes.length;i++){
		if(boxes[i].checked==true){
      checked +=1;
      checkArray[i] = 1;
		}
  }
  return checked;
}
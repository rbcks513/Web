var id_Cookie = getCookie("id");
var login = false;


var button = document.getElementById("Join");
button.addEventListener("click",  Show_Form);

var button = document.getElementById("Add");
button.addEventListener("click",  Show_Add_Form);
button.addEventListener("click",  Save_on);

var button = document.getElementById("Logout");
button.addEventListener("click",  Logout);

window.addEventListener('DOMContentLoaded', function(){
  Login_Check();
  Add_control();
  var result = document.getElementById("result");
  result.innerHTML = id_Cookie;
  
});
  function Add_control() {
    if(login) Add_on();
    else Add_off();
  }
  
  function Add_on() { // add버튼 상태 on
    var btn = document.getElementById("Add");
    btn.disabled = false;
  }

  function Add_off() { // add버튼 상태 off
    var btn = document.getElementById("Add");
    btn.disabled = "disabled";
  }
  function Save_on() { // save버튼 상태 on
    var btn = document.getElementById("btn_save");
    btn.disabled = false;
  }

  function Show_Add_Form() { // add form 보여주기
    document.getElementById("date_form").style.display="block";
  }
  function Hide_Add_Form() { // add form 숨기기
    document.getElementById("date_form").style.display="none";
  }

  function Show_Form() {  // login form 보여주기
    document.getElementById("login_form").style.display="block";
  }

  function getCookie(name) { // 쿠키 가져오기 
    var value = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
    return value? value[2] : null;
  }

  function Show_id() { // 아이디 출력해주기
    alert(id_Cookie);
  }

  function Login_Check() { // 로그인 상태 체크
    if(document.cookie == "") {
      login = false;
      return false;
    } else {
      login = true;
      return true;
    }
  }
  
  function Logout() { // 로그아웃 할 때 
    if(!Login_Check()) {alert("아직 로그인 되지 않음");
    } else {
      cookie(); 
      alert("로그아웃이 되었습니다.")
      window.location.reload();
    }
  }

  function cookie() {
    document.cookie.split(";").forEach(function(c) { document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/"); });
  }// 내 형식으로 바꾸기 
  

  
 
    
    
    
   
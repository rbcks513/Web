

function Show_Date() {
    var date = new Date();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();
    var today = date.getDate();  // 날짜
    var day = date.getDay();  // 요일
    var title = year + "년 "+ month + "월";
    document.getElementById("table_title").innerHTML= title;
    // tr에서 th에 하나씩 전달
    week(today,day);
  }

  function week(today, day){ // 달력에 요일에 맞게 날짜 표시
    var week = [0,0,0,0,0,0,0];
    for(;day>=0;day--) {
        week[day] = today;
        today = today - 1;
    }
    for(;day<7;day++) {
        week[day] = today;
        today = today + 1;
    }
    var tr = $("#tr_date");
    for(var i = 0; i < 7; i++) {
    tr.children("th").eq(i).children("text").prepend(week[i]).css("color","red");
    }

    return week;
  }
  function Call_Schedule(date, time, title, description) {
    // dDate = new Date(date);
    // scheduled_Date = dDate.getDate();
    // scheduled_Day = dDate.getDay();
    //week(scheduled_Date,scheduled_Day);
    alert(date+" "+time+" "+title+" "+description);
  }

  function save_Schedule() { // 스캐줄이 있으면 스캐줄 호출 없으면 없다고 출력

  }
  function make_Schedule(parent, schedule) {
    var box = document.createElement("div");
    box.id = schedule.title;
    box.classList.add("schedule_box"); // 스캐줄 이름으로 
    box.textContent ="test"; // 스캐줄 
    parent.appendChild(box);
  }

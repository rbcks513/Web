var i=0;

function timedCount() {
    i=i+1;
    postMessage(i);
    setTimeout("timedCount()", 1000);
}

timedCount();
  // 출처 https://www.w3schools.com/html/html5_webworkers.asp
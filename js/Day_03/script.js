//1
function pressedKey(e) {
  alert(e.code);
}
function mouseType(e) {
  alert(e.button);
}
//______________________________________________________
//2
let intervalTime;
function displayTime() {
  alert("Clock Started");
  intervalTime = setInterval(function () {
    let time = new Date();
    //console.log(time);
    document.getElementById("div1").innerHTML = time.toLocaleTimeString();
  }, 1000);
}
function stopTime(e) {
  if (e.altKey && e.code == "KeyW") {
    clearInterval(intervalTime);
    alert("Clock stopped");
  }
}
//______________________________________________________
//5
let newWindow;
function popup() {
  setTimeout(function () {
    newWindow = window.open("", "", "width=600,height=400");
    newWindow.document.writeln("<p>asssssfjkllafdf;ioase</p>");
  }, 3000);
}

function closepage() {
  newWindow.close();
}
//______________________________________________________
//7
let name = getElementById("firstname");
function KeycodeCheck(e) {
  if (
    (e.keyCode >= 65 && e.keyCode <= 90) ||
    (e.keyCode >= 97 && e.keyCode <= 122)
  ) {
    return true;
  } else {
    e.preventDefault();
  }
}

"use strict";
//1
//alert("welcome to my site");

//var name = prompt("please Enter your name");
//document.write("welcome " + name);
//_________________________________________________
//2
// function sum(num1,num2){
//     return (num1+num2);
// }

// function takeNumbers(){
//     var num1 = Number(prompt("enter first number"));
//     var num2 = Number(prompt("enter second number"));
//     var res = sum(num1,num2);
//     console.log(res);
// }

//______________________________________________________
//3

// function tempreture(temp) {
//   (temp >= 30) ? console.log("HOT") : console.log("Cold");
// }

// tempreture(50);
// tempreture(20);
//_____________________________________________________
//4
// function Temperature(temp, actual) {
//   console.log(
//     temp >= 25 && temp <= 30 && actual >= 25 && actual <= 30
//       ? "normal"
//       : temp < 25 && actual < 25
//       ? "cold"
//       : temp > 30 && actual > 30
//       ? "Hot"
//       : "Ambiguous, can't detect "
//   );
// }

//better to use if else becuase we use ranges
// function Temperature(temp, actual) {
//   switch (true) {
//     case temp >= 25 && temp <= 30 && actual >= 25 && actual <= 30:
//       console.log("normal");
//       break;

//     case temp < 25 && actual < 25:
//       console.log("cold");
//       break;

//     case temp > 30 && actual > 30:
//       console.log("hot");
//       break;

//     default:
//       console.log("Ambiguous, can’t detect");
//   }
// }

// Temperature(26, 28); //normal
// Temperature(22, 21); //cold
// Temperature(33, 44); //hot
// Temperature(20, 30); //ambiguous
console.log("###################################");
//______________________________________________________
//5
function checkFaculty(factulty) {
  switch(factulty){
    case "FCI":
      console.log("You’re eligible to Programing tracks");
      break;
    case "Engineering":
      console.log("You’re eligible to Network and Embedded tracks");
      break;
    case "Commerce":
      console.log("You’re eligible to ERP and Social media tracks");
      break;
    default:
      console.log("You’re eligible to SW fundamentals track");
  }
}
checkFaculty("FCI");
checkFaculty("Engineering");
checkFaculty("Commerce");
checkFaculty("Art");
console.log("###################################");
//________________________________________________________
//6
function printOdd(start,end) {
  for(var i=start; i<=end;i++){
    if(i % 2 != 0){
      console.log(i);
    }
  }
}
printOdd(1,10);
console.log("###################################");
//__________________________________________________________
//7
function excuteExpression(exp){
  return eval(exp);
}
function expression(){
  var exp = prompt("enter math expression");
  var res = excuteExpression(exp);
  alert(`the result = ${res}`);
}
console.log("###################################");
//____________________________________________________________
//8
// let name;
// let birthYear;

// do {
//   name = prompt("Enter your name");
// } while(!isNaN(name) || name.trim() === "");

// do {
//   birthYear = prompt("Enter your birth year");
// }while(isNaN(birthYear) || birthYear >= 2010 || birthYear.trim() === "");

// let currentYear = 2025;
// let age = 2025 - birthYear;

// document.writeln(`<br><b><u>Name:</u></b> ${name}<br>`);
// document.writeln(`<b><u>Birth year:</u></b> ${birthYear}<br>`);
// document.writeln(`<b><u>Age:</u></b> ${age}<br>`);
console.log("###################################");
//________________________________________________________________________
//9
// console.log("Start program");

// debugger;  

// console.log("Hello user");

// debugger;     

// console.log("End program");
//________________________________________________________________________
//10

// var y;
// y=10;
// x=5;
// console.log(x,y);
// var x;
console.log("###################################");
//__________________________________________________________
//1
// function foo() {
//     var x;
//     x = 5;
//     y = 6; //refrence error in strict mode   
//     return x + y;
// }
// console.log(foo());
console.log("###################################");
//____________________________________________________________
//2
// var y;	
// y=10; 
// x = 5; 
// console.log(x); 
// console.log(y); 
// var x;   //hiosting
console.log("###################################");

//_______________________________________________
//3
// var x = 5; 
// console.log(x); 
// console.log(y); // undefined because the declaration only is hiosted
// var y = 7; 
//________________________________________________________
//4
function test(){
	for (let i = 0; i < 10; i++) {
  	  alert(i);
		  alert (x); //refrence error
		  let x=10;  //not hoisted
	}
console.log(i); //not hoisted () refernce error
}


test();
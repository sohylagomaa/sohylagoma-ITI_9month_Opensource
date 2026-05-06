//1
let arr = [
  "tip01",
  "tip02",
  "tip03",
  "tip04",
  "tip05",
  "tip06",
  "tip07",
  "tip08",
  "tip09",
  "tip10",
];

const randomIndex = Math.floor(Math.random() * 10);

document.write(`<h2>${arr[randomIndex]}</h2>`);
//______________________________________________________
//2
function currentDate() {
  let date = new Date();
  return date;
}
function displayDate() {
  document.writeln(currentDate().toLocaleString());
}
//________________________________________________________
//3
// let email = prompt("Plz, Enter your Email");

// function checkValidation(email) {
//   if (email.includes("@")) {
//     if (email.at(0) !== "@" && email.at(email.length - 1) !== "@") {
//       console.log("valid Email");
//     } else {
//       console.log("not valid email");
//     }
//   } else {
//     console.log("not valid email");
//   }
// }
// checkValidation(email);
//_______________________________________________________
//4
// let fullName;
// let email;

// const regexName = /^[a-zA-Z]{4,}(\s[a-zA-Z]{4,})*$/;

// while (true) {
//   fullName = prompt("Plz, Enter your fullName");
//   if (regexName.test(fullName)) {
//     break;
//   } else {
//     alert("not Valid name");
//   }
// }

// const regexEmail = /^[a-zA-Z]+@[a-zA-Z|0-9]+\.(com|net|edu|org)\.eg$/;

// while (true) {
//   email = prompt("Plz, Enter your Email");
//   if (regexEmail.test(email)) {
//     break;
//   } else {
//     alert("not Valid email");
//   }
// }
//_______________________________________________________
//6

let grades = [60, 100, 10, 15, 85];

grades.sort(function (a, b) {
  return b - a;
});
console.log(grades);

let maxEle = grades.find(function (grade) {
  if (grade <= 100) return grade;
});
console.log(maxEle);

let less_60 = grades.filter(function (grade) {
  if (grade < 60) return grade;
});
console.log(less_60);
//_____________________________________________________
//7
let students = [
  { Name: "Sohyla", Degree: 100 },
  { Name: "Ahmed", Degree: 60 },
  { Name: "Roba", Degree: 10 },
  { Name: "Mohamed", Degree: 85 },
  { Name: "Batool", Degree: 15 },
];
//a
let topStudent = students.find(function (student) {
  return student.Degree >= 90 && student.Degree <= 100;
});
console.log("Top Student", topStudent.Name);

let bottomStudents = students.filter(function (student) {
  return student.Degree < 60;
});
//b
console.log("students lees 60");
for (i in bottomStudents) {
  console.log(bottomStudents[i].Name);
}
//c
students.push({ Name: "Hamza", Degree: 70 });

console.log("c#########################");
for (let i in students) {
  console.log(students[i].Name);
}
//d
students.pop();
console.log("d#########################");
for (let i of students) {
  console.log(i.Name);
}
//e
students.sort(function (a, b) {
  if (a.Name > b.Name) return 1;
  if (a.Name < b.Name) return -1;
  return 0;
});
console.log("e#########################");
for (let i of students) {
  console.log(i.Name);
}
//_______________________________________________________
//8
let birthDate = prompt(
  "enter the date in the following format (DD – MM – YYYY) ex. 22–01–1999, "
);

function validateAndShowDate(birthDate) {
  if (birthDate.length !== 10) {
    alert("Wrong Date Format");
    return;
  }
  if (birthDate.charAt(2) !== "-" || birthDate.charAt(5) !== "-") {
    alert("Wrong Date Format");
    return;
  }

  var day = parseInt(birthDate.substring(0, 2));
  var month = parseInt(birthDate.substring(3, 5)) - 1;
  var year = parseInt(birthDate.substring(6, 10));

  var dateObj = new Date(year, month, day);
  alert("Your Birth Date is: " + dateObj.toDateString());
}
//9
function showBirthDate() {
  try {
    var input = prompt("Enter your birth date (DD-MM-YYYY):");
    validateAndShowDate(input);
  } catch (error) {
    alert("An error occurred: " + error.message);
  }
}

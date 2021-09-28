function clock() {
let date = new Date();
let hrs = date.getHours();
let mins = date.getMinutes();
let period = "AM";

if (hrs == 0) hrs = 12;
if (hrs > 12) {
hrs = hrs - 12;
period = "PM";
}

hrs = hrs < 10 ? `0${hrs}` : hrs;
mins = mins < 10 ? `0${mins}` : mins;

let time = `${hrs}:${mins} ${period}`;
setInterval(clock, 1000);
document.getElementById("clock").innerText = time;
}

clock();


var timeoutInMilliseconds = 60000;
var timeoutID;

function startTimer(){
    window.setTimeout(doInactive,timeoutInMilliseconds);
}

function doInactive(){
    //perform ajax call to stop session
}

function resetTimer() {
    window.clearTimeout(timeoutID);
    startTimer();
}

function setupTimer(){
    document.addEventListener("mousemove",resetTimer,false);
    document.addEventListener("mousedown",resetTimer,false);
    document.addEventListener("keypress",resetTimer,false);
    document.addEventListener("touchmove",resetTimer,false);

    startTimer();
}

$(document).ready(function () {
    setupTimer();
});
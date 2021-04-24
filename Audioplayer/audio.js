var play = false;
var a = document.getElementById("audio");
var startTime = 0;
var endTime = a.duration;

function playPause()
{
    if (play === true)
    {
        play = false;
        a.pause();
    }
    else
    {
        play = true;
        a.play();
    }
}

function rewind()
{
    a.currentTime = (a.currentTime - 5);
}
function forward()
{
    a.currentTime = (a.currentTime + 5);
}

function changeSecondsToTime(secs) 
{
    var hr  = Math.floor(secs / 3600);
    var min = Math.floor((secs - (hr * 3600))/60);
    var sec = Math.floor(secs - (hr * 3600) -  (min * 60));
  
    if (min < 10){ 
      min = "0" + min; 
    }
    if (sec < 10){ 
      sec  = "0" + sec;
    }
    return min + ':' + sec;
  }
function displaySongTime(title)
{
    var cur = document.getElementById('current');
  
    var current = Math.floor(title.currentTime).toString(); 
    var duration = Math.floor(title.duration).toString();
  
    cur.innerHTML = changeSecondsToTime(current) + " / " + changeSecondsToTime(duration);
}

function changeTitle(titlebutton)
{
    switch (titlebutton.id) 
    {
        case "song1":
            a.currentTime = 0;
            startTime = 0;
            endTime = 90;
            break;
        case "song2":
            a.currentTime = 91;
            startTime = 91;
            endTime = 181;
            break;
        case "song3":
            a.currentTime = 182;
            startTime = 182;
            endTime = 272;
            break;
        case "song4":
            a.currentTime = 273;
            startTime = 273;
            endTime = 362;
            break;
        case "song5":
            a.currentTime = 363;
            startTime = 363;
            endTime = a.duration;
            break;
    }
}
function stopTitle()
{
    if (a.currentTime >= endTime)
    {
        a.pause();
        a.currentTime = startTime;
    }
}
setInterval(stopTitle, 500);
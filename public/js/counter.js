var timer;
var count = 60;

document.getElementById("counter").innerHTML = count;

timer = setTimeout(update, 1000);

function update()
{
    if (count > 0)
    {
       document.getElementById("counter").innerHTML = --count;
       timer = setTimeout(update, 1000);
    }
    else
    {
        var answers = (document.getElementById("answers").value);
        if(answers)
        {
            document.getElementById("submit-btn").click();
        }
        else
        {
            document.getElementById("answers").value = "timeout...";
            document.getElementById("submit-btn").click();
        }
    }
}
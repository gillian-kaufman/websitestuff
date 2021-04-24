var startbtn = document.getElementById("makeBtn");
startbtn.addEventListener("click", generateBtn);
var numBtn = 0;
let add = 0;
let total = 0;

function generateBtn()
{
    var color = document.getElementById("colors").value;
    var btn = document.createElement("button")
    btn.innerHTML = Math.floor(Math.random() * 10);
    btn.style.position = "absolute";
    var x_pos = Math.floor(Math.random() * 899) + 100;
    var y_pos = Math.floor(Math.random() * 800) + 250;
    btn.style.left = x_pos + 'px'; 
    btn.style.top = y_pos + 'px';
    btn.style.borderRadius = '10px';
    btn.style.backgroundColor = color;
    btn.style.color = "black";
    btn.className = "btn btn-secondary"
    btn.id = ++numBtn;

    //button created
    document.body.appendChild(btn);
    btn.onclick= function()
    {
        var color=document.getElementById("colors").value;
        this.style.backgroundColor = color;
        console.log(this.id);
        add = parseInt(this.innerHTML)
        total += add;
        add = Math.floor(Math.random() * 888) + 100;
        document.getElementById("total").innerHTML = total;
        this.innerHTML = add;
    }
}



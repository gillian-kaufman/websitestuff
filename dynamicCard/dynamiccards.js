//document.write override
document.write = function(s){
   var scripts = document.getElementsByTagName('script');
   var lastScript = scripts[scripts.length - 1];
   lastScript.insertAdjacentHTML("beforebegin", s);
}
//Button functionality
var firstbtn = document.getElementById("addBtn");
firstbtn.addEventListener("click", createCard);
var secondbtn = document.getElementById("displayBtn");
secondbtn.addEventListener("click", displayCards);

//Declare variables
var cards = new Array();
var i = 0;
var j = 0;

// define the functions
function printCard() {
   var nameLine = "<br> <strong>Name: </strong>" + this.name + "<br>";
   var birthdateLine = "<strong>Birthdate: </strong>" + this.birthdate + "<br>";
   var emailLine = "<strong>Email: </strong>" + this.email + "<br>";
   var addressLine = "<strong>Address: </strong>" + this.address + "<br>";
   var phoneLine = "<strong>Phone: </strong>" + this.phone + "<hr>";
   document.write(nameLine + birthdateLine + emailLine + addressLine + phoneLine);
}
function Card(name, birthdate, email, address, phone) {
   this.name = name;
   this.birthdate = birthdate;
   this.email = email;
   this.address = address;
   this.phone = phone;
   this.printCard = printCard;
}
function createCard()
{
   //Prompt for variables
   var n = prompt("Enter the Name", "");
   var b = prompt("Enter the Birthdate", "");
   var e = prompt("Enter the Email", "");
   var a = prompt("Enter the Address", "");
   var p = prompt("Enter the Phone Number", "");

   //Create card variables and store in array
   var card = new Card(n, b, e, a, p);
   cards[i] = card;
   ++i;
}
function displayCards()
{
   for (j; j < cards.length; ++j)
   {
      cards[j].printCard();
   }
}
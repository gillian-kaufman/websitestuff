// define the functions
function printCard() {
   var nameLine = "<strong>Name: </strong>" + this.name + "<br>";
   var birthdateLine = "<strong>Birthdate: </strong>" + this.birthdate + "<br>";
   var emailLine = "<strong>Email: </strong>" + this.email + "<br>";
   var addressLine = "<strong>Address: </strong>" + this.address + "<br>";
   var phoneLine = "<strong>Phone: </strong>" + this.phone + "<hr>";
   document.write(nameLine, birthdateLine, emailLine, addressLine, phoneLine);
}

function Card(name, birthdate, email, address, phone) {
   this.name = name;
   this.birthdate = birthdate;
   this.email = email;
   this.address = address;
   this.phone = phone;
   this.printCard = printCard;
}

// Create the objects
var sue = new Card("Sue Suthers", "6/7/1995", "sue@suthers.com", "123 Elm Street, Yourtown ST 99999", "555-555-9876");
var fred = new Card("Fred Fanboy", "5/20/1985","fred@fanboy.com", "233 Oak Lane, Sometown ST 99399", "555-555-4444");
var jimbo = new Card("Jimbo Jones", "7/7/1977", "jimbo@jones.com", "233 Walnut Circle, Anotherville ST 88999", "555-555-1344");

// Now print them
sue.printCard();
fred.printCard();
jimbo.printCard();


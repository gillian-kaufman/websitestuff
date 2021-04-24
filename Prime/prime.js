// Gillian Kaufman
// February 15, 2021
// CSCI 450
// Test 1
// Grade level attempted: A

/* Global variables */
var primesum = 0;
var notprimesum = 0;

/* Enable sum buttons */
var sumPrimes = document.getElementById("sumprimes");
sumPrimes.addEventListener("click", showPrimeSums);

var sumNotPrimes = document.getElementById("sumnotprimes");
sumNotPrimes.addEventListener("click", showNonPrimeSums);

/* Function to find prime numbers */
function isPrime(n)
{
    if (n <= 1)
        return false;
    for (var i = 2; i < n; ++i)
    {
        if (n % i === 0)
            return false;
    }
    return true;
}
/* Function to create two lists of numbers */
function createList()
{
    var input = document.getElementById("input").value;
    var i, j = 0, k = 0;
    var isprime = false;
    var notPrimes = new Array;
    var primes = new Array;

    for (i = 1; i <= input; ++i)
    {
        isprime = isPrime(i);
        if (isprime === false)
        {
            notPrimes[j] = i;
            ++j;
        }
        else
        {
            primes[k] = i;
            ++k;
        }
    }
    for (i = 0; i < primes.length; ++i)
    {
        var temp = primes[i];
        primesum += temp;
    }
    for (var i = 0; i < notPrimes.length; ++i)
    {
        var temp = notPrimes[i];
        notprimesum += temp;
    }
    printList(primes, notPrimes);
}
/* Function to print two lists of numbers */
function printList(primes, notPrimes)
{
    document.getElementById("grid1").innerHTML=""
    document.getElementById("grid2").innerHTML=""
    document.getElementById("grid5").innerHTML=""
    document.getElementById("grid6").innerHTML=""

    for (var i = 0; i < primes.length; ++i)
    {
        document.getElementById("grid1").innerHTML += primes[i] + "<br>";
    }
    for (var i = 0; i < notPrimes.length; ++i)
    {
        document.getElementById("grid2").innerHTML += notPrimes[i] + "<br>";
    }
}
/* Functions to show sums of each list */
function showPrimeSums()
{
    document.getElementById("grid5").innerHTML = primesum;
    
}
function showNonPrimeSums()
{
    document.getElementById("grid6").innerHTML = notprimesum;
}

/* Functions to change list colors */
var temp = 0;
function primecolor() 
{
  var doc = document.getElementById("grid1");
  var color = ["aquarmarine", "hotpink", "seagreen", "goldenrod"];
  doc.style.backgroundColor = color[temp];
  temp = (temp + 1) % color.length;
}
function nonprimecolor() 
{
  var doc = document.getElementById("grid2");
  var color = ["aquamarine", "hotpink", "seagreen", "goldenrod"];
  doc.style.backgroundColor = color[temp];
  temp = (temp + 1) % color.length;
}
nonprimecolor();
setInterval(primecolor, 5000);
setInterval(nonprimecolor, 5000);
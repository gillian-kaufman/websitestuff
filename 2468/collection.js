//Get the button:
mybutton = document.getElementById("toTop");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() 
{
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) 
  {
    mybutton.style.display = "block";
  } 
  else 
  {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
function topFunction() 
{
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
function removeHelper(name)
{
    let form=$(`<form id='removeform' method='post' action='removeFromList.php'></form>`);
    $(`<input type="hidden" name="card" value="${name}">`).appendTo(form);

    document.getElementById('removeform').submit();
}
$(document).ready(function ()
{
    showCardList();

    $("#toTop").click(topFunction);
    $("#colorbutton").click(searchColor);
    $("#namebutton").click(searchCard);

    var getInfoCheck = false;
    //Check if card exists
    function errorCheck()
    {
        if (getInfoCheck == false)
        {
            $(".imgspot").empty();
            $(".contentspot").empty();
            $(".contentspot").append("Error 404: Card could not be located in our database or is taking a long time to load.<br>Make sure the spelling is correct.")
        }
    }
    //Search card by name
    function searchCard()
    {
        var cardInput = document.getElementById("cardinput").value;
        var cardURL = "https://api.scryfall.com/cards/named?fuzzy=" + cardInput;
        getInfoCheck = false;

        $.getJSON(cardURL, function(cardData)
        {   
            getInfoCheck = true;             
            var cardName = cardData.name;
            var cardIMG = cardData.image_uris.normal;
            var cardMana = cardData.mana_cost;
            var cardType = cardData.type_line;
            var cardSet = cardData.set_name;
            var cardRarity = cardData.rarity;
            
            if (cardData.card_faces)
                var cardDesc = cardData.card_faces[0].oracle_text + " // " + cardData.card_faces[1].oracle_text;
            else
                var cardDesc = cardData.oracle_text;

            if (cardData.flavor_text)
                var cardFlavorText = cardData.flavor_text;
            else
                var cardFlavorText = "None";

            cardContent = ("<b>Card Name:</b> " + cardName 
                        + "<br><br><b>Card Type:</b> " + cardType 
                        + "<br><br><b>Card Mana Cost:</b> " + cardMana 
                        + "<br><br><b>Card Set:</b> " + cardSet 
                        + "<br><br><b>Card Rarity:</b> "+ cardRarity
                        + "<br><br><b>Card Description:</b> " + cardDesc 
                        + "<br><br><b>Flavor Text:</b> <i>" + cardFlavorText);
            
            $(".imgspot").empty();
            $(".contentspot").empty();
                        
            $(".imgspot").append("<img src =" + cardIMG + ">");
            $(".contentspot").append(cardContent);

            let form=$(`<form method='post' action='addToList.php'></form>`);
            $(`<input type="hidden" name="card" value="${cardName}">`).appendTo(form);
            $(`<input type="submit" value="Add To List">`).appendTo(form);
            $(".contentspot").append(form);
        });
        errorCheck();
    }
    //Show card details from search by color page
    function showCardDetailsFromColor(card)
    {
        var cardURL = "https://api.scryfall.com/cards/named?fuzzy=" + card;
        getInfoCheck = false;

        $.getJSON(cardURL, function(cardData)
        {   
            getInfoCheck = true;             
            var cardName = cardData.name;
            var cardType = cardData.type_line;
            var cardSet = cardData.set_name;
            var cardRarity = cardData.rarity;
            
            if (cardData.card_faces)
            {
                var cardMana = cardData.card_faces[0].mana_cost + " // " + cardData.card_faces[1].mana_cost;
                var cardIMG = cardData.card_faces[0].image_uris.small;
                var flipcardIMG = cardData.card_faces[1].image_uris.small;
                var cardDesc = cardData.card_faces[0].oracle_text + " // " + cardData.card_faces[1].oracle_text;
            }
            else
            {
                var cardMana = cardData.mana_cost;
                var cardIMG = cardData.image_uris.normal;
                var cardDesc = cardData.oracle_text;
            }
            if (cardData.flavor_text)
                var cardFlavorText = cardData.flavor_text;
            else if (cardData.card_faces)
                var cardFlavorText = cardData.card_faces[0].flavor_text + " // " + cardData.card_faces[1].flavor_text;
            else
                var cardFlavorText = "None";

            cardContent = ("<b>Card Name:</b> " + cardName 
                        + "<br><br><b>Card Type:</b> " + cardType 
                        + "<br><br><b>Card Mana Cost:</b> " + cardMana 
                        + "<br><br><b>Card Set:</b> " + cardSet 
                        + "<br><br><b>Card Rarity:</b> "+ cardRarity
                        + "<br><br><b>Card Description:</b> " + cardDesc 
                        + "<br><br><b>Flavor Text:</b> <i>" + cardFlavorText);
            $(".cardlist").empty();
            $(".cardimg").empty();
            $(".cardcontent").empty();

            var gobackbutton = $(`<button id="goBack">Go Back</button>`).click(goBackToSearchColor);
            $(".cardlist").append(gobackbutton);
            $(".cardimg").append("<img src =" + cardIMG + "><img src =" + flipcardIMG + ">");
            $(".cardcontent").append(cardContent);

            let form=$(`<form method='post' action='addToList.php'></form>`);
            $(`<input type="hidden" name="card" value="${cardName}">`).appendTo(form);
            $(`<input type="submit" value="Add To List">`).appendTo(form);
            $(".cardcontent").append(form);
        });
        errorCheck();
    }
    //Functions for creating/changing page buttons
    var counter;
    var c = false;
    var colorInput;

    function changePage(nextURL)
    {
        $(".cardlist").empty();
        var prevURL = "https://api.scryfall.com/cards/search?format=json&include_extras=false&include_multilingual=false&order=name&page=" + counter + "&q=c%3A"+ colorInput + "&unique=cards";
        
        var prevbutton = $(`<button id=page>Previous Page</button> `).click(function() {prevPage(prevURL)});
        var nextbutton = $(`<button id=nextpage>Next Page</button><br><br>`).click(function() {nextPage(nextURL)});
        $(".cardlist").append(prevbutton);
        $(".cardlist").append(nextbutton);
    }

    function nextPage(nextURL)
    {
        $.getJSON(nextURL, function(listData)
        {
            if (listData.has_more)
            {
                var next = listData.next_page;
                changePage(next);  
            }
            for (let obj of listData.data)
            {
                if (obj.card_faces)
                {
                    var image = obj.card_faces[0].image_uris.small;
                }
                else
                {
                    var image = obj.image_uris.small;
                }

                var showdetails = $(`<img src="${image}"><br><button>${obj.name}</button><br><br>`).click(function() {showCardDetailsFromColor(obj.name)});
                $(".cardlist").append(showdetails);
            }
        });
        ++counter;
        c = true;
    }

    function prevPage(prevURL)
    {
        if (c == true)
        {
            prevURL = "https://api.scryfall.com/cards/search?format=json&include_extras=false&include_multilingual=false&order=name&page=" + --counter + "&q=c%3A"+ colorInput + "&unique=cards";
        }
        $.getJSON(prevURL, function(listData)
        {
            if (listData.has_more)
            {
                var next = listData.next_page;
                changePage(next);
            }
            for (let obj of listData.data)
            {
                if (obj.card_faces)
                {
                    var image = obj.card_faces[0].image_uris.small;
                }
                else
                {
                    var image = obj.image_uris.small;
                }

                var showdetails = $(`<img src="${image}"><br><button>${obj.name}</button><br><br>`).click(function() {showCardDetailsFromColor(obj.name)});
                $(".cardlist").append(showdetails);
            }
        });
        if (c = false)
            --counter;
        else
            c = false;
        
        if (counter < 1)
            counter = 1;
    }
    //Search cards by color
    function searchColor()
    {
        counter = 1;
        colorInput = document.getElementById("colorinput").value;
        var listURL = "https://api.scryfall.com/cards/search?q=c%3A" + colorInput;

        $.getJSON(listURL, function(listData)
        {
            $(".cardlist").empty();
            $(".cardimg").empty();
            $(".cardcontent").empty();

            if (listData.has_more)
            {
                var next = listData.next_page;
                changePage(next);
            }        
            for (let obj of listData.data)
            {
                if (obj.card_faces)
                {
                    var image = obj.card_faces[0].image_uris.small;
                }
                else
                {
                    var image = obj.image_uris.small;
                }

                var showdetails = $(`<img src="${image}"><br><button>${obj.name}</button><br><br>`).click(function() {showCardDetailsFromColor(obj.name)});
                $(".cardlist").append(showdetails);
            }
        });
    }
    //Function for going back to the color list
    function goBackToSearchColor()
    {
        var listURL = "https://api.scryfall.com/cards/search?format=json&include_extras=false&include_multilingual=false&order=name&page=" + counter + "&q=c%3A"+ colorInput + "&unique=cards";;

        $.getJSON(listURL, function(listData)
        {
            $(".cardlist").empty();
            $(".cardimg").empty();
            $(".cardcontent").empty();

            if (listData.has_more)
            {
                var next = listData.next_page;
                changePage(next);
            }        
            for (let obj of listData.data)
            {
                if (obj.card_faces)
                {
                    var image = obj.card_faces[0].image_uris.small;
                }
                else
                {
                    var image = obj.image_uris.small;
                }

                var showdetails = $(`<img src="${image}"><br><button>${obj.name}</button><br><br>`).click(function() {showCardDetailsFromColor(obj.name)});
                $(".cardlist").append(showdetails);
            }
        });
    }
    
    //Show collection list of user
    function showCardList()
    {
        var card = $("#cardlistJSON").val();
        if (card == undefined)
        {
            return;
        }
        card = JSON.parse(card);

        var names = [];
        var dataset = [];
        for (let i in card)
        {
            names.push({"name":card[i].card});
        }

            var obj = {"identifiers": names};
            var cardURL = "https://api.scryfall.com/cards/collection";
        
        $.ajax(
        {
            type: "POST",
            url: cardURL,
            data: JSON.stringify(obj),
            dataType: "json",
            contentType: "application/json; charset=utf-8",
            success: function(cardData)
            {   
                for (let i of cardData.data)
                {
                    dataset.push(
                    {
                        "name": (i.name != undefined) ? i.name : "",
                        "type": (i.type_line != undefined) ? i.type_line : "",
                        "mana": (i.mana_cost != undefined) ? i.mana_cost : "None",
                        "set": (i.set_name != undefined) ? i.set_name : "",
                        "rarity": (i.rarity != undefined) ? i.rarity : "None",
                        "description": (i.oracle_text != undefined) ? i.oracle_text : "None",
                        "flavortext": (i.flavor_text != undefined) ? i.flavor_text : "None"
                    });
                }
                var table = $('#myTable').DataTable(
                {
                    data: dataset,
                    columns: 
                    [
                        {"data": "name"}, 
                        {"data": "type"},
                        {"data": "mana"},
                        {"data": "set"},
                        {"data": "rarity"},
                        {"data": "description"},
                        {"data": "flavortext"}
                    ]
                });
                $('#myTable tbody').on( 'click', 'tr', function () 
                {
                    if ( $(this).hasClass('selected') ) 
                    {
                        $(this).removeClass('selected');
                    }
                    else 
                    {
                        table.$('tr.selected').removeClass('selected');
                        $(this).addClass('selected');
                    }
                });
             
                $('#button').click(function () 
                {
                    $(".confirmation").empty();

                    var name = table.row('.selected').data().name;
                    let form=$(`<form id='removeform' method='post' value="${name}" action='removeFromList.php'></form>`);
                    $(`<input type="hidden" name="card" value="${name}">`).appendTo(form);

                    $(".confirmation").append(form);
                    form.submit();
                } );
            }
        });
    }
});
function getAllCards()
{
    var url = "https://api.scryfall.com/catalog/card-names";
    $.getJSON(url, function(urlData)
    {
        $(".cards").append("There are " + urlData.total_values + " total cards in Magic: The Gathering.<br><br>");
    });
}
function getAllArtists()
{
    var url = "https://api.scryfall.com/catalog/artist-names";
    $.getJSON(url, function(urlData)
    {
        $(".artists").append("There are " + urlData.total_values + " total artists who design art for the cards in Magic: The Gathering.<br><br>");
    });
}
function getAllCreatures()
{
    var url = "https://api.scryfall.com/catalog/creature-types";
    $.getJSON(url, function(urlData)
    {
        $(".creatures").append("There are " + urlData.total_values + " total creature types in Magic: The Gathering.<br><br>");
    });
}
function getAllArtifacts()
{
    var url = "https://api.scryfall.com/catalog/artifact-types";
    $.getJSON(url, function(urlData)
    {
        $(".artifacts").append("There are " + urlData.total_values + " total artifact types in Magic: The Gathering.<br><br>");
    });
}
function getAllEnchantments()
{
    var url = "https://api.scryfall.com/catalog/enchantment-types";
    $.getJSON(url, function(urlData)
    {
        $(".enchantments").append("There are " + urlData.total_values + " total enchantment types in Magic: The Gathering.<br><br>");
    });
}
function getAllLands()
{
    var url = "https://api.scryfall.com/catalog/land-types";
    $.getJSON(url, function(urlData)
    {
        $(".lands").append("There are " + urlData.total_values + " total land types in Magic: The Gathering.");
    });
}

getAllCards();
getAllArtists();
getAllCreatures();
getAllArtifacts();
getAllEnchantments();
getAllLands();
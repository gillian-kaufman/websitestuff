$(document).ready(function() 
{
  $('[data-toggle="tooltip"]').tooltip();
  var actions = $("table td:last-child").html();

  // Append table with add row form on add new button click
  $(".add-new").click(function()
  {
    $(this).attr("disabled", "disabled");
    var index = $("table tbody tr:last-child").index();
    var row = '<tr>' +
        '<td><input type="text" class="form-control" name="name" id="eventname"></td>' +
        '<td><input type="text" class="form-control" name="desc" id="eventdesc"></td>' +
        '<td><input type="text" class="form-control" name="cat" id="eventcat"></td>' + 
        '<td><input type="text" class="form-control" name="date" id="eventdate"></td>' + '<td>' + actions + '</td>' + '</tr>';
    $("table").append(row);  
    $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
    $('[data-toggle="tooltip"]').tooltip();
  });
  
 // Add row on add button click
 $(document).on("click", ".add", function()
 {
    var empty = false;
    var input = $(this).parents("tr").find('input[type="text"]');
    input.each(function()
    {
      if(!$(this).val())
      {
        $(this).addClass("error");
        empty = true;
      } 
      else
      {
        $(this).removeClass("error");
      }
    });

    var eventname = $("#eventname").val();
    var eventdesc = $("#eventdesc").val();
    var eventcat = $("#eventcat").val();
    var eventdate = $("#eventdate").val();
    $.post("add.php", { eventname: eventname, eventdesc: eventdesc, eventcat: eventcat, eventdate: eventdate}, function(data) 
    {
      $("#displaymessage").html(data);
    });
    $(this).parents("tr").find(".error").first().focus();
    if(!empty)
    {
      input.each(function()
      {
        $(this).parent("td").html($(this).val());
      });   
      $(this).parents("tr").find(".add, .edit").toggle();
      $(".add-new").removeAttr("disabled");
    } 
  });
 // Delete row on delete button click
 $(document).on("click", ".delete", function()
 {
    $(this).parents("tr").remove();
    $(".add-new").removeAttr("disabled");
    var id = $(this).attr("id");
    var string = id;
    $.post("delete.php", { string: string}, function(data) 
    {
      $("#displaymessage").html(data);
    });
  });
 // update rec row on edit button click
 $(document).on("click", ".update", function()
 {
    var id = $(this).attr("id");
    var string = id;
    var eventname = $("#eventname").val();
    var eventdesc = $("#eventdesc").val();
    var eventcat = $("#eventcat").val();
    var eventdate = $("#eventdate").val();
    $.post("edit.php", { string: string, eventname: eventname, eventdesc: eventdesc, eventcat: eventcat, eventdate: eventdate}, function(data) 
    {
      $("#displaymessage").html(data);
    });
  });
 // Edit row on edit button click
 $(document).on("click", ".edit", function()
 {  
    $(this).parents("tr").find("td:not(:last-child)").each(function(i)
    {
      if (i=='0')
      {
        var idname = 'eventname';
      }
      else if (i=='1')
      {
        var idname = 'eventdesc';
      }
      else if (i=='2')
      {
        var idname = 'eventcat';
      }
      else if (i=='3')
      {
        var idname = 'eventdate';
      }
      else{} 
      $(this).html('<input type="text" name="updaterec" id="' + idname + '" class="form-control" value="' + $(this).text() + '">');
    });  
    $(this).parents("tr").find(".add, .edit").toggle();
    $(".add-new").attr("disabled", "disabled");
    $(this).parents("tr").find(".add").removeClass("add").addClass("update");
  });
});
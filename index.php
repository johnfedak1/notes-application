<!DOCTYPE html>
<html>
<head>
	<title>Notes</title>

	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-replace-svg="nest"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<style type="text/css">
  * {
  word-break: break-word;
}
.box-shadow {
  box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}
.col-margin {
  margin-bottom: 30px;
}
.container-style {
  margin-top: 40px;
}
.create-note {
  border-radius: 10px;
  box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  margin: 0px 20px 0px 20px;
  padding: 20px;
  text-align: center;
  width: 400px;
}
.modal-button {
  width: 75px;
}
.nav-link-margin {
  margin-left: 10px;
}
.note-head {
  width: 50%;
}
.note-style {
  border-radius: 10px;
  box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

/* Note background colors*/
.green {
  background-color: #bee3db;
}
.light {
  background-color: #f8f9fa;
}
.blue {
  background-color: #90e0ef;
}
.red {
  background-color: #f08080;
}

@media screen and (max-width: 400px) {
  .note-head {
    width: 40%;
  }
}
input[type=text], input[type=password] {
  background: #f1f1f1;
  border: none;
  display: inline-block;
  margin: 5px 0 22px 0;
  padding: 15px;
  width: 100%;
}
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
</style>

</head>
<body style="background-color: #e6e6e6;">

<nav class="navbar navbar-expand-lg navbar-light bg-light box-shadow" style="margin-bottom: 40px;" >
  <div class="container-fluid">
    <a class="h3" href="#" style="text-decoration: none; color: inherit; margin-top: 5px;">John Fedak</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
     <a id="nav-tog"> <span class="navbar-toggler-icon"></span></a>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link nav-link-margin" aria-current="page" href="https://johnfedak.com/">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Projects
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="https://johnfedak.com/quacker/">Social Media</a></li>
            <li><a class="dropdown-item" href="https://johnfedak.com/projects/weather/">Weather API</a></li>
            <li><a class=" active dropdown-item" href="https://johnfedak.com/projects/notes/">Notes</a></li>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div style="display: flex; justify-content: center;">
  <div class="create-note bg-light">
	  <button id="new-note" type="button" class="btn btn-primary" style="font-size: 1.3em;">Create new note +</button>
    <p id="no-notes" style="margin-top: 25px;">You haven't posted any notes yet</p>
  </div>
</div>

<div class="container-fluid container-style">
	<div id="user-notes" class="row" style="padding: 5px;"></div>
</div>

<!-- New note modal -->
<div id="new-note-modal" class="modal fade" tabindex="-1" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content modal-border-radius">
      <div class="modal-header">
        <h1 class="modal-title display-6 modal-title-text">New note</h1>
      </div>
      <div class="modal-body">

      	<div class="mb-3">
          <label class="form-label modal-header-text">Note header</label>
          <textarea id="note-header" class="form-control" style="resize: none;" placeholder="Enter note header" maxlength="25" rows="1"></textarea>
        </div>

        <div class="mb-3">
         <label class="form-label modal-header-text">Note body</label>
         <textarea id="note-body" class="form-control" style="resize: none;" placeholder="Enter note body" maxlength="200" rows="4"></textarea>
        </div>

        <!-- WARNING MESSAGE -->
        <div id="new-note-warning" style="margin-bottom: 7px; display: none;">
          <i class="fas fa-exclamation-circle text-danger"></i>
          <span class="text-danger" id="new-note-message">Warning</span> 
        </div>

        <div class="mb-3">
          <div class="row">
            <div class="col-6">
              <label class="form-label modal-header-text">Note color</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="new-note-radio" id="red">
                <label class="form-check-label" for="flexRadioDefault1">
                  Red
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="new-note-radio" id="green">
                <label class="form-check-label" for="flexRadioDefault2">
                  Green
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="new-note-radio" id="blue">
                <label class="form-check-label" for="flexRadioDefault3">
                  Blue
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="new-note-radio" id="light" checked>
                <label class="form-check-label" for="flexRadioDefault5">
                  Light
                </label>
              </div>
            </div>
            <div class="col-6">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="important-check">
                <label class="form-check-label" for="flexCheckDefault">
                  Mark important
                </label>
              </div>
            </div>
          </div>
        </div>
      <div class="modal-footer">
        <button id="new-note-submit" type="button" class="btn btn-primary">Submit</button>
        <button id="new-note-cancel" class="btn btn-secondary modal-close">Cancel</button>
      </div>
    </div>
  </div>
 </div>
</div>

<!-- Edit-note-modal -->
<div id="edit-note-modal" class="modal fade" tabindex="-1" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content modal-border-radius">
      <div class="modal-header">
        <h1 class="modal-title display-6 modal-title-text">Edit note</h1>
      </div>
      <div class="modal-body">

      	<div class="mb-3">
          <label class="form-label modal-header-text">Note header</label>
          <textarea id="edit-note-header" class="form-control" style="resize: none;" placeholder="Enter note header" maxlength="25" rows="1"></textarea>
        </div>

        <div class="mb-3">
         <label class="form-label modal-header-text">Note body</label>
         <textarea id="edit-note-body" class="form-control" style="resize: none;" placeholder="Enter note body" maxlength="200" rows="4"></textarea>
        </div>

        <!-- WARNING MESSAGE -->
        <div id="edit-note-warning" style="margin-bottom: 7px; display: none;">
          <i class="fas fa-exclamation-circle text-danger"></i>
          <span class="text-danger" id="edit-note-message">Warning</span> 
        </div>

        <div class="mb-3">
          <div class="row">
            <div class="col-6">
              <label class="form-label modal-header-text">Note color</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="edit-note-radio" id="edit-modal-red" color="red">
                <label class="form-check-label" for="flexRadioDefault1">
                  Red
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="edit-note-radio" id="edit-modal-green" color="green">
                <label class="form-check-label" for="flexRadioDefault2">
                  Green
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="edit-note-radio" id="edit-modal-blue" color="blue">
                <label class="form-check-label" for="flexRadioDefault1">
                  Blue
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="edit-note-radio" id="edit-modal-light" color="light">
                <label class="form-check-label" for="flexRadioDefault1">
                  Light
                </label>
              </div>
            </div>
            <div class="col-6">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="edit-important-check">
                <label class="form-check-label" for="flexCheckDefault">
                  Mark important
                </label>
              </div>
            </div>
          </div>
        </div>
      <div class="modal-footer">
        <button id="edit-note-save" type="button" class="btn btn-primary">Save</button>
        <button id="edit-note-cancel" class="btn btn-secondary modal-close">Cancel</button>
      </div>
    </div>
  </div>
 </div>
</div>


<!-- Delete note modal -->
<div class="modal fade" tabindex="-1" id="delete-note-modal">
  <div class="modal-dialog">
    <div class="modal-content modal-border-radius">
      <div class="modal-header">
        <h1 class="modal-title display-6 modal-title-text" style="font-size: 1.7em;">Are you sure you want to delete this note?</h1>
      </div>
      <div class="modal-footer">
        <!-- WARNING MESSAGE -->
        <span id="new-note-warning" style="display: none; position: absolute; left: 5%;">
          <i class="fas fa-exclamation-circle text-danger"></i>
          <span class="text-danger" id="new-note-message">Warning</span> 
        </span>
        <button id="delete-yes" type="button" class="btn btn-primary modal-button">Yes</button>
        <button id="delete-no" class="btn btn-secondary modal-close modal-button">No</button>
      </div>
    </div>
  </div>
 </div>
</div>

<span id="note-color" style="display: none;">light</span>
<span id="edit-note-color" style="display: none;">light</span>
<span id="edit-note-important" style="display: none;">0</span>
<span id="important" style="display: none;">0</span>
<span id="note-count" style="display: none;">0</span>
<span id="note-id" style="display: none;">0</span>
<span id="selected-note" style="display: none;">0</span>

<script type="text/javascript">

$( document ).ready(function() {
  var username = $("#username").html();

  $.get("note_query.php?username=" + username, function(data){
  	$("#user-notes").html(data);	
	});
});
	
$("#new-note").click(function(){
  $("#note-color").html("light");
  $("#note-header").val("");
  $("#note-body").val("");
  $("#light").prop("checked", true);
  $('input[type="checkbox"]:checked').prop('checked',false);
  $("#important").html("0");
  $("#note-header").css("border", "1px solid #ced4da");
  $("#note-body").css("border", "1px solid #ced4da");
  $("#new-note-modal").modal("show");
});

$("#new-note-cancel").click(function(){
	$("#new-note-modal").modal("hide");	
});

$(document).on("click","input[name='new-note-radio']", function(){    
  var note_color = $(this).attr("id");          
  $("#note-color").html(note_color);
});

$("#important-check").click(function(){
  if ($('#important-check').is(':checked')) {
    $("#important").html("1");
  } else {
    $("#important").html("0");
  }
});

$("#new-note-submit").click(function(){
  var note_header = $("#note-header").val().trim();
  var note_body   = $("#note-body").val().trim();
  var note_color  = $("#note-color").html();
  var important   = $("#important").html();
  var note_id     = $("#note-id").html();

  $.get("profanity_check.php?note_header=" + note_header + "&note_body=" + note_body, function(data){
    if (data == "profane") {
    	$("#new-note-message").html("Note cannot contain foul language");
          $("#new-note-warning").fadeIn();
          $("#note-header").css({"border": "2px solid red"});
          $("#note-body").css({"border": "2px solid red"});
    } else if (note_body == "") {
    	  $("#new-note-message").html("Note must contain a body");
          $("#new-note-warning").fadeIn();
          $("#note-header").css({"border": "1px solid #ced4da"});
          $("#note-body").css({"border": "2px solid red"});
    } else {
          $("#new-note-warning").fadeOut();
          $("#note-header").css({"border": "1px solid #ced4da"});
          $("#note-body").css({"border": "1px solid #ced4da"});
          $("#note-count").html(Number($("#note-count").html()) + 1);
          $("#note-id").html(Number($("#note-id").html()) + 1);

          if (Number($("#note-count").html()) > 0) {
            $("#no-notes").hide();
          } else {
          	$("#no-notes").show();
          }

          $.get("new_note.php?note_header=" + note_header + "&note_body=" + note_body + "&note_color=" + note_color + "&important=" + important + "&note_id=" + note_id, function(data){
            $("#new-note-modal").modal("hide"); 
            $(data).hide().appendTo("#user-notes").slideDown();
          });
    }
	});
});

$(document).on('click', ".col-margin", function () {
    var id = $(this).attr("id");
    $("#selected-note").html(id);
});

$(document).on('click', ".delete", function () {
    $("#delete-note-modal").modal("show");
});

$(document).on('click', "#delete-yes", function () {
	var selected_note = $("#selected-note").html();
	$("#" + selected_note).slideUp();
	setInterval(function(){
    	$("#" + selected_note).remove();
    	return;
  	},1000);
    $("#delete-note-modal").modal("hide");
    $("#note-count").html(Number($("#note-count").html()) - 1);

    if (Number($("#note-count").html() > 0)) {
    	$("#no-notes").hide();
    } else {
    	$("#no-notes").show();
    }
});

$(document).on('click', "#delete-no", function () {
    $("#delete-note-modal").modal("hide");
});

$(document).on('click', ".edit", function () {
	var note_header = $(this).closest("h5").children("div").html().trim();
	var note_body   = $(this).closest("h5").siblings().children("p").html().trim();
	var note_color  = $(this).closest("h5").parent().parent().parent().attr("note-color").trim();
  alert(note_color);
	$("#edit-note-color").html(note_color);
	

	if ($(this).closest("h5").attr("important") == "1") {
		$("#edit-important-check").prop("checked", true);
		$("#edit-note-important").html("1");
	} else {
		$("#edit-note-important").html("0");
		$("#edit-important-check").prop("checked", false);
	}
	  $("#edit-note-header").val(note_header);
	  $("#edit-note-body").val(note_body);
	  $("#edit-modal-" + note_color).prop('checked', true);
    $("#edit-note-modal").modal("show");
});

$("#edit-important-check").click(function(){
  if ($('#edit-important-check').is(':checked')) {
    $("#edit-note-important").html("1");
  } else {
    $("#edit-note-important").html("0");
  }
});

$(document).on("click","input[name='edit-note-radio']", function(){    
  var note_color = $(this).attr("color");          
  $("#edit-note-color").html(note_color);
});

$(document).on('click', "#edit-note-save", function () {
	var note_header   = $("#edit-note-header").val().trim();
	var note_body     = $("#edit-note-body").val().trim();
	var note_color    = $("#edit-note-color").html().trim();
	var important     = $("#edit-note-important").html().trim();
  var selected_note = $("#selected-note").html().trim();

  $.get("profanity_check.php?note_header=" + note_header + "&note_body=" + note_body, function(data){
    if (data == "profane") {
      $("#new-note-message").html("Note cannot contain foul language");
          $("#edit-note-warning").fadeIn();
          $("#edit-note-header").css({"border": "2px solid red"});
          $("#edit-note-body").css({"border": "2px solid red"});
    } else if (note_body == "") {
        $("#edit-note-message").html("Note must contain a body");
          $("#edit-note-warning").fadeIn();
          $("#edit-note-header").css({"border": "1px solid #ced4da"});
          $("#edit-note-body").css({"border": "2px solid red"});
    } else {
          $("#edit-note-warning").fadeOut();
          $("#edit-note-header").css({"border": "1px solid #ced4da"});
          $("#edit-note-body").css({"border": "1px solid #ced4da"});

          $.get("new_note.php?note_header=" + note_header + "&note_body=" + note_body + "&note_color=" + note_color + "&important=" + important + "&note_id=" + selected_note, function(data){
            $("#edit-note-modal").modal("hide"); 
            $("#" + selected_note).replaceWith(data);
            $("#" + selected_note).slideDown();
          });
    }
  });
});

$(document).on('click', "#edit-note-cancel", function () {
    $("#edit-note-modal").modal("hide");
});

document.onkeyup = function(evt) {
    evt = evt || window.event;
    var charCode = evt.keyCode || evt.which;
    if ($('#new-note-modal').is(':visible') && charCode === 13) {
        $("#new-note-submit").click();
    }
};

</script>

</body>
</html>
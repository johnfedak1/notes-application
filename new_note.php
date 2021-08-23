<?php  

$note_header = $_GET['note_header'];
$note_body   = $_GET['note_body'];
$note_color  = $_GET['note_color'];
$important   = $_GET['important'];
$note_id     = $_GET['note_id'];

$important_html = "";
$mark_important = 0;

if ($important == "1") {
	$important_html = "<i style='color: #ffe66d; stroke: black;
    stroke-width: 20; margin-right: 5px;' class='fas fa-star'></i>";
    $mark_important = 1;
}

echo "<div id='$note_id' class='col-lg-4 col-margin' note-color='$note_color' style='display: none;'>
		  <div style='display: flex; justify-content: space-around;'>
			<div class='card text-dark $note_color note-style' style='width: 500px !important;'>
			  <h5 class='card-header' important='$mark_important' style='display: flex; justify-content: space-between; align-items: center;'>
			    <div class='note-head'>
			      $note_header
			    </div>
			    <div>
			    $important_html
			    <div class='dropdown' style='display: inline-block;'>
			      <a class='btn btn-secondary dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
			        Options
			      </a>
			      <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
			        <li><a class='dropdown-item edit' href='#'>Edit note</a></li>
			        <li><a class='dropdown-item delete' href='#'>Delete note</a></li>
			      </ul>
			    </div>
			  </div>
			  </h5>
			  <div class='card-body'>
			    <p class='card-text'>$note_body</p>
			  </div>
			</div>
		  </div>
		</div>";
?>
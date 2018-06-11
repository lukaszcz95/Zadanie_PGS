<html lang="pl">

<head>

<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="Shortcut icon" href="images/logo.jpg" />
<title>Zadanie</title>

<link rel="stylesheet" type="text/css" href="style.css" />

</head>

<body>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<div class="container" style="background-color:white" >  
<div class="page-header">
<img src="logo.png" width=7% height=5% style="float: left;"/>
<br></br>
</div>
</div>

<div class="container-fluid" style="background-color:#424242">

<form action="index.php" method="post">
<br></br>
<h1>iTunes api example</h1>
<br></br>

<div class='row'>

<div class="col-sm-3">
</div>

<div class="col-6 col-sm-3">
<input type="text" class="form-control" name="search" value="Search Songs...">
</div>

<div class="col-6 col-sm-3">
<button class="btn" type="submit" name="execute" style="float: left;" value="true">Search</button>
</div>

<div class="col-sm-3">
</div>

</div>

<br></br>

<h6>Search by song title, author, song number, lyrics, catalog or copyright owner</h6>

<br></br>

</div>

<?php

if (isset($_POST['execute'])){
$query_string=$_POST['search'];
$query_string = str_replace(' ', '', $query_string);
$json = file_get_contents("https://itunes.apple.com/search?term=$query_string");
$data = json_decode($json);

echo "<div class='container'>Found ".$data->resultCount." songs.</div><br>";

?>

<div class="container">
<div class='row'>

<?php




if (0 == $data->resultCount) {
    echo "<div class='container'>Sorry, no matches found</div>";
}
else {
    foreach ($data->results as $row){

        echo "<div class='col-sm-4' >";
        echo "<img src=" .$row->artworkUrl60. " width=100px height=100px>";
		echo "<div class='card-body'>";
        echo "<p class='card-text'>" .$row->trackName.  " by "  .$row->artistName. "</p>";
		echo "</div>";
		echo "</div>";

		}
	}
}
?>

</div>
</div>

<br></br>

<div class="container-fluid">

<div class='row'>

<div class="col-6">
<button class="btn" type="submit" style="float: right;"> << Prev</button>
</div>

<div class="col-6">
<button class="btn" type="submit" style="float: left;">Next >> </button>
</div>

</div>

</div>

<br></br>

<div class="container-fluid" style="background-color:#424242">
<div class="page-footer">
<h6>---- Powered by PGS ----</h6>
</div>
</div>


</body>

</html>
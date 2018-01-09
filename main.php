<?php
session_start();

echo "
<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>

        <title>Project J</title>
        <link rel='stylesheet' href='bootstrap/css/bootstrap.min.css'>
        <link rel='stylesheet' href='styles.css'>
</head>
<body>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src='js/bootstrap.min.js'></script>
<script src='js/bootstrap-theme.min.css'></script>
";

require_once("db.php");
require_once("controller.php");

DB::connect();

$controller = new Controller();

echo "<div class='container-fluid' id='headerMenu'>";

echo "
<a href='?page=home' class='btn btn-primary'>Home</a>
<a href='?page=nothome' class='btn btn-success'>Not home</a>
<a href='?page=database' class='btn btn-warning'>Database</a>
<a href='?page=form' class='btn btn-danger'>Form</a>
";

echo "</div>";
//echo "<div class='container'>";
//echo "Side bar";
//echo "</div>";
echo "<div class='container' id='mainDiv'>";
//$controller->checkPage();
//$db->printFromDb();

//output main page here!!
$controller->checkPost();
include_once($controller->checkPage().".php");

echo "
</div>
</body>
</html>
";
?>

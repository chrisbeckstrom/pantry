<?php
// CB PANTRY APP CONFIGURATION FILE (example)
// this should be the FIRST thing on every page

error_reporting(E_ERROR | E_WARNING | E_PARSE);

// SITE INFORMATION
$sitename = "CB's Pantry";		// this is the <title> in the header

// DB information
$DBurl 		= 'URL_OF_DATABASE';
$DBuser 	= 'USERNAME';
$DBpass		= 'PASSWORD';
$DBdb 		= 'DATABASE_NAME';

// set the timezone
date_default_timezone_set('America/Detroit');

// get the style sheet, add it to each page's html
$stylesheet = 'style.php';

?>


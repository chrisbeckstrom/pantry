<link rel="stylesheet" type="text/css" href="style.css">
<?php

include 'config.php';
include 'connect.php';
include 'header.php';


// clean the text	
$name = mysql_real_escape_string($_POST[name]);
$category = mysql_real_escape_string($_POST[category]);
print "location post: " . $_POST[location] . "<br>";
$location = mysql_real_escape_string($_POST[location]);
$amount = mysql_real_escape_string($_POST[amount]);
$notes = mysql_real_escape_string($_POST[notes]);



if ( $_POST[staple] == 'on' ){
	$staple = 1; }
	else {
	$staple = 0; }
	
if (!isset($_POST[date_on_label])) {
	$date_on_label = '0000-00-00'; }
	else {
	$date_on_label = $_POST[date_on_label]; }
	
if (!isset($_POST[date_expires])) {
	$date_expires = '0000-00-00'; }
	
if (!isset($_POST[date_ready])) {
	$date_ready = '0000-00-00'; }
	
// make today YYYY-MM-DD	
$date_added = date("Y/m/d");

print "<h2>post[edit] = " . $_POST[edit] . "</h2>";

if ($_POST[edit] == '1') {		// if we are updating, update
	$sql= "UPDATE items SET name= '$name', 
		date_added= '$date_added', 
		date_on_label= '$date_on_label', 
		date_expires= '$date_expires', 
		category= '$category', 
		location= '$_POST[location]', 
		amount= '$amount', 
		notes= '$notes', 
		staple= $staple 
		WHERE id = $_POST[id]";
	
	print '<meta http-equiv="refresh" content="1;url=items.php?message=' . $_POST[id] . ' updated" />'; 
	}
	
	else {		// if we are just adding, just add
	$sql="INSERT INTO items 
	(name, date_added, date_on_label, date_expires, category, location, amount, notes, staple)
	VALUES 
	('$name', '$date_added', '$date_on_label', '$date_expires', '$category', '$location', '$amount', '$notes', '$staple')";
	print '<meta http-equiv="refresh" content="1;url=items.php?message=' . $_POST[name] . ' added" />'; 
	}

print "query: <pre>$sql</pre><br>";

print "SQL QUERY<BR>";
// Tell us the results
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());		// error message
  }

	
mysql_close($con);

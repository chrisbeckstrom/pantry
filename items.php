<link rel="stylesheet" type="text/css" href="style.php"> 
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Chris' Pantry</title>
	<link rel="stylesheet" href="style.css" />
</head>

<?php
include 'header.php';


// get the required config files
include 'config.php';
include 'connect.php';


// Message
if (isset($_GET['message'])) {
	print "<h2>" . $_GET['message'] . "</h2>";
	}


?>
<!-- SEARCH BOX -->
<div id='posttype'>
<form name="search" action="items.php" method="get">
&nbsp;&nbsp;<input type=text cols="60" name="search">
<!-- <input type="checkbox" name="long" value="1">long posts only -->
<!-- 
<input type=checkbox name="hidesocial" checked>hide social
 -->
<input type="submit" value="search">
</form>

<!-- END SEARCH BOX -->

<?php
//error_reporting(E_ALL);


// look for arguments passed
// SEARCH
if (isset($_GET['search'])) {
	print "<i>looking for " . $_GET['search'] . "</i><br>";
	$search = "AND (category LIKE '%$_GET[search]%' 
		OR name LIKE '%$_GET[search]%' 
		OR notes LIKE '%$_GET[search]%')"; }
	else {
	$search = '';}
	
// CATEGORY
if (isset($_GET['category'])) {
	print "<h2>category: " . $_GET['category'] . "</h2>";
	$category = "AND category = '$_GET[category]' ";}
	else{
	$category = '';}
	
// LOCATION
if (isset($_GET['location'])) {
	print "<h2>location: " . $_GET['location'] . "</h2>";
	$location = "AND location = '$_GET[location]' ";}
	else{
	$location = '';}


// base query = 
	$query = "SELECT * 
			FROM items 
			WHERE id IS NOT NULL
			$search 
			$category 
			$location
			AND used != 1 
			ORDER BY date_on_label DESC";
			
print "query: $query ";

// how to connect to the database
$db = new PDO("mysql:host=$DBurl;dbname=$DBdb", $DBuser, $DBpass);

// get row count
$stmt = $db->query($query);
$row_count = $stmt->rowCount();
print "($row_count results)";

print "<hr>";





// make a table
?>
<table style="width:100%">
	<tr>
		<th>id</th>
		<th>action</th>
<!-- 		<th>date added</th> -->
		<th>date on label</th>
		<th>name</th>
		<th>category</th>
		<th>location</th>
		<th>amount</th>
		<th>notes</th>
	</tr>
	
<?		

// date on label
if ($row['date_on_label'] == '0000-00-00') {
	$date_on_label = ''; }
	else {
	$date_on_label = $row['date_on_label']; }


// run the query and get info
foreach($db->query($query) as $row) 
	{
    echo "<tr>" . 
    		"<td>" . $row['id'] . "</td>" .
    		"<td><a href='use.php?id=" . $row['id'] . "'>use</a> /
    		<a href='delete.php?id=" . $row['id'] . "'>delete</a> /
    		<a href='add.php?id=" . $row['id'] . "&edit=1'>edit</a> /
    		<a href='add.php?id=" . $row['id'] . "&copy=1'>copy</a>
    		</td>" .
//     		"<td>" . $row['date_added'] . "</td>" .
    		"<td>" . $row['date_on_label'] . "</td>" .
    		"<td>" . $row['name'] . "</td>" . 
    		"<td><a href='items.php?category=" . $row['category'] . "'>" . $row['category'] . "</a></td>" .
    		"<td><a href='items.php?location=" . $row['location'] . "'>" . $row['location'] . "</a></td>" .
    		"<td>" . $row['amount'] . "</td>" .
    		"<td>" . $row['notes'] . "</td>" .
    	  "</tr>"; //etc...
}






?>



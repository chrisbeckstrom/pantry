<?php
include 'config.php';
include 'connect.php';

?>
<link rel="stylesheet" type="text/css" href="style.css">

<?php
include 'header.php';

// if editing is turned on, get info about that ID
if (isset($_GET[id])) {		// if we pass an ID...

	
	// query = 
	$query = "SELECT * 
			FROM items 
			WHERE id = '$_GET[id]'";
			
 	print "query is: $query <br>";
 	
 	// how to connect to the database
	$db = new PDO("mysql:host=$DBurl;dbname=$DBdb", $DBuser, $DBpass);
 	
 	// get info from the DB
 	foreach($db->query($query) as $row) 
	{
 		$name = $row[name];
//  		$date_on_label = $row[date_on_label];
 		
 		
	
	}
}	

?>

<!-- THE FORM -->
<div id='inputbox'>

<?php
	
	if ($_GET[copy] == 1) {
	print "<h2>Making a copy</h2>";
	}
	
?>
<form action="submit.php" method="post" enctype="multipart/form-data">
	<?php
	if ($_GET[edit] == 1) {
	print "<h2>Editing</h2>";
	print "editing id <input type=text name='id' value=$row[id]><br>";
	print "<input type=hidden name='edit' value='1'>";
	}
	
	?>

name <input type=text name="name" value="<?php echo $row[name]; ?>"><br>
date on label <input type=date name="date_on_label" value="<?php echo $row[date_on_label]; ?>"><br>
date ready <input type=date name="date_ready" value="<?php echo $row[date_ready]; ?>"><br>
date expires <input type=date name="date_expires" value="<?php echo $row[date_expires]; ?>"><br>
category <input type=text name="category" value="<?php echo $row[category]; ?>"><br>
location <select name="location">
<option value='beer fridge freezer'>beer fridge freezer</option>
	<option value='deep freeze'>deep freeze</option>
	<option value='fridge'>fridge</option>
	<option value='fridge freezer'>fridge freezer</option>
	<option value='beer fridge'>beer fridge</option>
	<option value='pantry'>pantry</option>
	<option value='spice cabinet'>spice cabinet</option>
	<option value='icebox'>icebox (fermenting cabinet)</option>
	<option value='other'>other</option>
</select>
<br>
amount <input type=text name="amount" value="<?php echo $row[amount]; ?>"><br>
notes <input type=text name="notes" value="<?php echo $row[notes]; ?>"><br>
staple? <input type=checkbox name="staple" value="<?php echo $row[staple]; ?>"><br>


<input type="submit" name="submit" id="submit" value="submit"><br>
</form>
</div>
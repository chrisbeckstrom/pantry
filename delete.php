<?php

include 'config.php';
include 'connect.php';

include 'header.php';
print "<h2>Deleting...</h2>";
print '<meta http-equiv="refresh" content="1;url=items.php?message=Item deleted" />';

// DELETE FROM trips WHERE tripid = $tripid
$sql="DELETE FROM items where id = $_GET[id]";

print "query: <pre>$sql</pre><br>";

print "SQL QUERY<BR>";
// Tell us the results
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());		// error message
  }

mysql_close($con);

?>


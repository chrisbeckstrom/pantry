<?php

include 'config.php';
include 'connect.php';

include 'header.php';
print "<h2>Using...</h2>";
// print '<meta http-equiv="refresh" content="1;url=items.php?message=Item used" />';

// set used to 1
$sql="update items set used = 1 where id = $_GET[id]";

print "query: <pre>$sql</pre><br>";

print "SQL QUERY<BR>";
// Tell us the results
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());		// error message
  }
  
  
// set the used date  
// make today YYYY-MM-DD	
$today = date("Y-m-d");
$sql="update items set used_date = '$today' where id = $_GET[id]";

print "query: <pre>$sql</pre><br>";

print "SQL QUERY<BR>";
// Tell us the results
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());		// error message
  }

mysql_close($con);

print '<meta http-equiv="refresh" content="1;url=items.php?message=Item used and archived" />'; 


?>


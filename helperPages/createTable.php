<?php //createTable.php
require_once 'login.php';


/*

$query = "CREATE TABLE IF NOT EXISTS socasongs(
title VARCHAR(100),
artist VARCHAR(200),
youtubesrc VARCHAR(300),
Date DATE)";
$result = mysql_query($query);
if(!$result) die("Unable to create table".mysql_error());

*/
/*
$query ="INSERT INTO socasongs VALUES('D Influence','Kerwin Du Bois','//www.youtube.com/embed/7ipRz2cOPR4?rel=0','2014-11-30')";
$result = mysql_query($query);
if(!$result) die("Unable to create table".mysql_error());
*/

/*
$display = "SELECT * FROM socasongs LIMIT 10,20";
$result = mysql_query($display);
$rows = mysql_num_rows($result);
for ($j=0; $j<$rows; ++$j)
{
$row = mysql_fetch_row($result);
echo <<<_VIDEO
<iframe class="embed-responsive-item" src="$row[2]" frameborder="0" allowfullscreen data-date ="Dec-13"></iframe>
_VIDEO;
}
*/
?>
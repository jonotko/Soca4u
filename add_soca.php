<?php
require_once 'helperPages/login.php';
if(isset($_POST['title'])&&isset($_POST['artist'])&&isset($_POST['youtubesrc'])&&isset($_POST['date']))
{
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $youtubesrc = $_POST['youtubesrc'];
    $date = $_POST['date'];
    
    $query = "INSERT INTO socasongs VALUES('$title','$artist','$youtubesrc','$date')";
    mysql_query($query) or die("Unable to add values ".mysql_error());
}
?>

<form method="post" action="add_soca.php">
<input type="text" name="title" placeholder="name of song"/>
<input type="text" name="artist" placeholder="artist"/>
<input type="text" name="youtubesrc" placeholder="src" />
<input type="date" name="date" placeholder="yyyy-mm-dd"/>
<input type="submit" value="add song" />
</form>


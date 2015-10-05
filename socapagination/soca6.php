<?php
require_once '../helperPages/login.php';

$query = "SELECT * FROM socasongs ORDER BY Date DESC LIMIT 140,10";

$result = mysql_query($query);
$rows = mysql_num_rows($result);
if($rows==0){
    die("<div class='container-fluid'><h4>You've reached the end</h4></div>");
}
?>
<html>
    <head></head>
    <body>
    <div class='jscroll'>
<div class="container-fluid">
<div class="row">
<?php
for($j=0; $j<$rows; ++$j)
{
$row = mysql_fetch_row($result);
 echo <<<_HTML

    <div class="col-xs-12 col-md-4">
    <div class="embed-responsive embed-responsive-4by3">
    <iframe class="embed-responsive-item" src="$row[2]"  frameborder="0" allowfullscreen></iframe>
    </div>
    <p>$row[1] - $row[0]</p>
    </div>
    
_HTML;
}

mysql_close(mysql_connect($dbhost, $dbuser, $dbpass));
?>
</div>
</div>
        <a href="soca7.php">next page</a>
    </div>
    
    <script>
        $('.jscroll').jscroll({
            loadingHtml: '<img src="img/ajax-loader.gif" alt="Loading" /> Loading...'
});
    
    </script>
    </body>
</html>
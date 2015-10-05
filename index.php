<?php
require_once 'helperPages/login.php';

$query = "SELECT * FROM socasongs ORDER BY Date DESC LIMIT 0,5";
$result = mysql_query($query);
if(!$result){
    die("<h4>We are sorry something seems to be wrong please check back later</h4>");
}
$rows = mysql_num_rows($result);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Soc4u</title>
    <!-- Bootstrap css -->
    
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="font-awesome-4.2.0/css/font-awesome.css" rel="stylesheet" />
    <link href="css/soca.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">     </script>
    <script src="jscroll-master/jquery.jscroll.min.js"></script>
    
    <style>
        #contact{
            color:black;
        }
    </style>
</head>
<body>
    <?php include_once("googleplugin/analytics_tracking.php"); ?>
    <!-- Top Navbar -->
    
    <nav class="navibar" role="navigation">
        <div class="container-fluid pull-center">
            <a href="http://www.facebook.com/DefinitiveCoding"><i class="fa fa-facebook-square fa-3x pull-left"></i></a>
            <a href="https://twitter.com/Soca4u"><i class="fa fa-twitter-square fa-3x pull-left"></i></a>
            
            <ul class="nav navbar-nav pull-right">

                <!--
                <div class="container-fluid pull-center">
        </div>
    -->
                <li><a href="http://www.soca4u.com/">Home</a></li>
                <li><a href="pumps.php">Events</a></li>
            </ul>
        </div>
    </nav>

    <!-- End of Top Nav bar -->
    
    <!-- Bottom Nav bar for searching -->

    <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
        <div class="container-fluid searchdiv">
            <form method="post" action ="socasearch.php" class="navbar-form" role="search">
                <div class="form-group">
                    <div class="col-xs-6">
                    <input type="text" class="form-control" name="songsearch" placeholder="Search by artist/song" />
                        </div>
                    <div class="col-xs-6">
                <button type="submit" class="btn btn-default">Search</button>
                        </div>
                </div>
            </form>
            <p id="logo" class="pull-center"><a href="contact.php" id="contact">Contact Soca4u.com</a></p>
        </div>
    </nav>

    <!-- End of bottom Navbar -->
<div class="jscroll">
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
<a href="socapagination/soca.php">next page</a>
    
</div>


    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    
    <script>
        $('.jscroll').jscroll({
            loadingHtml: '<img src="img/ajax-loader.gif" alt="Loading" /><br /> Loading...'
            
});
    
    </script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
        
</body>

</html>
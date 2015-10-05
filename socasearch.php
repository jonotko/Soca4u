<?php
require_once 'helperPages/login.php';
require_once 'helperPages/functions.php';
$rows = 0;
$message ="Enter Search Below";
if(isset($_REQUEST['songsearch'])){
$song = sanitizeString(trim($_REQUEST['songsearch']," "));
if(!($song=="")){    
$query ="SELECT * FROM socasongs WHERE artist LIKE '%$song%' ORDER BY Date DESC";
    $result = mysql_query($query);
    if(!$result){
        die("<h1 style='text-align:center;margin-top:50%'>There Seems to be problem. Our engineers will get right to it</h1>");
    }
    $rows += mysql_num_rows($result);
//End of if statement for empty string check
if($rows==0){
    $query = "SELECT * FROM socasongs WHERE title LIKE '%$song%' ORDER BY Date DESC";
    $result = mysql_query($query);
    if(!$result){
        die("There Seems to be problem. Our engineers will get right to it");
    }
$rows = mysql_num_rows($result);   
}
if($rows == 1){
    $message = "<div class='container-fluid'><h1>We Found $rows Song</h1></div>";
}
else{
    $message = "<div class='container-fluid'><h1>We Found $rows Songs</h1></div>";
}
}
}

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
    
</head>
<body>
    <?php include_once("googleplugin/analytics_tracking.php"); ?>
    <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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
                <li><a href="http://www.soca4u.com">Home</a></li>
                <li><a href="pumps.php">Events</a></li>
            </ul>
        </div>
    </nav>

    <!-- End of Top Nav bar -->
    
    <!-- Bottom Nav bar for searching -->

    <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
        <div class="container-fluid searchdiv">
            <form method="post" action ="socasearch.php" class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <div class="col-xs-6">
                    <input type="text" class="form-control smallphone" name="songsearch" placeholder="Search by artist/song" />
                        </div>
                    <div class="col-xs-6">
                <button type="submit" class="btn btn-default">Search</button>
                        </div>
                </div>
            </form>
            <p id="logo" class="pull-center">Soca4u</p>
        </div>
    </nav>
<div class="container-fluid">
    <h1> <?php echo $message; ?> </h1>
  
    
<?php
for($j=0;$j<$rows;++$j){
    $row = mysql_fetch_row($result);
    echo <<<_HTML

    <div class="col-xs-12 col-md-4">
    <div class="embed-responsive embed-responsive-4by3">
    <iframe class="embed-responsive-item" src="$row[2]"  frameborder="0" allowfullscreen></iframe>
    </div>
    <p>$row[1] - $row[0]</p>
    <div class="col-xs-6 get-inline">
    <div class="fb-share-button" data-href="https://$row[2]" data-layout="button"></div>
    </div>
    </div>
    
_HTML;
    
}
?>
</div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">     </script>
    </body>
</html>
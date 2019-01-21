<!DOCTYPE html>
<?php  $a = $_GET['a']; ?>

<html lang="en">
<head>

  <meta charset="utf-8" />
    <title>Video Player </title>
    <link type="text/css" href="../LOGIN/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="css/font-awesome.css" rel="stylesheet">
    <link href="css/video-js.css" rel="stylesheet">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <script src="js/videojs-ie8.min.js"></script>
    <script src="js/video.js"></script>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    
    </head>
    <body>
    <div class="container">
        <div class="col-sm-offset-3">
            <p style="padding:50px;"></p>
    <video class="video-js vjs-big-play-centered" width="640" height="360" poster="images/batulogo.png"
      controls data-setup='{}'>
    
    <source src="<?php echo $a ?>">
    </video>
            </div>
    </div>
    </body>
</html>

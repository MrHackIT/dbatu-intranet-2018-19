<?php
    error_reporting(1);
    session_start();
    if( isset($_SESSION["isLoggedIn"]) ){
         if( $_SESSION["user_role"]!="fac" ){
            header( 'Location : ../LOGIN/restrictedAccess.php' );
            die();
        }
    }
    else{
       $url='../LOGIN/restrictedAccess.php';
       $var= file_get_contents($url);
       echo $var;
        die();
    }
?>
    <?php
    include 'connect.php';
    //error_reporting(1);

    $user_id = $_SESSION["user_id"];
    $t_full_name = $_SESSION["t_full_name"];
    $albumFlag = NULL;
    ?>

<!DOCTYPE html>
<html>
<head>
    <title> Resources Library - CampusConnect</title>
		<link type="text/css" href="../LOGIN/css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="css/bootstrap-table.css" rel="stylesheet">
		<link type="text/css" href="css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href="css/custom.css" rel="stylesheet">
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-table.js"></script>
    </head>
<body>
    <!-- creating video_album_name, dept -->
    <?php
    if(isset($_POST['submit_album_name'])){
    $dept = $_POST['dept_name'];
    $name = $_POST['album_name'];
    $x = mysqli_query($conn, "INSERT INTO `album` (`album_name`, `dept`) VALUES ('$name', '$dept')");
    if( $x )
    { $albumFlag = TRUE; }
    else if(!$x)
    { $albumFlag = FALSE; }
    }
    ?>

<div id="wrapper" >
<div id="page-content-wrapper">
    <!--HEADING -->
<div class="jumbotron padding_adjust">
<div class="container">
<div class="row">
<div class="col-lg-1">
<img src="images/batulogo.png" alt="LOGO" id="logo">
</div>
<div class="col-lg-1"></div>
<div class="col-lg-10">
<h2 id="college_name" class="text-center">Dr. Babasaheb Ambedkar Technological University</h2>
</div>
<div class="container">
<div class="row">
<p class="text-center">CampusConnect - e-Resources Library Uploads Page</p>
<p>
<?php
    $dashboard_url="";
    switch( $_SESSION['user_role'] ){
        case "fac":
            $dashboard_url = "../dashboard/index.php";
            break;

        case "stu":
            $dashboard_url = "../dashboard/user_dashboard.php";
            break;

        case "nts":
            $dashboard_url = "../dashboard/ntsuser_dashboard.php";
            break;
    }
?>
<a href="../LOGIN/logout.php" class="btn btn-danger pull-right">Log Out</a>
<a href="<?php echo $dashboard_url; ?>" class="btn btn-primary pull-right" style="margin-right: 15px;"><span class="glyphicon glyphicon-home"></span></a>
&nbsp&nbsp
</p>
</div>
</div>
</div>
</div>
</div>
<div class="overlay"></div>
<style>
    input[type="file"]{
        margin-bottom: 10px;
    }
</style>
<form method="post" enctype="multipart/form-data">
    <!-- ALBUM create PANEL -->
<div class="container-fluid" id="admin_panel_body">
<div class="row"  >
<div class="col-lg-12">
<div class="container" id="main_list_box">
<div class="panel panel-success" >
<div class="panel-heading ">
<span class="admin_panel_heading">Upload a Video</span>
</div>
<div class="panel-body" >
<div class="row">
<div class="col-md-6">
    <div class="row">
<div class="col-md-12">
<div class="col-sm-6">
<div class="form-group">
    <?php
    $query = "SELECT a_id,album_name FROM album order by album_name";
    $xy = mysqli_query($conn,$query);
    ?>
<select name="v_album_name" class="form-control" id="t_album"  >
<option value="">------------Select ALBUM------------</option>
    <?php
    while( $row = mysqli_fetch_array($xy) ) {
    echo "<option value=\"".$row['a_id']."\">".$row['album_name']."</option>";
    }
    ?>
</select>
</div>
</div>
</div>
<div class="col-md-12">
<div class="col-sm-12">
<div class="form-group">
    <?php
    if(isset($_POST['submit_video']))
    {
    $name = $_FILES['video']['name'];
    $type = explode('.',$name);
    $type = end($type);
    $size = $_FILES['video']['size'];
    $album_id = $_POST['v_album_name'];
    $random_name = rand();
    $tmp = $_FILES['video']['tmp_name'];
    if($type !='mp4' && $type !='mkv')
    {
    $message = "<p class=\"text-danger\"><strong>Video Format Not Supported!!<br/> \"Supported formats are .mp4 & .mkv\"</strong></p>";
    }
    else
    {
    move_uploaded_file($tmp, 'uploads/VIDEOS/'.$random_name.'.'.$type);
    $cmd = "C:\\ffmpeg\\bin\\ffmpeg -i uploads/VIDEOS/".$random_name.'.'.$type." -ss 00:00:10 -vframes 1 thumbnails/".$random_name.".jpg 2>&1 ";
    shell_exec($cmd);
    mysqli_query($conn,"INSERT INTO `v_playlist` (`v_id`, `v_name`, `v_url`, `v_thumb`, `album_name`, `uploaded_by`) VALUES (NULL, '$name', 'uploads/VIDEOS/$random_name.$type', '$random_name.jpg', '$album_id', '$t_full_name')");
    $message = "Successfully Uploaded !";
    }
    echo $message;
    }
    ?>
<p>Select video</p>
<input type="file" name="video" >

<button class="btn btn-primary" type="submit" name="submit_video" id="submit_video" value="upload">Submit Button</button>
</div>
</div>
</div>
</div>
</div>

    <div class="col-md-6">
    <div class="row">
<div class="col-md-12">
    <?php
    if ($albumFlag==TRUE)
    {
    echo "<div class=\"alert alert-success\" role=\"alert\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
        <strong class=\"text-center\">Album created Successfully!</strong>
        </div>";
    }
    ?>
<div class="col-sm-6">
<form>
<div class="form-group">
    <?php
    $query = "SELECT * FROM departments order by dept_name";
    $retval = mysqli_query($conn,$query);
    ?>
<select name="dept_name" class="form-control" >
<option value="">------------Select DEPARTMENT------------</option>
    <?php
    while( $row = mysqli_fetch_array($retval) ) {
    echo "<option value=\"".$row['dept_id']."\">".$row['dept_name']."</option>";
    }
    ?>
</select>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<input type="text" class="form-control" id="album_name" name="album_name" placeholder="Album Name">
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="col-sm-3">
<div class="form-group">
<button class="btn btn-primary" type="submit" name="submit_album_name">Create Album</button>
</div>
</div>
</div>
</div>
</form>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
<style type="text/css">
    .panel-heading{
        font-size: 20px;
    }
</style>
<!--SlideShow Upload Panel-->
<?php /*PHP Code to Upload the SlideShow*/
    if( isset($_POST['submitSlideShow']) )
    {
        global $slideShowFlag;
        $slideShowAlbum = $_POST['slideShow_album'];
        $targetDirectory = "uploads/PPT_FILES/";
        $fileName = basename( $_FILES['slideShow_file']['name'] );
        $randomName = rand(10,1000000000);
        /*Separating the file extension from the file name*/
        $fileType = explode(".", $_FILES['slideShow_file']['name'] );
        $fileType = end($fileType);
        $targetFile = $targetDirectory.$randomName.".".$fileType;
        global $x;
        $x = NULL;
        if( $fileType=="PPT" || "PPTX" || "PPS" || "ppt" || "PPTX" || "pps")
        {
            move_uploaded_file( $_FILES['slideShow_file']['tmp_name'], $targetFile);
            $x = mysqli_query($conn,"INSERT INTO `ppt_files_list` (`ppt_id`, `ppt_name`, `ppt_url`, `ppt_album_name`, `ppt_uploaded_by`) VALUES (NULL, '$fileName', '$targetFile', '$slideShowAlbum', '$t_full_name')");
        }
        global $message;
        $message = "";
        if($x)
        {
            $slideShowFlag = true;
            $message = "SlideShow Successfully Uploaded!!";
        }
        else
        {
            unlink($targetFile);
            $slideShowFlag = false;
            $message = "Upload failed!";
        }

    }
?>
<div class="panel panel-success col-md-6 container-fluid" style="margin: 10px; padding-left: 0px; padding-right: 0px;">
  <div class="panel-heading">Upload a SlideShow(PPT)</div>
  <div class="panel-body">
    <p class="text-danger text-center">Upload a SlideShow associated to a subject</p>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Select Subject</label>
            <select class="form-control" name="slideShow_album">
                <?php
                    $Query = "SELECT * FROM album ORDER BY album_name";
                    $output = mysqli_query($conn,$Query);
                ?>
                <option>----Select Subject Name----</option>
                <?php
                    while( $r = mysqli_fetch_array($output) )
                    {
                        echo "<option value=\"".$r['a_id']."\">".$r['album_name']."</option>";
                    }
                ?>

            </select>
        </div>
        <div class="form-group">
            <label>Select a SlideShow to Upload</label>
            <input type="file" name="slideShow_file">
        </div>
        <div class="form-group">
            <input type="submit" name="submitSlideShow" class="btn btn-primary" value="Upload SlideShow"></input>
        </div>
        <?php
            if( $slideShowFlag!=NULL)
            {
                echo "<div class=\"alert alert-info\"><strong>".$message."</strong></div>";
            }
        ?>
    </form>
  </div>
</div>
<!--SlideShows Upload Panel Finish-->

<!--Archives Upload Panel-->
<?php /*PHP Code to upload archives*/
    if( isset($_POST['submitArchive']) )
    {
        global $archiveFlag;
        $archiveAlbum = $_POST['archive_album'];
        $targetDirectory = "uploads/ZIP_FILES/";
        $fileName = basename( $_FILES['archive_file']['name'] );
        $randomName = rand(10,1000000000);
        /*Separating the file extension from the file name*/
        $fileType = explode(".", $_FILES['archive_file']['name'] );
        $fileType = end($fileType);
        $targetFile = $targetDirectory.$randomName.".".$fileType;
        global $x;
        $x = NULL;
        if( $fileType=="ZIP" || "RAR" || "zip" || "rar")
        {
            move_uploaded_file( $_FILES['archive_file']['tmp_name'], $targetFile);
            $x = mysqli_query($conn,"INSERT INTO `zip_files_list` (`z_id`, `z_name`, `z_url`, `z_album`, `z_uploaded_by`) VALUES (NULL, '$fileName', '$targetFile', '$archiveAlbum', '$t_full_name')");
        }
        global $message;
        $message = "";
        if($x)
        {
            $archiveFlag = true;
            $message = "Archive Successfully Uploaded!!";
        }
        else
        {
            unlink($targetFile);
            $archiveFlag = false;
            $message = "Upload failed!";
        }
    }
?>
<div class="panel panel-success col-md-6 container-fluid" style="margin: 10px; padding-left: 0px; padding-right: 0px;">
  <div class="panel-heading">Upload an Archive(ZIP/RAR)</div>
  <div class="panel-body">
    <p class="text-danger text-center">Upload an archive associated to a subject. Archives are compressed files which can hold a lot of data and have extensions like ".ZIP" and ".RAR"</p>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Select Subject</label>
            <select class="form-control" name="archive_album">
                <?php
                    $Query = "SELECT * FROM album ORDER BY album_name";
                    $output = mysqli_query($conn,$Query);
                ?>
                <option>----Select Subject Name----</option>
                <?php
                    while( $r = mysqli_fetch_array($output) )
                    {
                        echo "<option value=\"".$r['a_id']."\">".$r['album_name']."</option>";
                    }
                ?>

            </select>
        </div>
        <div class="form-group">
            <label>Select an Archive to Upload</label>
            <input type="file" name="archive_file">
        </div>
        <div class="form-group">
            <input type="submit" name="submitArchive" class="btn btn-primary" value="Upload Archive"></input>
        </div>
        <?php
            if( $archiveFlag!=NULL)
            {
                echo "<div class=\"alert alert-info\"><strong>".$message."</strong></div>";
            }
        ?>
    </form>
  </div>
</div>
<!--Archives Upload Panel Finish-->

<!--PDFs Upload Panel-->
<?php /*PHP Code to upload archives*/
    if( isset($_POST['submitPDF']) )
    {
        global $pdfFlag;
        $pdfAlbum = $_POST['pdf_album'];
        $targetDirectory = "uploads/PDF_FILES/";
        $fileName = basename( $_FILES['pdf_file']['name'] );
        $randomName = rand(10,1000000000);
        /*Separating the file extension from the file name*/
        $fileType = explode(".", $_FILES['pdf_file']['name'] );
        $fileType = end($fileType);
        $targetFile = $targetDirectory.$randomName.".".$fileType;
        global $x;
        $x = NULL;
        if( $fileType=="PDF" || "pdf")
        {
            move_uploaded_file( $_FILES['pdf_file']['tmp_name'], $targetFile);
            $x = mysqli_query($conn,"INSERT INTO `pdf_files_list` (`pdf_id`, `pdf_name`, `pdf_url`, `pdf_album`, `pdf_uploaded_by`) VALUES (NULL, '$fileName', '$targetFile', '$pdfAlbum', '$t_full_name')");
        }
        global $message;
        $message = "";
        if($x)
        {
            $pdfFlag = true;
            $message = "Document Successfully Uploaded!!";
        }
        else
        {
            unlink($targetFile);
            $pdfFlag = false;
            $message = "Upload failed!";
        }
    }
?>
<div class="panel panel-success col-md-6 container-fluid" style="margin: 10px; padding-left: 0px; padding-right: 0px;">
  <div class="panel-heading">Upload a Portable Documents(PDF)</div>
  <div class="panel-body">
    <p class="text-danger text-center">Upload a PDF associated to a subject. Enables easier distribution of course study material and lecture notes.</p>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Select Subject</label>
            <select class="form-control" name="pdf_album">
                <?php
                    $Query = "SELECT * FROM album ORDER BY album_name";
                    $output = mysqli_query($conn,$Query);
                ?>
                <option>----Select Subject Name----</option>
                <?php
                    while( $r = mysqli_fetch_array($output) )
                    {
                        echo "<option value=\"".$r['a_id']."\">".$r['album_name']."</option>";
                    }
                ?>

            </select>
        </div>
        <div class="form-group">
            <label>Select an Archive to Upload</label>
            <input type="file" name="pdf_file">
        </div>
        <div class="form-group">
            <input type="submit" name="submitPDF" class="btn btn-primary" value="Upload Document"></input>
        </div>
        <?php
            if( $pdfFlag!=NULL)
            {
                echo "<div class=\"alert alert-info\"><strong>".$message."</strong></div>";
            }
        ?>
    </form>
  </div>
</div>
<!--PDFs Upload Panel Finish-->

</div> <!--page content wrapper ends-->
</div> <!--wrapper ends-->





<script type="text/javascript">
        window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 10000);
</script>





</body>
</html>

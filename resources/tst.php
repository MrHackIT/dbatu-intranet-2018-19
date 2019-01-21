<?php
	$q = intval($_REQUEST['q']);
    session_start();
?>

<!DOCTYPE html>   
<html lang="en">   
<head>   
<link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="css/bootstrap-table.css" rel="stylesheet">
		<link type="text/css" href="css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href="css/custom.css" rel="stylesheet">
        <link rel="stylesheet" href="css/jquery.dataTables.min.css">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
</head>  
<body style="margin:20px auto">
<style type="text/css">
	tbody,tr,th,td{
  vertical-align: middle;
  text-align: center;
}

.text-middle{
	vertical-align: middle;
}
</style> 
<div class="container">
<table id="myTable" class="table table-striped" >  
        <thead>  
          <tr>  
            <th>Thumbnail</th>  
            <th>Title</th>
            <th>Action</th>
            <th>Uploaded by</th>
          </tr>  
        </thead>  
        <tbody>  
          <?php   /*PHP Code to return the Videos from the database*/
          include 'connect.php';
          $ret = mysqli_query($conn,"SELECT * FROM v_playlist WHERE album_name = '$q'");
          while($r=mysqli_fetch_array($ret))
          {
          	echo "<tr>  
            <td><p class=\"text-middle\"><img src=\"thumbnails/".$r['v_thumb']."\" class=\"thumbnail\"></p></td>  
            <td><p class=\"text-middle\">".$r['v_name']."</p></td>
            <td><p class=\"text-middle\"><a href=\"player.php?a=".$r['v_url']."\"  target=\"_blank\"  class=\"btn btn-success\"><span class=\"glyphicon glyphicon-play-circle\"></span> Play</a></p></td>
            <td><p class=\"text-middle\">".$r['uploaded_by']."</p></td>  
          </tr>";
          }
          ?>

          <!--Code Separator Line-->

          <?php /*PHP Code to return the SlideShows from the database*/
          $ret = mysqli_query($conn, "SELECT * FROM ppt_files_list WHERE ppt_album_name = '$q'");
          while ( $r=mysqli_fetch_array($ret) ) {
            echo "<tr>
            <td><p class=\"text-middle\"><img src=\"images/thumbPPT.png\" class=\"icon\"></p></td>
            <td><p class=\"text-middle\">".$r['ppt_name']."</p></td>
            <td><p class=\"text-middle\"><a href=\"".$r['ppt_url']."\" class=\"btn btn-success\"><span class=\"glyphicon glyphicon-play-circle\"></span> View</a></p></td>
            <td><p class=\"text-middle\">".$r['ppt_uploaded_by']."</p></td>
            </tr>";
          }
          ?>

          <!--Code Separator Line-->

          <?php /*PHP Code to return the PDFs from the database*/
          $ret = mysqli_query($conn, "SELECT * FROM pdf_files_list WHERE pdf_album = '$q'");
          while ( $r=mysqli_fetch_array($ret) ) {
            echo "<tr>
            <td><p class=\"text-middle\"><img src=\"images/thumbPDF.png\" class=\"icon\"></p></td>
            <td><p class=\"text-middle\">".$r['pdf_name']."</p></td>
            <td><p class=\"text-middle\"><a href=\"".$r['pdf_url']."\" class=\"btn btn-success\"><span class=\"glyphicon glyphicon-play-circle\"></span> View</a></p></td>
            <td><p class=\"text-middle\">".$r['pdf_uploaded_by']."</p></td>
            </tr>";
          }
          ?>

          <!--Code Separator Line-->

          <?php /*PHP Code to return the Archives from the database*/
          $ret = mysqli_query($conn, "SELECT * FROM zip_files_list WHERE z_album = '$q'");
          while ( $r=mysqli_fetch_array($ret) ) {
            echo "<tr>
            <td><p class=\"text-middle\"><img src=\"images/thumbZIP.png\" class=\"icon\"></p></td>
            <td><p class=\"text-middle\">".$r['z_name']."</p></td>
            <td><p class=\"text-middle\"><a href=\"".$r['z_url']."\" class=\"btn btn-success\"><span class=\"glyphicon glyphicon-play-circle\"></span> View</a></p></td>
            <td><p class=\"text-middle\">".$r['z_uploaded_by']."</p></td>
            </tr>";
          }
          ?>                  
        </tbody>  
      </table>  
	  </div>
</body>  
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
</html>  

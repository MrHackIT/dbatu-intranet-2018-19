<?php
  $q = $_REQUEST['q'];
  include 'connect.php';
  $x = "DELETE FROM faculty_projects WHERE id='$q' ";
  mysqli_query($conn,$x);
?>

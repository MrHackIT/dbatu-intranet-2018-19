<?php
	$q = $_REQUEST['q'];
	include 'connect.php';
	$x = "DELETE FROM faculty_awards WHERE id='$q' ";
	mysqli_query($conn,$x);
?>

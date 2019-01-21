<?php
	$q = $_REQUEST['q'];
	include 'connect.php';
	$x = "DELETE FROM faculty_papers WHERE id='$q' ";
	mysqli_query($conn,$x);
?>

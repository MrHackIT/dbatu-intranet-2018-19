<?php
	$q = $_REQUEST['q'];
	include 'connect.php';
	$x = "SELECT proof FROM faculty_positions WHERE id='$q'";
	$result = mysqli_query($conn,$x);
	$row = mysqli_fetch_array($result);
	$file = $row['proof'];
	unlink($file);
	$x = "DELETE FROM faculty_positions WHERE id='$q' ";
	mysqli_query($conn,$x);
?>

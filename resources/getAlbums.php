<?php
	include 'connect.php';
	$dept_id = intval( $_REQUEST['q'] );
	$query = "SELECT * FROM album WHERE dept = $dept_id";
	$result = mysqli_query($conn,$query);
?>
<select class="form-control" name="album" onchange="getResources(this.value)">
        			<option value="">----Select Table Name----</option>
        			<?php
        				while($row = mysqli_fetch_array($result) )
        				{
        					echo "<option value=\"".$row['a_id']."\">".$row['album_name']."</option>";
        				}
        			?>
</select>
<?php
  ob_start();
  $q = intval($_REQUEST['q']);
  echo $q;
  include 'connect.php';
  $query = "SELECT v_name,v_url,v_thumb FROM v_playlist WHERE album_name = '$q'";
  $retval = mysqli_query($conn,$query);
  if( mysqli_num_rows($retval)==0 )
    {echo "<strong>0</strong> resources in this album.";}
  else if( mysqli_num_rows($retval)>0 )
  { 
    echo "<div class=\"container\">";
    echo "<table id=\"myTable\" class=\"table table-striped\" >  
        <thead>  
          <tr>  
            <th></th>  
            <th>Title</th>    
          </tr>  
        </thead>  
        <tbody>";  
            
      while( $records = mysqli_fetch_assoc($retval) )
      {
        echo "<tr>
            <td><img src=\"thumbnails/".$records['v_thumb']."\" class=\"thumbnail\"></td>  
            <td>".$records['v_name']."</td>    
             </tr>";  
      }

     echo  "</tbody>  
</table>  
</div>";
}
mysqli_close($conn);
?>
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script> 

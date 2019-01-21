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
ob_start();
session_start();
include 'isLoggedIn.php';
error_reporting(1);


   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';

   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) {
      die('Could not connect: ' . mysqli_connect_error());
   }

      $temp = $_SESSION['user_id'];
      $sql = "SELECT * FROM t_personal_details WHERE t_emp_id=$temp";


      $retval = mysqli_query( $conn,$sql );
      $row = mysqli_fetch_assoc($retval);



//Processing Submitted Data

$query3=mysqli_query($conn,"update t_personal_details set  t_full_name='sample'  where t_emp_id='$temp'");
if($query3)
{
header('location:post_edit_msg.php');
}

//Close connection
   mysqli_close($conn);

?>

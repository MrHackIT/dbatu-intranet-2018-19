<?php
	if( isset($_SESSION["isLoggedIn"]) ){
    if( $_SESSION["user_role"]!="nts" ){
      header( 'Location : ../LOGIN/restrictedAccess.php' );
      die();
    }
  }
  else{
    header( 'location:../LOGIN/restrictedAccess.php' );
    die();
  }
?>
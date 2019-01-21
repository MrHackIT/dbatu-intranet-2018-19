<?php
session_start();
/*if ( isset( $_SESSION["isLoggedIn"] ){
  if ( $_SESSION["user_role"]!="admin" ) {
    session_destroy();
    $url = "../LOGIN/restrictedAccess.php";
    $var = file_get_contents($url);
    echo $var;
    die();
  }
}
else{
  session_destroy();
    $url = "../LOGIN/restrictedAccess.php";
    $var = file_get_contents($url);
    echo $var;
    die();
}*/
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}

$conn=mysqli_connect("localhost","root","","resources");

/*Subject Addition Begins*/
  $subFlag = NULL;
  $subMessage = "";
  $subMessageClass = "";
  if( isset($_POST['add-sub']) )
  {
    $dept = $_POST['dept'];
    $subject = $_POST['subject'];
    $query = "INSERT INTO `album` (`a_id`, `album_name`, `dept`) VALUES (NULL, '$subject', '$dept')";
    if( mysqli_query($conn,$query) )
    {
      $subFlag = TRUE;
      $subMessage = "New Subject Added Successfully !!"; 
      $subMessageClass = "alert alert-success";
    }
    else{ $subFlag = FALSE; $subMessage="Operation Failed !!"; $subMessageClass="alert alert-danger";}
  }
/*Subject Addition Ends*/

/*Department Addition Begins*/
  $deptFlag = NULL;
  $deptMessage = "";
  $deptMessageClass = "";
  if( isset($_POST['add-dept']) )
  {
    $dept = $_POST['dept'];
    $query = "INSERT INTO `departments` (`dept_id`, `dept_name`) VALUES (NULL, '$dept')";
    if( mysqli_query($conn,$query) )
    {
      $deptFlag = TRUE;
      $deptMessage = "Department Name Added Successfully !!";
      $deptMessageClass = "alert alert-success";
    }
    else{ $deptFlag = FALSE; $deptMessage="Operation Failed !!"; $deptMessageClass="alert alert-danger";}
  }
/*Department Addition Ends*/

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Register a New Student - CampusConnect</title>

    <!-- Bootstrap -->
    <link href="../LOGIN/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../LOGIN/css/master.css">
    <link href="../googleFonts/googleFonts.css" rel="stylesheet">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	    <script type="text/javascript" src="js/bootstrap.js"></script>
  </head>
  <body>
  <header style="background-color: #f5f5f4; padding-top: 2%; padding-bottom: 2%; margin-bottom: 2%;">
    <h3 class="text-center">CampusConnect Administration</h3>
  </header>
<!--Box Styling-->
<style type="text/css">
  .box{
    width: 75%;
    margin-left: auto;
    margin-right: auto;
    padding-bottom: 2%;
    border: 3px solid orange;
    border-radius: 10px;
    margin-bottom: 2%;
  }

  .box-title{
    background-color: orange;
    padding-top: 0.5%;
    padding-bottom: 0.5%;
    font-size: 1.5em;
    text-align: center;
    margin-bottom: 1%;
  }

  .box-content{
    padding-left: 2%;
    padding-right: 2%;
  }
</style>
<!--Box Styling ends-->
      <div><!--container begins-->
      <?php
        if( $subFlag!=NULL )
        {
          echo '<div class="'.$subMessageClass.'"><strong>'.$subMessage.'</strong></div>';
        }
        if( $deptFlag!=NULL )
        {
          echo '<div class="'.$deptMessageClass.'"><strong>'.$deptMessage.'</strong></div>';
        }
      ?>
      <!--Add Subject Begins-->
          <div id="subject-addition-form" class="box">
            <div class="box-title">Add a new Subject to the e-Resources Library</div>
            <div class="box-content">
            <form role="form" method="POST">
              <div class="form-group">
                <?php
                  $query = "SELECT * FROM departments order by dept_name";
                  $retval = mysqli_query($conn,$query);
                ?>
                <label for="dept">Select Department:</label>
                <select class="form-control" id="dept" name="dept" required>
                  <option value="">--Select Dept--</option>
                  <?php
                    while( $row = mysqli_fetch_array($retval) ) {
                      echo "<option value=\"".$row['dept_id']."\">".$row['dept_name']."</option>";
                    }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="subject">Subject Name:</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
              </div>
              <center><button type="submit" class="btn btn-primary" id="add-sub" name="add-sub">Submit</button></center>
            </form>
            </div>
          </div>
    <!--Add Subject Ends-->
    <!--Add Department Begins-->
          <div id="dept-addition-box" class="box">
            <div class="box-title">Add a new Department to the e-Resources Library</div>
            <div class="box-content">
            <form role="form" method="POST">
              <div class="form-group">
                <label for="dept">Enter Department Name:</label>
                <input type="text" class="form-control" id="dept" name="dept" required>
              </div>
              <center><button type="submit" class="btn btn-primary" id="add-dept" name="add-dept">Submit</button></center>
            </form>
            </div>
            </form>
          </div>
      <!--Add Department Ends-->
      </div><!--container ends-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-1.11.1.js"></script>
    <script src="js/bootstrapValidator.min.js" type="text/javascript"></script>
  </body>
</html>

<?php
  mysqli_close($conn);
?>
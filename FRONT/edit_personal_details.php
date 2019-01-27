<?php
    error_reporting(1);
    session_start();
    if( isset($_SESSION["isLoggedIn"]) ){
         if( $_SESSION["user_role"]!="stu" ){
            $url='../LOGIN/restrictedAccess.php';
       $var= file_get_contents($url);
       echo $var;
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
error_reporting(1);
session_start();
include 'isLoggedInStudent.php';

   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
/*<<<<<<< HEAD
   $dbname = "intranet";
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
   $temp = $_SESSION['user_id'];
   if(!$conn ) {
      die('Could not connect: ' . mysqli_connect_error());
   }



=======*/

   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'intranet');
   $temp = $_SESSION['user_id'];
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
   }

//>>>>>>> 0d29f38a8544c96742f40e0c23043adb245117da
    $_SESSION['roll_no']=$_POST['roll_no'];
      $temp = $_SESSION['user_id'];

      $sql = "SELECT * FROM personal_details WHERE roll_no=$temp";


echo $_SESSION['roll_no'];

$post_photo = $temp.".jpg";
$post_photo_tmp = $_FILES['profile_photo']['tmp_name'];

$ext = pathinfo($post_photo,PATHINFO_EXTENSION);

if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'JPEG' || $ext =='PNG')
{
    $src=imagecreatefromjpeg($post_photo_tmp);
	echo $src;
}

    list($width_min,$height_min) = getimagesize($post_photo_tmp);

    $newwidth_min = 350;
    $newheight_min = ($height_min / $width_min)*$newwidth_min;

    $tmp_min = imagecreatetruecolor($newwidth_min,$newheight_min);

    imagecopyresampled($tmp_min,$src,0,0,0,0,$newwidth_min,$newheight_min, $width_min,$height_min);

    imagejpeg($tmp_min,"personal_detail/".$post_photo,80);
/*<<<<<<< HEAD


   $retval = mysqli_query($conn,$sql);

   $row = mysqli_fetch_array($retval,MYSQLI_ASSOC);
=======*/


   $retval = mysqli_query($conn,$sql);

   $row = mysqli_fetch_assoc($retval);
//>>>>>>> 0d29f38a8544c96742f40e0c23043adb245117da

   if(isset($_POST['submit']))
{
$full_name=$_POST['full_name'];
$email=$_POST['email'];
$discipline=$_POST['discipline'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$contact_no=$_POST['contact_no'];
$blood_group=$_POST['blood_group'];
$category=$_POST['category'];
$mname=$_POST['m_name'];
$fname=$_POST['f_name'];
$guardian_contact=$_POST['guardian_contact'];
$guardian_email=$_POST['guardian_email'];
$address=$_POST['address'];
$profile_photo=$_POST['profile_photo'];

/*<<<<<<< HEAD
$query3 = "UPDATE personal_details SET full_name='$full_name', email='$email', discipline='$discipline', gender='$gender', dob='$dob',contact_no='$contact_no', blood_group='$blood_group', category='$category',mname='$mname',fname='$fname',guardian_contact='$guardian_contact', guardian_email='$guardian_email', address='$address', profile_photo='$profile_photo',profile_photo_name='$post_photo'  WHERE roll_no='$temp'";
$run = mysqli_query($conn,$query3);
if($run)
=======*/
$query3=mysqli_query($conn,"update personal_details set full_name='$full_name', email='$email', discipline='$discipline', gender='$gender', dob='$dob',contact_no='$contact_no', blood_group='$blood_group', category='$category',mname='$mname',fname='$fname',guardian_contact='$guardian_contact', guardian_email='$guardian_email', address='$address', profile_photo='$profile_photo',profile_photo_name='$post_photo'  where roll_no='$temp'");
if($query3)
//>>>>>>> 0d29f38a8544c96742f40e0c23043adb245117da
{
header('location:post_edit_msg.php');
}

   mysqli_close($conn);

}


?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Personal Details</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--<<<<<<< HEAD
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif|Lobster" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/bootstrapValidator.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
=======-->
    <link href="../LOGIN/css/bootstrap.min.css" rel="stylesheet">
    <link href="../LOGIN/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="../LOGIN/css/bootstrapValidator.min.css" rel="stylesheet">
    <link href="../LOGIN/style.css" rel="stylesheet">
    <link href="../LOGIN/css/style.css" rel="stylesheet">
    <link href="../LOGIN/css/bootstrap.css" rel="stylesheet" />
    <link href="../LOGIN/css/font-awesome.css" rel="stylesheet" />
    <link href="css/custom.css" rel="stylesheet" />

    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <style>

      .green {
          color: green
      }
      .red{
          color:red
      }
    </style>
</head>
    <body>
    <div id="wrapper">

         <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Welcome  <?php echo $_SESSION["user_id"] ?>&nbsp;&nbsp;&nbsp;  <button class="btn btn-xs" id="tgl">&times;</button>
                    </a>
                </li>

                <li>
                    <a href="../dashboard/user_dashboard.php"><span  class="glyphicon glyphicon-home"></span> Dashboard</a>
                </li>
                <li>
                    <a href="#"><span  class="glyphicon glyphicon-pencil"></span> Registration</a>
                </li>
                <li>
                    <a href="#"><span  class="glyphicon glyphicon-folder-open"></span> Course Material</a>
                </li>
                <li>
                    <a href="#"><span  class="glyphicon glyphicon-play"></span> Videos</a>
                </li>

            </ul>
        </div>
        <div id="page-content-wrapper">

        <div class="text-center" style="padding-top: 10px; padding-bottom: 10px; background-color: #eee;">

            <h1>Personal Details</h1>
        </div>
      </div>

<?php include 'topBar.php'; ?>
<p style="padding:40px;"></p>
<div class= "col-md-2"></div>
<div class= "col-md-10">
<div class="row row-content">
            <center><div class="col-xs-12 col-sm-12">
            <ul class="prg_track">
            <li class=""><a href="edit_personal_details.php">Personal Details</a></li>
            <li class=""><a href="edit_edu_details.php">Educational Details</a></li>
            <li><a href="edit_bank_details.php">Banking Information</a></li>
            </ul>
            </div></center>
            </div></div>
        <p style="padding:20px;"></p>
        <p style="margin:50px"></p>

        <div class="container">
            <div class="col-lg-12">
    <div class="panel panel-info">
      <div class="panel-heading"><h1 class="panel-title" style="color:black">PERSONAL DETAILS</h1></div>
      <div class="panel-body" style="font-size:110%">
          <form class="form" id="personal_info" action="" method="POST" enctype="multipart/form-data">
            <div class="row">
          <div class="col-sm-4 col-sm-push-8">
                    <div class="form-group">
                    <label class="col-sm-12 control-label"><p align=left>Profile Photo <a title="Profile Photo Must Not Be More Than 100KB..!" onClick="alert('Profile Photo Must Not Be More Than 100KB!')"><img src="index.jpg" height="13px"/></a><font style="color:#FF0000"> *</font></p></label>
                    <div class="col-sm-8">
                    <img id="preview" class="img-responsive img-thumbnail" src="personal_detail/<?php echo $row['profile_photo_name'] ?>" alt="Image Preview" width="160px" height="130px">

                    <p style="padding:1px;"></p>

                    <input type="file" id="files" class="form-control" accept="image/*" name="profile_photo" onChange="imagepreview(this);">

                    </div>

                    </div>
                    </div>


           <div class="col-lg-8 col-lg-pull-4">
           <div class="form-group">
    <label for="fullname" class="control-label">Full Name :<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
    <input class="form-control" placeholder="Full Name" value="<?php echo $row['full_name']; ?>" type="text" name="full_name" id="full_name" required>
     </div>
    </div>


     <br/><br/>
    <div class="form-group">
    <label for="rollno" class="control-label">PRN :<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
    <input class="form-control" placeholder="Enrollment Number" value="<?php echo $_SESSION["user_id"]; ?>" type="text" name="roll_no" id="enrollmentno" disabled>
     </div>
    </div>
              <br><br>
                <div class="form-group">
          <label for="sel1" class="col-sm-2">Discipline: <font style="color:#FF0000">*</font></label>
                    <div class="col-sm-10">&nbsp;</div>
        <div class="col-xs-12 col-lg-7 col-sm-pull-2">
          <select class="form-control" name="discipline" id="descipline" value="" required>
            <option value="<?php echo $row['discipline']; ?>" selected><?php echo $row['discipline']; ?></option>
            <option value="COMPUTER">Computer</option>
            <option value="IT">IT</option>
            <option value="CIVIL">Civil</option>
            <option value="CHEMICAL">Chemical</option>
            <option value="EXTC">EXTC</option>
            <option value="MECHANICAL">Mechanical</option>
            <option value="ELECTRICAL">Electrical</option>
            <option value="PETROCHEMICAL">Petro Chemical</option>
          </select>
                    </div>
              </div>

     <br/><br/><br>
    <div class="form-group">
    <label for="gender" class="control-label">Gender :<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
        <?php
          if ( $row['gender']=="male" )
          {
              echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"male\" name=\"gender\" checked>Male</label>
      <label class=\"radio-inline\"><input type=\"radio\" value=\"female\" name=\"gender\">Female</label>";
          } else {
            echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"male\" name=\"gender\">Male</label>
      <label class=\"radio-inline\"><input type=\"radio\" value=\"female\" name=\"gender\" checked>Female</label>";
          }

        ?>

     </div>
    </div>

     <br/><br/>
    <div class="form-group">
    <label for="dob" class="control-label">Date Of Birth :<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
    <input class="form-control" placeholder="DD/MM/YYYY" type="date" name="dob" id="dob" value="<?php echo $row['dob']?>" required>
     </div>
    </div>
     <br/><br/>

          <div class="form-group">
    <label for="contact" class="control-label">Contact No :<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
    <input class="form-control" placeholder="Contact Number" type="tel" name="contact_no" id="contactno" value="<?php echo $row['contact_no']?>" required>
     </div>
    </div>
     <br/><br/>

          <div class="form-group">
    <label for="email" class="control-label">Email :<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
    <input class="form-control" placeholder="Email Id" type="email" name="email" id="emailid" value="<?php echo $row['email']?>" required>
     </div>
    </div>
     <br/><br/>

           <div class="form-group">
    <label for="blood" class="control-label">Blood Group :<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-4">
     <select class="form-control" name="blood_group">
                                   <option value="<?php echo $row['blood_group']?>" selected><?php echo strtoupper($row['blood_group']);?></option>
                                   <option value="o+">O+</option>
                                   <option value="o-">O-</option>
                                   <option value="a+">A+</option>
                                   <option value="a-">A-</option>
                                   <option value="b+">B+</option>
                                   <option value="b-">B-</option>
                                   <option value="ab+">AB+</option>
                                   <option value="ab-">AB-</option>
                               </select>
     </div>
    </div>
     <br/><br/>

          <div class="form-group">
    <label for="category" class="control-label">Category :<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-4">
         <select class="form-control" name="category">
                                   <option value="<?php echo $row['category']?>" selected><?php echo $row['category']?></option>
                                   <option value="general">General</option>
                                   <option value="obc">OBC</option>
                                   <option value="nt">NT</option>
                                   <option value="vj">VJ</option>
                                   <option value="st">ST</option>
                                   <option value="sc">SC</option>
                                   <option value="sbc">SBC</option>
                               </select>
     </div>
    </div>
     <br/><br/>

          <div class="form-group">
    <label for="mothername" class="control-label">Mother Name :<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
    <input class="form-control" placeholder="Mother Name" type="text" name="m_name" id="mothername" value="<?php echo $row['mname']?>" required>
     </div>
    </div>
     <br/><br/>

               <div class="form-group">
    <label for="fathername" class="control-label">Father Name :<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
    <input class="form-control" placeholder="Mother Name" type="text" name="f_name" id="fathername" value="<?php echo $row['fname']?>" required>
     </div>
    </div>
     <br/><br/>

   <div class="form-group">
    <label for="parentemail" class="control-label">Guardian Email :</label><br />
      <div class="col-xs-12 col-lg-7">
    <input class="form-control" placeholder="Guardian's Email Id" type="email" name="guardian_email" id="parentemailid" value="<?php echo $row['guardian_email']?>" >
     </div>
    </div>
     <br/><br/>

           <div class="form-group">
    <label for="parentcontact" class="control-label">Guardian Contact :<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
    <input class="form-control" placeholder="Guardian Contact" type="number" name="guardian_contact" id="parentcontact" value="<?php echo $row['guardian_contact'];?>" required>
     </div>
    </div>
     <br/><br/>



          <div class="form-group">
    <label for="address" class="control-label">Permanent Address :<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
    <textarea class="form-control" rows="6" name="address" required><?php echo $row['address'];?></textarea>
     </div>
    </div>
     <br/><br/>

           <div class="form-group">
                        <div class="col-xs-8 col-xs-offset-2 col-lg-4 col-lg-offset-6">
                            <p style="padding: 5px;"></p>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Save &amp; Continue</button>
                        </div>
                       </div>


                </div></div>
    </form></div></div>
            </div></div>
     <p style="padding:40px;"></p>
     <?php include 'footer.php'; ?>

    <script src="js/jquery-3.1.1.js"></script>
    <script src="../login/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../login/js/bootstrapValidator.min.js" type="text/javascript"></script>
     <script type="text/javascript">
       function imagepreview(input){
           if(input.files && input.files[0]){
               var filerd = new FileReader();
               filerd.onload=function(e){
                   $('#preview').attr('src',e.target.result);
               };
               filerd.readAsDataURL(input.files[0]);
           }
       }



        </script>


  <!--<script type="text/javascript">
        $(document).ready(function(){
            var validator= $("#personal_info").bootstrapValidator({


                field : {
                     profile_photo : {

                             file: {
                                 extension: 'jpg,jpeg,png',
                                 type:'image/jpg,image/jpeg',
                                 maxSize: 102400,
                                 message: 'JPG/JPEG formats allowed only. Maximum file size is 1 MB.'
                             }

                    },
                }

            });
        });
    </script>-->



        </script>
        <script>
          $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            });
        </script>
        <script>
               $("#tgl").click(function(e) {
                  e.preventDefault();
                    $("#wrapper").toggleClass("toggled");
                });
        </script>
        </div></div>

    </body>
</html>

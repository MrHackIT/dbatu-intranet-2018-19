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
ob_start();
error_reporting(1);
session_start();
include 'isLoggedInStudent.php';

   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';

   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,"intranet");
   $temp = $_SESSION['user_id'];
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
   }
      $score_10=0;



  // mysql_select_db('intranet');




 $cet_photo = $_SESSION["user_id"].".jpg";
$cet_photo_tmp = $_FILES['cet_composite']['tmp_name'];

$extc = pathinfo($cet_photo,PATHINFO_EXTENSION);

if($extc == 'jpg' || $extc == 'jpeg' || $extc == 'JPG' || $extc == 'JPEG')
{
    $srcc=imagecreatefromjpeg($cet_photo_tmp);
}

    list($width_min,$height_min) = getimagesize($cet_photo_tmp);

    $newwidth_min = 350;
    $newheight_min = ($height_min / $width_min)*$newwidth_min;

    $tmp_min = imagecreatetruecolor($newwidth_min,$newheight_min);

    imagecopyresampled($tmp_min,$srcc,0,0,0,0,$newwidth_min,$newheight_min, $width_min,$height_min);

    imagejpeg($tmp_min,"education/cet_photo/".$cet_photo,80);



          $jee_photo = $_SESSION["user_id"].".jpg";
$jee_photo_tmp = $_FILES['jee_composite']['tmp_name'];

$extc = pathinfo($jee_photo,PATHINFO_EXTENSION);

if($extc == 'jpg' || $extc == 'jpeg' || $extc == 'JPG' || $extc == 'JPEG')
{
    $srcc=imagecreatefromjpeg($jee_photo_tmp);
}

    list($width_min,$height_min) = getimagesize($jee_photo_tmp);

    $newwidth_min = 350;
    $newheight_min = ($height_min / $width_min)*$newwidth_min;

    $tmp_min = imagecreatetruecolor($newwidth_min,$newheight_min);

    imagecopyresampled($tmp_min,$srcc,0,0,0,0,$newwidth_min,$newheight_min, $width_min,$height_min);

    imagejpeg($tmp_min,"education/jee_photo/".$jee_photo,80);






$capture_field ="";

        if( isset($_POST["text"]) && is_array($_POST["text"])){
    $capture_field = implode(",", $_POST["text"]);
}

        $capture ="";

        if( isset($_POST["eskill"]) && is_array($_POST["eskill"])){
    $capture = implode(",", $_POST["eskill"]);
}

         $work_post ="";
           $work_place ="";
         $work_duration ="";

        if( isset($_POST["work_duration"]) && is_array($_POST["work_duration"]) && isset($_POST["work_place"]) && is_array($_POST["work_place"]) && isset($_POST["work_post"]) && is_array($_POST["work_post"])){
    $work_duration = implode(",", $_POST["work_duration"]);
      $work_place = implode(",", $_POST["work_place"]);
      $work_post = implode(",", $_POST["work_post"]);
}

         $project_name ="";
         $project_member ="";
         $project_guide ="";
         $project_duration ="";
        if( isset($_POST["project_guide"]) && is_array($_POST["project_guide"]) && isset($_POST["project_duration"]) && is_array($_POST["project_duration"]) && isset($_POST["project_member"]) && is_array($_POST["project_member"]) && isset($_POST["project_name"]) && is_array($_POST["project_name"])){
    $project_guide = implode(",", $_POST["project_guide"]);
    $project_duration = implode(",", $_POST["project_duration"]);
    $project_member = implode(",", $_POST["project_member"]);
    $project_name = implode(",", $_POST["project_name"]);
}


        $research =  $_SESSION["user_id"].".pdf";
        $research_tmp = $_FILES['research']['tmp_name'];

        if(isset($research))
        {
            $location = 'education/research/';
            move_uploaded_file($research_tmp, $location.$research);
        }

         $project = $_SESSION["user_id"].".pdf";
        $project_tmp = $_FILES['project']['tmp_name'];

        if(isset($project))
        {
            $location = 'education/project/';
            move_uploaded_file($project_tmp, $location.$project);
        }



        $research =  $_SESSION["user_id"].".pdf";
        $research_tmp = $_FILES['work_exp']['tmp_name'];

        if(isset($research))
        {
            $location = 'education/work_photo/';
            move_uploaded_file($research_tmp, $location.$research);
        }

         $project = $_SESSION["user_id"].".pdf";
        $project_tmp = $_FILES['awards_certi']['tmp_name'];

        if(isset($project))
        {
            $location = 'education/awards_certi_photo/';
            move_uploaded_file($project_tmp, $location.$project);
        }


 $sql = "SELECT * FROM info_doc WHERE roll_no=$temp";

   $retval = mysqli_query($conn,$sql);
   $row = mysqli_fetch_assoc($retval);
    if(isset($_POST['submit_edu']))
        {
            $cet_score=$_POST['cet_score'];
            $jee_score=$_POST['jee_score'];
            $state_rank=$_POST['sml_rank'];
            $year=$_POST['aca_year'];
            $score_10=$_POST['percent_10'];
            $score_12=$_POST['percent_12'];
            $first_y_marks=$_POST['cgpa_1'];
            $sec_y_marks=$_POST['cgpa_2'];
            $thi_y_marks=$_POST['cgpa_3'];
            $fi_y_mark=$_POST['cgpa_4'];
            $passing_10=$_POST['passing_10'];
            $passing_12=$_POST['passing_12'];
            $passing_first=$_POST['passing_fy'];
            $passing_sec=$_POST['passing_sy'];
            $passing_third=$_POST['passing_ty'];
            $passing_fourth=$_POST['passing_final'];
            $pass_university_10=$_POST['board_10'];
            $pass_university_12=$_POST['board_12'];
            $skill = $_POST['skill'];
            $extra_skill = $_POST['extra_skill'];
            $work_post = $_POST['work_post'];
            $project_name = $_POST['project_name'];


            $query3=mysqli_query($conn,"update info_doc set cet_score='$cet_score',jee_score='$jee_score', state_rank='$state_rank', year='$year' , score_10='$score_10', score_12='$score_12', first_y_marks='$first_y_marks', sec_y_marks='$sec_y_marks', thi_y_marks='$thi_y_marks', fi_y_mark='$fi_y_mark', passing_10='$passing_10', passing_12='$passing_12', passing_first='$passing_first', passing_sec='$passing_sec',passing_third='$passing_third',passing_fourth='$passing_fourth',pass_university_10='$pass_university_10', pass_university_12='$pass_university_12', skill = ' $skill', extra_skill = '$extra_skill', work_post='$work_post', project_name='$project_name' where roll_no='$temp'");

if($query3)
{
      header('location:post_edit_msg.php');
}
}

   mysqli_close($conn);




?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Educational Details</title>

  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../LOGIN/css/bootstrap.min.css" rel="stylesheet">
    <link href="../LOGIN/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="../LOGIN/css/bootstrapValidator.min.css" rel="stylesheet">
    <link href="../LOGIN/style.css" rel="stylesheet">
    <link href="../LOGIN/css/style.css" rel="stylesheet">
    <link href="../LOGIN/css/bootstrap.css" rel="stylesheet" />
    <link href="../LOGIN/css/font-awesome.css" rel="stylesheet" />
    <link href="css/custom.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
</head>
<body>
<style>
    .container{
        width: 90%;
    }

    .form-group{
        margin-bottom:5px;

    }
     .green {
          color: green
      }
      .red{
          color:red
      }
    </style>


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
            <h1>Education Details</h1>
        </div>
      </div>
      <?php include 'topBar.php'; ?>
<p style="padding:40px;"></p>
<div class= "col-md-2"></div>
<div class= "col-md-10">
<div class="row row-content">
            <center><div class="col-xs-12 col-sm-12">
            <ul class="prg_track">
            <li class="active"><a href="edit_personal_details.php">Personal Details</a></li>
            <li class=""><a href="edit_edu_details.php">Educational Details</a></li>
            <li><a href="edit_bank_details.php">Banking Information</a></li>
            </ul>
            </div></center>
            </div></div>
        <p style="padding:20px;"></p>
        <p style="margin:50px"></p>

        <div class="container">
        <div class="row">
        <form class="form" id="edu_det" action="" method="POST"  enctype="multipart/form-data">
                 <div class="row">
                <div class="col-sm-5 col-sm-offset-1">
                <div class="form-group">
                  <label for="cetscore">CET Score:</label>
                    <input type="number" class="form-control" value="<?php echo $row['cet_score']; ?>"  placeholder="CET Score" name="cet_score">
                </div>
                </div>

                 <div class="col-sm-5">
                <div class="form-group">
                  <label for="cetcomposite">CET Marksheet:</label> <a title="You can Enter Scanned Copies. Each File Must Be Less Than 100KB" onClick="alert('You can Enter Mutiple Scanned Copies. Each File Must Be Less Than 100KB')"><img src="index.jpg" height="13px"/></a>
                    <input type="file" class="form-control" accept="image/*" name="cet_composite">
                </div>
                </div>

                <div class="col-sm-5 col-sm-offset-1">
                <div class="form-group">
                  <label for="jee score">JEE Score:</label>
                    <input type="number" class="form-control" value="<?php echo $row['jee_score']; ?>" placeholder="JEE Score" name="jee_score">
                </div>
                </div>


                <div class="col-sm-5 ">
                <div class="form-group">
                  <label for="jeecomposite">JEE Marksheet:</label> <a title="You can Enter Scanned Copies. Each File Must Be Less Than 100KB" onClick="alert('You can Enter Mutiple Scanned Copies. Each File Must Be Less Than 100KB')"><img src="index.jpg" height="13px"/></a>
                    <input type="file" class="form-control" accept="image/*" name="jee_composite">
                </div>
                </div>

                <div class="col-sm-5 col-sm-offset-3">
                <div class="form-group">
                  <label for="staterank">State Rank: <font style="color:#FF0000">*</font></label>
                    <input type="number" class="form-control" value="<?php echo $row['state_rank']; ?>" placeholder="State Rank" name="sml_rank">
                </div>
                </div>



            <div class="col-sm-5 col-sm-offset-3">
              <div class="form-group">
                  <label for="sel1">Year : </lable>
                  <label class="radio-inline"><input type="radio" value="first" id="first" name="aca_year" onClick="toggleOther(this,'tenth','twelth','fy','10year','12year','fyyear','10board','12board')">First</label>

                  <label class="radio-inline"><input type="radio" value="second" id="second" name="aca_year" onClick="toggleOther(this,'tenth','twelth','fy','sy','10year','12year','fyyear','syyear','10board','12board')">Second</label>

                  <label class="radio-inline"><input type="radio" value="third" id="third" name="aca_year" onClick="toggleOther(this,'tenth','twelth','fy','sy','ty','10year','12year','fyyear','syyear','tyyear','10board','12board')">Third</label>

                  <label class="radio-inline"><input type="radio" value="final" id="final" name="aca_year" onClick="toggleOther(this,'tenth','twelth','fy','sy','ty','Final','10year','12year','fyyear','syyear','tyyear','fiyear','10board','12board')">Final</label>
        </div>
        <script type="text/javascript">
                    var yearValue = "<?php echo $row['year']; ?>";
                        document.getElementById(yearValue).click();
             </script>
            </div>

            </div>
    <div class="panel panel-info">
      <div class="panel-heading"><h1 class="panel-title" style="color:black">Higher Education <a title="Diploma Students can fill there details from second year onwards. If you have not got any C.G.P.A. you can enter S.G.P.A. also" onClick="alert('Diploma Students can fill there details from second year onwards. If you have not got any C.G.P.A. you can enter S.G.P.A. also')"><img src="index.jpg" height="13px"/></a></div>
      <div class="panel-body" style="font-size:100%">
          <div class="col-sm-12">

    <div class="col-sm-3">
      <h3>Exams</h3>
        <h4>10<sup>th</sup><p style="padding:9px"></p>
      <h4>12<sup>th</sup></h4><p style="padding:9px"></p>
      <h4>First Year</h4><p style="padding:9px"></p>
      <h4>Second Year</h4><p style="padding:9px"></p>
      <h4>Third Year</h4><p style="padding:9px"></p>
      <h4>Final Year</h4><p style="padding:9px"></p>



    </div>
    <div class="col-sm-3">
      <h3><center>CGPA/Percent</center></h3>
      <input type="text" placeholder="10th Percentage" value="<?php echo $row['score_10']; ?>" class="form-control" id="tenth" name="percent_10" disabled="disabled"><br>
      <input type="text" class="form-control" value="<?php echo $row['score_12']; ?>" placeholder="12th Percentage" id="twelth" name="percent_12" disabled="disabled"><br>
      <input type="text" class="form-control" value="<?php echo $row['first_y_marks']; ?>" placeholder="F.Y.  C.G.P.A." id="fy" name="cgpa_1" disabled="disabled"><br>
      <input type="text" class="form-control" value="<?php echo $row['sec_y_marks']; ?>" placeholder="S.Y.  C.G.P.A." id="sy" name="cgpa_2" disabled="disabled"><br>
      <input type="text" class="form-control" value="<?php echo $row['thi_y_marks']; ?>" placeholder="T.Y.  C.G.P.A." id="ty" name="cgpa_3" disabled="disabled"><br>
      <input type="text" class="form-control" value="<?php echo $row['fi_y_mark']; ?>" placeholder="F.Y.  C.G.P.A." id="final" name="cgpa_4" disabled="disabled"><br>

    </div>
    <div class="col-sm-3">
      <h3><center>Passing Year</center></h3>
       <select class="form-control" id="10year" value="<?php echo $row['passing_10']; ?>" name="passing_10" disabled="disabled">
    <option value="<?php echo $row['passing_10']; ?>" selected disabled><?php echo $row['passing_10']; ?></option>
    <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
  </select><br>
  <select class="form-control" id="12year" value="<?php echo $row['passing_12']; ?>"  name="passing_12" disabled="disabled">
    <option value="<?php echo $row['passing_12']; ?>" selected disabled><?php echo $row['passing_12']; ?></option>
   <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
  </select><br>
  <select class="form-control" id="fyyear"  name="passing_fy" disabled="disabled">
    <option value="<?php echo $row['passing_first']; ?>" selected disabled><?php echo $row['passing_first']; ?></option>
   <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
      <option value="2016">2016</option>
      <option value="2017">2017</option>
  </select><br>
  <select class="form-control" id="syyear"  name="passing_sy" disabled="disabled">
    <option value="<?php echo $row['passing_sec']; ?>" selected disabled><?php echo $row['passing_sec']; ?></option>
    <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
  </select><br>
  <select class="form-control" id="tyyear" name="passing_ty" disabled="disabled">
    <option value="<?php echo $row['passing_third']; ?>" selected disabled><?php echo $row['passing_third']; ?></option>
   <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
  </select><br>
  <select class="form-control" id="fiyear" name="passing_final" disabled="disabled">
    <option value="<?php echo $row['passing_fourth']; ?>" selected disabled><?php echo $row['passing_fourth']; ?></option>
    <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
  </select><br><br>


    </div>

      <div class="col-sm-3">
      <h3 align=center>State Board</h3>
        <select name="board_10" class="form-control" id="10board" name="board_10" disabled="disabled">
<option value="<?php echo $row['pass_university_10']; ?>" selected disabled><?php echo $row['pass_university_10']; ?></option>
<option value="cbse">CBSE</option>
<option value="issc">ICSE</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Orissa">Orissa</option>
<option value="Pondicherry">Pondicherry</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Tripura">Tripura</option>
<option value="Uttaranchal">Uttaranchal</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="West Bengal">West Bengal</option>
</select><br>
       <select name="board_12" class="form-control" id="12board" name="board_12" disabled="disabled">
<option value="<?php echo $row['pass_university_12']; ?>" selected disabled><?php echo $row['pass_university_12']; ?></option>
<option value="cbsc">CBSC</option>
<option value="issc">ICSC</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Orissa">Orissa</option>
<option value="Pondicherry">Pondicherry</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Tripura">Tripura</option>
<option value="Uttaranchal">Uttaranchal</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="West Bengal">West Bengal</option>
</select><br>
        <input type="text" value="Dr. Babasaheb Ambedkar Technological University" class="form-control" disabled><br>
        <input type="text" value="Dr. Babasaheb Ambedkar Technological University" class="form-control" disabled><br>
        <input type="text" value="Dr. Babasaheb Ambedkar Technological University" class="form-control" disabled><br>
        <input type="text" value="Dr. Babasaheb Ambedkar Technological University" class="form-control" disabled><br>


      </div>
          </div>
  </div>
</div>


     <div class="panel panel-info">
      <div class="panel-heading"><h1 class="panel-title" style="color:black">Portfolio</h1></div>
      <div class="panel-body" style="font-size:130%">

           <div class="row">
               <div class="col-sm-5">
              <div class="form-group">
     <label for="skills">Professional Skills</label><br>


                 <textarea class="form-control" name="skill"   rows="6" ><?php echo $row['skill']; ?></textarea>

                  </div></div>


        <div class="col-sm-5 col-sm-offset-1">
   <div class="form-group">
     <label for="skills">Extra Curricular Skills</label> <br>




        <textarea class="form-control" name="extra_skill"   rows="6" ><?php echo $row['extra_skill']; ?></textarea>

     </div>
    </div>
          </div>

          <hr>
          <div class="row">
               <div class="col-sm-5">
              <div class="form-group">
     <label for="skills">Work &amp; Internship</label><br>


                 <textarea class="form-control" name="work_post"   rows="6" ><?php echo $row['work_post']; ?></textarea>

                  </div></div>


        <div class="col-sm-5 col-sm-offset-1">
   <div class="form-group">
     <label for="skills">Project &amp; Research Paper</label> <br>




        <textarea class="form-control" name="project_name"   rows="6" ><?php echo $row['project_name']; ?></textarea>

     </div>
    </div>
          </div>



          <hr>


          <div class="row">

    <div class="col-sm-5 col-sm-offset-1">
   <div class="form-group">
     <label for="skills">Other Activities</label><br>
    <textarea class="form-control" rows="7"name="extra_activity"><?php echo $row['other_acti']; ?></textarea>
     </div>
    </div>

   </div>

          <hr>

          <p style="padding:10px;"></p>
          <div class="form-group">
<div class="col-sm-6">
    <label for="project">Project: <a title="You can Enter Mutiple pdf. Each File Must Be Less Than 500KB" onClick="alert('You can Enter Mutiple pdf. Each File Must Be Less Than 500KB')"><img src="index.jpg" height="13px"/></a></label><br>

            <input type="file" class="form-control" name="project">

              </div>

  </div>
          <div class="form-group">
          <div class="col-sm-6">
    <label for="project">Research Paper : <a title="You can Enter Mutiple pdf. Each File Must Be Less Than 500KB" onClick="alert('You can Enter Mutiple pdf. Each File Must Be Less Than 500KB')"><img src="index.jpg" height="13px"/></a></label><br>


            <input type="file" class="form-control" name="research">

        </div>


  </div>

          <div class="col-sm-6">
      <div class="form-group">
         <label for="work">Work Experience:  <a title="You can Enter Mutiple pdf. Each File Must Be Less Than 500KB" onClick="alert('You can Enter Mutiple pdf. Each File Must Be Less Than 500KB')"><img src="index.jpg" height="13px"/></a></label><br>
  <div calss="col-sm-6">

      <input type="file" id="files" class="form-control" name="work_exp" multiple>

  </div>
    </div> </div>

               <div class="col-sm-6">
      <div class="form-group">
          <label for="awards">Awards &amp; Certification: <a title="You can Enter Mutiple pdf. Each File Must Be Less Than 500KB" onClick="alert('You can Enter Mutiple pdf. Each File Must Be Less Than 500KB')"><img src="index.jpg" height="13px"/></a></label><br>


      <input type="file" id="awardscert" class="form-control" name="awards_certi" multiple>

</div>
              </div>


         </div></div>
         <div class="form-group">
                        <div class="col-xs-8 col-xs-offset-2 col-lg-4 col-lg-offset-4">
                            <p style="padding: 5px;"></p>
                        <button type="submit" name="submit_edu" class="btn btn-primary btn-block">Save &amp; Continue</button>
                        </div>
                       </div>

    </form>
            </div>
              </div>
















<p style="padding:40px;"></p>
     <?php include "footer.php"; ?>
            </div>
            </div>
     <script src="js/jquery-3.1.1.js"></script>
    <script src="../login/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../login/js/bootstrapValidator.min.js" type="text/javascript"></script>

           <script>

  $(document).ready(function() {
     //maximum input boxes allowed
    var wrapper         = $("#wrap"); //Fields wrapper
    var add_button      = $("#add"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x >=0){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<tr><td><input type="text" class="form-control" name="mytext[]"  value='+$("#c").val()+'></td><td><input class="form-control" type="text" name="text[]" value='+$("#c1").val()+'></td><td><button class="remove_field">Remove</button></td></tr>'); //add input box
        }
    });

    $(wrapper).on('click','.remove_field',function(e){
        e.preventDefault();
                    $(this).closest('tr').remove();
                });
});

</script>


           <script>

  $(document).ready(function() {
     //maximum input boxes allowed
    var wrap         = $("#wraper"); //Fields wrapper
    var add      = $("#add_row"); //Add button ID

    var x = 1; //initlal text box count
    $(add).click(function(e){ //on add input button click
        e.preventDefault();
        if(x >=0){ //max input box allowed
            x++; //text box increment
            $(wrap).append('<tr><td><input type="number" class="form-control" name="eno[]"  value='+$("#e").val()+'></td><td><input class="form-control" type="text" name="eskill[]" value='+$("#e1").val()+'></td><td><button class="remove_field">Remove</button></td></tr>'); //add input box
        }
    });

    $(wrap).on('click','.remove_field',function(e){
        e.preventDefault();
                    $(this).closest('tr').remove();
                });
});

</script>

             <script>

  $(document).ready(function() {
     //maximum input boxes allowed
    var work_table         = $("#work_table"); //Fields wrapper
    var add_table_row      = $("#add_work_table"); //Add button ID

    var x = 1; //initlal text box count
    $(add_table_row).click(function(e){ //on add input button click
        e.preventDefault();
        if(x >=0){ //max input box allowed
            x++; //text box increment
            $(work_table).append('<tr><td><input type="number" class="form-control" name="work_no[]"  value='+$("#work1").val()+'></td><td><input class="form-control" type="text" name="work_post[]" value='+$("#work2").val()+'></td><td><input class="form-control" type="text" name="work_place[]" value='+$("#work3").val()+'></td><td><input class="form-control" type="text" name="work_duration[]" value='+$("#work4").val()+'></td><td><button class="remove_field">Remove</button></td></tr>'); //add input box
        }
    });

    $(work_table).on('click','.remove_field',function(e){
        e.preventDefault();
                    $(this).closest('tr').remove();
                });
});

</script>



             <script>

  $(document).ready(function() {
     //maximum input boxes allowed
    var project_table         = $("#project_table"); //Fields wrapper
    var add_project_row      = $("#add_project_table"); //Add button ID

    var x = 1; //initlal text box count
    $(add_project_row).click(function(e){ //on add input button click
        e.preventDefault();
        if(x >=0){ //max input box allowed
            x++; //text box increment
            $(project_table).append('<tr><td><input type="number" class="form-control" name="project_no[]"  value='+$("#project1").val()+'></td><td><input class="form-control" type="text" name="project_name[]" value='+$("#project2").val()+'></td><td><input class="form-control" type="text" name="project_member[]" value='+$("#project3").val()+'></td><td><input class="form-control" type="text" name="project_guide[]" value='+$("#project4").val()+'></td><td><input class="form-control" type="text" name="project_duration[]" value='+$("#project5").val()+'></td><td><button class="remove_field">Remove</button></td></tr>'); //add input box
        }
    });

    $(project_table).on('click','.remove_field',function(e){
        e.preventDefault();
                    $(this).closest('tr').remove();
                });
});

</script>


<script type="text/javascript">
 function toggleOther(ddd,whtt,ee,who,when,why,a,b,c,d,e,f,g,h,i)
    {
     if(ddd.checked)
    { document.getElementById(ee).disabled=0 }
     else
      { document.getElementById(ee).disabled=1 }

    if(ddd.checked)
    { document.getElementById(whtt).disabled=0 }
     else
      { document.getElementById(whtt).disabled=1 }

         if(ddd.checked)
    { document.getElementById(who).disabled=0 }
     else
      { document.getElementById(who).disabled=1 }

    if(ddd.checked)
    { document.getElementById(when).disabled=0 }
     else
      { document.getElementById(when).disabled=1 }

     if(ddd.checked)
    { document.getElementById(why).disabled=0 }
     else
      { document.getElementById(why).disabled=1 }

         if(ddd.checked)
    { document.getElementById(a).disabled=0 }
     else
      { document.getElementById(a).disabled=1 }

         if(ddd.checked)
    { document.getElementById(b).disabled=0 }
     else
      { document.getElementById(b).disabled=1 }

         if(ddd.checked)
    { document.getElementById(c).disabled=0 }
     else
      { document.getElementById(c).disabled=1 }

         if(ddd.checked)
    { document.getElementById(d).disabled=0 }
     else
      { document.getElementById(d).disabled=1 }

         if(ddd.checked)
    { document.getElementById(e).disabled=0 }
     else
      { document.getElementById(e).disabled=1 }

         if(ddd.checked)
    { document.getElementById(f).disabled=0 }
     else
      { document.getElementById(f).disabled=1 }

         if(ddd.checked)
    { document.getElementById(g).disabled=0 }
     else
      { document.getElementById(g).disabled=1 }

    if(ddd.checked)
    { document.getElementById(h).disabled=0 }
     else
      { document.getElementById(h).disabled=1 }

     if(ddd.checked)
    { document.getElementById(i).disabled=0 }
     else
      { document.getElementById(i).disabled=1 }

    }




    $(document).ready(function()
        {
            var validator= $("#edu_det").bootstrapValidator({


                fields : {
                    sml_rank : {
                        message : "State rank is required",
                        validators : {
                            notEmpty : {
                                message : "Please provide State rank."
                            }
                        }
                    },


                     aca_year : {
                        validators : {
                            notEmpty : {
                                message : "Please Provide Academic Year."
                            }
                        }
                    },



                    project : {
                         validators : {
                             file: {
                                 extension: 'pdf',
                                 maxSize: 502400,
                                 message: 'selected file is not supported or bigger.'
                             }

                        }
                    },

                     research : {
                         validators : {
                             file: {
                                 extension: 'pdf',
                                 maxSize: 502400,
                                 message: 'selected file is not supported or bigger.'
                             }

                        }
                    },

                     work_exp : {
                         validators : {
                             file: {
                                 extension: 'pdf',
                                 maxSize: 502400,
                                 message: 'selected file is not supported or bigger.'
                             }

                        }
                    },

                     awards_certi : {
                         validators : {
                             file: {
                                 extension: 'pdf',
                                 maxSize: 504800,
                                 message: 'selected file is not supported or bigger.'
                             }

                        }
                    },

                     cet_composite : {
                         validators : {
                             file: {
                                 extension: 'jpg,jpeg,png',
                                 type:'image/jpg,image/jpeg,image/png',
                                 maxSize: 204800,
                                 message: 'selected file is not supported or bigger.'
                             }

                        }
                    },

                     jee_composite : {
                         validators : {
                             file: {
                                 extension: 'jpg,jpeg,png',
                                 type:'image/jpg,image/jpeg,image/png',
                                 maxSize: 204800,
                                 message: 'selected file is not supported or bigger.'
                             }

                        }
                    },

                     prof_skills: {
                    validators: {
                        stringLength: {
                            max: 1000,
                            message: 'The description must be less than 1000 characters'
                        }
                    }
                },
                    extra_activity: {
                    validators: {
                        stringLength: {
                            max: 1000,
                            message: 'The description must be less than 200 characters'
                        }
                    }
                },
                    workshop_internship: {
                    validators: {
                        stringLength: {
                            max: 1000,
                            message: 'The description must be less than 1000 characters'
                        }
                    }
                },
                    extra_skills: {
                    validators: {
                        stringLength: {
                            max: 1000,
                            message: 'The description must be less than 1000 characters'
                        }
                    }
                },


                }
            });
        });


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
>>>>>>> c85b78f457622636fce930f3820bd28f1d8600ab
    </body></html>

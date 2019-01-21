<?php

	require 'dbconfig.php';
	session_start();
  include 'isLoggedInStudent.php';
$roll_no = $_SESSION["user_id"];
     $branch = $_SESSION['discipline'];

	if(isset($_POST['submit_edu']))
	{
        $roll_no = $_SESSION["user_id"];
     $branch = $_SESSION['discipline'];


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



         $work_photo =  $_SESSION["user_id"].".jpg";
$work_photo_tmp = $_FILES['work_exp']['tmp_name'];

$extc = pathinfo($work_photo,PATHINFO_EXTENSION);

if($extc == 'jpg' || $extc == 'jpeg' || $extc == 'JPG' || $extc == 'JPEG')
{
    $srcc=imagecreatefromjpeg($work_photo_tmp);
}

    list($width_min,$height_min) = getimagesize($work_photo_tmp);

    $newwidth_min = 350;
    $newheight_min = ($height_min / $width_min)*$newwidth_min;

    $tmp_min = imagecreatetruecolor($newwidth_min,$newheight_min);

    imagecopyresampled($tmp_min,$srcc,0,0,0,0,$newwidth_min,$newheight_min, $width_min,$height_min);

    imagejpeg($tmp_min,"education/work_photo/".$work_photo,80);



          $awards_certi_photo = $_SESSION["user_id"].".jpg";
$awards_certi_photo_tmp = $_FILES['awards_certi']['tmp_name'];

$extc = pathinfo($awards_certi_photo,PATHINFO_EXTENSION);

if($extc == 'jpg' || $extc == 'jpeg' || $extc == 'JPG' || $extc == 'JPEG')
{
    $srcc=imagecreatefromjpeg($awards_certi_photo_tmp);
}

    list($width_min,$height_min) = getimagesize($awards_certi_photo_tmp);

    $newwidth_min = 350;
    $newheight_min = ($height_min / $width_min)*$newwidth_min;

    $tmp_min = imagecreatetruecolor($newwidth_min,$newheight_min);

    imagecopyresampled($tmp_min,$srcc,0,0,0,0,$newwidth_min,$newheight_min, $width_min,$height_min);

    imagejpeg($tmp_min,"education/awards_certi_photo/".$awards_certi_photo,80);


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


        $research =  $_SESSION["user_id"].".docx";
        $research_tmp = $_FILES['research']['tmp_name'];

        if(isset($research))
        {
            $location = 'education/research/';
            move_uploaded_file($research_tmp, $location.$research);
        }

         $project = $_SESSION["user_id"].".docx";
        $project_tmp = $_FILES['project']['tmp_name'];

        if(isset($project))
        {
            $location = 'education/project/';
            move_uploaded_file($project_tmp, $location.$project);
        }


			$ins_sql = "INSERT INTO info_doc(roll_no,discipline,cet_score,cet_marksheet,jee_score,jee_marksheet,state_rank,year,score_10,score_12,	first_y_marks,sec_y_marks,thi_y_marks,fi_y_mark,passing_10,passing_12,passing_first,passing_sec,passing_third,passing_fourth,pass_university_10,pass_university_12,	pass_university_fy,	pass_university_sec,pass_university_thi,pass_university_for,other_acti,project,project_photo_name,research,research_photo_name,work_exp,awards_certi,skill,extra_skill,work_post,work_place,work_duration,project_name,project_member,project_guide,project_duration,cet_photo_name,jee_photo_name,work_photo_name,awards_photo_name) values('$roll_no','$branch','$_POST[cet_score]','$_FILES[cet_composite]','$_POST[jee_score]','$_FILES[jee_composite]','$_POST[sml_rank]','$_POST[aca_year]','$_POST[percent_10]','$_POST[percent_12]','$_POST[cgpa_1]','$_POST[cgpa_2]','$_POST[cgpa_3]','$_POST[cgpa_4]','$_POST[passing_10]','$_POST[passing_12]','$_POST[passing_fy]','$_POST[passing_sy]','$_POST[passing_ty]','$_POST[passing_final]','$_POST[board_10]','$_POST[board_12]','Dr.Babasaheb Ambedkar Technological Univeristy','Dr.Babasaheb Ambedkar Technological Univeristy','Dr.Babasaheb Ambedkar Technological Univeristy','Dr.Babasaheb Ambedkar Technological Univeristy','$_POST[extra_activity]','$_FILES[project]','$project','$_FILES[research]','$research','$_FILES[work_exp]','$_FILES[awards_certi]','$capture_field','$capture','$work_post','$work_place','$work_duration','$project_name','$project_member','$project_guide','$project_duration','$cet_photo','$jee_photo','$work_photo','$awards_certi_photo')";

        $run_sql = mysqli_query($connection,$ins_sql);

			if($run_sql)
            {
			header("location: Main1.php");
                exit;
            }


	}


?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Educational Details</title>

  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/bootstrapValidator.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <link href="css/custom.css" rel="stylesheet" />
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
                    <a href="../FRONT/editprofile.<?php  ?>"><span  class="glyphicon glyphicon-home"></span> Dashboard</a>
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


<div class="jumbotron text-center">
  <h1>Education Details</h1>
</div>

    <p style="padding:5px;"></p>
        <div class="col-sm-offset-11"><a href="../LOGIN/logout.php"><button type="submit" class="btn btn-danger">LOGOUT</button></a></div>
                    <p style="padding:20px;"></p>
        <div class="col-sm-offset-1">
        <h3 align="center">Welcome <?php echo $_SESSION["user_id"] ?></h3>  <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><span class="glyphicon glyphicon-list"></span> More</a>
        </div>



    <p style="margin:50px"></p>
   <div class="row row-content">
            <div class="col-xs-12 col-sm-12">
            <ul class="prg_track">
            <li class="active"><a href="#">Personal Details</a></li>
            <li><a href="edudetails.php">Educational Details</a></li>
            <li><a href="#">Account Details</a></li>
            <li><a href="#">Step 4</a></li>
            </ul>
            </div>
            </div>

    <p style="margin:50px"></p>

        <div class="container">

          <div class="row">


        <form class="form" id="edu_det" action="edudetails.php" method="post"  enctype="multipart/form-data">
                 <div class="row">
                <div class="col-sm-5 col-sm-offset-1">
                <div class="form-group">
                  <label for="cetscore">CET Score:</label>
                    <input type="number" class="form-control" placeholder="CET Score" name="cet_score">
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
                    <input type="number" class="form-control" placeholder="JEE Score" name="jee_score">
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
                    <input type="number" class="form-control" placeholder="State Rank" name="sml_rank">
                </div>
                </div>



            <div class="col-sm-5 col-sm-offset-3">
              <div class="form-group">
                  <label for="sel1">Year : </lable>
                  <label class="radio-inline"><input type="radio" value="first" name="aca_year" onClick="selectedFirstYear()">First</label>

                <label class="radio-inline"><input type="radio" value="second" name="aca_year" onClick="selectedSecondYear()">Second</label>

            <label class="radio-inline"><input type="radio" value="third" name="aca_year" onClick="selectedThirdYear()">Third</label>

            <label class="radio-inline"><input type="radio" value="final" name="aca_year" onClick="selectedFinalYear()">Final</label>


        </div>
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
      <input type="text" placeholder="10th Percentage" class="form-control" id="tenth" name="percent_10" disabled="disabled"><br>
      <input type="text" class="form-control" placeholder="12th Percentage" id="twelth" name="percent_12" disabled="disabled"><br>
      <input type="text" class="form-control" placeholder="F.Y.  C.G.P.A." id="fy" name="cgpa_1" disabled="disabled"><br>
      <input type="text" class="form-control" placeholder="S.Y.  C.G.P.A." id="sy" name="cgpa_2" disabled="disabled"><br>
      <input type="text" class="form-control" placeholder="T.Y.  C.G.P.A." id="ty" name="cgpa_3" disabled="disabled"><br>
      <input type="text" class="form-control" placeholder="F.Y.  C.G.P.A." id="final" name="cgpa_4" disabled="disabled"><br>

    </div>
    <div class="col-sm-3">
      <h3><center>Passing Year</center></h3>
       <select class="form-control" id="10year" name="passing_10" disabled="disabled">
    <option value="" selected disabled>10th Passing Year</option>
    <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
  </select><br>
  <select class="form-control" id="12year"  name="passing_12" disabled="disabled">
    <option value="" selected disabled>12th Passing Year</option>
   <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
  </select><br>
  <select class="form-control" id="fyyear" name="passing_fy" disabled="disabled">
    <option value="" selected disabled>F.Y. Passing Year</option>
   <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
      <option value="2016">2016</option>
      <option value="2017">2017</option>
  </select><br>
  <select class="form-control" id="syyear"  name="passing_sy" disabled="disabled">
    <option value="" selected disabled>S.Y. Passing Year</option>
    <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
  </select><br>
  <select class="form-control" id="tyyear" name="passing_ty" disabled="disabled">
    <option value="" selected disabled>T.Y. Passing Year</option>
   <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
  </select><br>
  <select class="form-control" id="fiyear" name="passing_final" disabled="disabled">
    <option value="" selected disabled>F.Y. Passing Year</option>
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
<option value="" selected disabled>------------Select State------------</option>
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
       <select name="board_12" class="form-control" id="12board" name="board_12" disabled="disabled">
<option value="" selected disabled>------------Select State------------</option>
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


                  <div class="col-sm-3 col-sm-12" >
         <input type="number" placeholder="No." class="form-control" id="c">
         </div>
         <div class="col-sm-5 col-sm-12">
         <input type="text" placeholder="Skill" class="form-control" id="c1">
         </div>
         <div class="col-sm-2 col-sm-12">
           <button type="button" class="btn btn-info btn-xs" id="add">Add Skill  <span class="glyphicon glyphicon-plus"></span></button>
         </div>

         <br><br>




                    <table id="wrap" class="table table-condensed table-hover table-striped table-bordered" width="60%">
				<tr>
					<thead>
                        <th>No.</th>
					<th>Skill</th>
					<th>Delete</th>
                    </thead>
				</tr>

		</table>


                  </div></div>


        <div class="col-sm-5 col-sm-offset-1">
	 <div class="form-group">
	   <label for="skills">Extra Curricular Skills</label> <br>



         <div class="col-sm-3 col-sm-12" >
         <input type="number" placeholder="No." class="form-control" id="e">
         </div>
         <div class="col-sm-5 col-sm-12">
         <input type="text" placeholder="Skill" class="form-control" id="e1">
         </div>
         <div class="col-sm-2 col-sm-12">
           <button type="button" class="btn btn-info btn-xs" id="add_row">Add Skill  <span class="glyphicon glyphicon-plus"></span></button>
         </div>

         <br><br>
         <table id="wraper" class="table table-condensed table-hover table-striped table-bordered" width="60%">
				<tr>
					<thead>
                        <th>No.</th>
					<th>Skill</th>
					<th>Delete</th>
                    </thead>
				</tr>

		</table>

	 	 </div>
	  </div>
          </div>

          <hr>

          <div class="row">

               <div class="col-sm-12">
	 <div class="form-group">
	   <label for="workintern">Workshop &amp; Internship</label><br>

         <div class="col-sm-1 col-sm-12" >
         <input type="number" placeholder="No." class="form-control" id="work1">
         </div>
         <div class="col-sm-3 col-sm-12">
         <input type="text" placeholder="Post" class="form-control" id="work2">
         </div>

          <div class="col-sm-3 col-sm-12">
         <input type="text" placeholder="Place" class="form-control" id="work3">
         </div>

          <div class="col-sm-3 col-sm-12">
         <input type="text" placeholder="Duration" class="form-control" id="work4">
         </div>

         <div class="col-sm-2 col-sm-12">
           <button type="button" class="btn btn-info btn-xs" id="add_work_table">Add Skill  <span class="glyphicon glyphicon-plus"></span></button>
         </div>

         <br><br>

                  <table id="work_table" class="table table-condensed table-hover table-striped table-bordered" width="60%">

				<tr>
					<thead>
                        <th>No.</th>
					<th>Post</th>
					<th>Place</th>
					<th>Duration</th>
					<th>Delete</th>
                    </thead>
				</tr>

		</table>

	 	 </div>
	  </div>

          </div>
          <hr>


          <div class="row">
          <div class="col-sm-12">
             <div class="form-group">
               <label>Project &amp; Research Paper</label><br>

                  <div class="col-sm-1 col-sm-12" >
         <input type="number" placeholder="No." class="form-control" id="project1">
         </div>
         <div class="col-sm-2 col-sm-12">
         <input type="text" placeholder="Name" class="form-control" id="project2">
         </div>

          <div class="col-sm-3 col-sm-12">
         <input type="text" placeholder="Member" class="form-control" id="project3">
         </div>

          <div class="col-sm-2 col-sm-12">
         <input type="text" placeholder="Guide" class="form-control" id="project4">
         </div>

                  <div class="col-sm-2 col-sm-12">
         <input type="text" placeholder="Duration" class="form-control" id="project5">
         </div>

         <div class="col-sm-2 col-sm-12">
           <button type="button" class="btn btn-info btn-xs" id="add_project_table">Add Project  <span class="glyphicon glyphicon-plus"></span></button>
         </div>

         <br><br>

               <table id="project_table" class="table table-condensed table-hover table-striped table-bordered" width="60%">

				<tr>
					<thead>
                        <th>No.</th>
					<th>Name</th>
					<th>Members</th>
					<th>Guide</th>
					<th>Duration</th>
					<th>Delete</th>
                    </thead>
				</tr>

		</table>
              </div>
              </div>
          </div>

          <hr>


          <div class="row">

    <div class="col-sm-5 col-sm-offset-1">
	 <div class="form-group">
	   <label for="skills">Other Activities</label><br>
	  <textarea class="form-control" rows="7" name="extra_activity"></textarea>
	 	 </div>
	  </div>

   </div>

          <hr>

          <p style="padding:10px;"></p>
          <div class="form-group">
<div class="col-sm-6">
  	<label for="project">Project:<a title="You can Enter only one File with .docx, .doc Extension. File Must Be Less Than 100KB" onClick="alert('You can Enter File with .docx, .doc Extension. File Must Be Less Than 100KB')"><img src="index.jpg" height="13px"/></a></label><br>

            <input type="file" class="form-control" name="project">

              </div>

  </div>
          <div class="form-group">
          <div class="col-sm-6">
  	<label for="project">Research Paper :<a title="You can Enter only one File with .docx, .doc Extension. File Must Be Less Than 100KB" onClick="alert('You can Enter File with .docx, .doc Extension. File Must Be Less Than 100KB')"><img src="index.jpg" height="13px"/></a></label><br>


            <input type="file" class="form-control" name="research">

        </div>


  </div>

          <div class="col-sm-6">
      <div class="form-group">
         <label for="work">Work Experience: <a title="You can Enter Mutiple Scanned Copies. Each File Must Be Less Than 100KB" onClick="alert('You can Enter Mutiple Scanned Copies. Each File Must Be Less Than 100KB')"><img src="index.jpg" height="13px"/></a></label><br>
  <div calss="col-sm-6">

    	<input type="file" id="files" accept="image/*" class="form-control" name="work_exp" multiple>

  </div>
    </div> </div>

               <div class="col-sm-6">
      <div class="form-group">
          <label for="awards">Awards &amp; Certification: <a title="You can Enter Mutiple Scanned Copies. Each File Must Be Less Than 200KB" onClick="alert('You can Enter Mutiple Scanned Copies. Each File Must Be Less Than 200KB')"><img src="index.jpg" height="13px"/></a></label><br>


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
     <footer  class="row-footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-5 col-xs-offset-1 col-sm-3 col-sm-offset-1">
                    <h4>Links :</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Menu</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-xs-6 col-sm-4">
                    <h4>Our Address :</h4>
                    <address>
		              Dr. Babasaheb Ambedkar Technological University,<br>Lonere campus,<br>
                    Maharashtra 402103 <br><br>

		           </address>
                </div>
               <div class="col-xs-12 col-sm-4">
                   <h4>Contact :</h4>
                <span class="glyphicon glyphicon-earphone"></span> Prof. Mukund Kulkarni : +91 94212 52368<br>

		        <span class="glyphicon glyphicon-earphone"></span> Dr. Brijesh Iyer: +91 94030 02289<br>
                </div>
                <div class="col-xs-12">
                    <p style="padding:10px;"></p>
                    <p align=center>©2017 DBATU. All rights reserved. </p>
                </div>
            </div>
        </div>
    </footer>
            </div>
            </div>
     <script src="js/jquery-3.1.1.js"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/bootstrapValidator.min.js" type="text/javascript"></script>

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
            $(wrapper).append('<tr><td><input type="text" class="form-control" name="mytext[]"  value="'+$("#c").val()+'"></td><td><input class="form-control" type="text" name="text[]" value="'+$("#c1").val()+'"></td><td><button class="remove_field">Remove</button></td></tr>'); //add input box
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
            $(wrap).append('<tr><td><input type="number" class="form-control" name="eno[]"  value="'+$("#e").val()+'"></td><td><input class="form-control" type="text" name="eskill[]" value="'+$("#e1").val()+'"></td><td><button class="remove_field">Remove</button></td></tr>'); //add input box
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
            $(work_table).append('<tr><td><input type="number" class="form-control" name="work_no[]"  value="'+$("#work1").val()+'"></td><td><input class="form-control" type="text" name="work_post[]" value="'+$("#work2").val()+'"></td><td><input class="form-control" type="text" name="work_place[]" value="'+$("#work3").val()+'"></td><td><input class="form-control" type="text" name="work_duration[]" value="'+$("#work4").val()+'"></td><td><button class="remove_field">Remove</button></td></tr>'); //add input box
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
            $(project_table).append('<tr><td><input type="number" class="form-control" name="project_no[]"  value="'+$("#project1").val()+'"></td><td><input class="form-control" type="text" name="project_name[]" value="'+$("#project2").val()+'"></td><td><input class="form-control" type="text" name="project_member[]" value="'+$("#project3").val()+'"></td><td><input class="form-control" type="text" name="project_guide[]" value="'+$("#project4").val()+'"></td><td><input class="form-control" type="text" name="project_duration[]" value="'+$("#project5").val()+'"></td><td><button class="remove_field">Remove</button></td></tr>'); //add input box
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
                                 extension: 'docx,doc',
                                 maxSize: 102400,
                                 message: 'selected file is not supported or bigger.'
                             }

                        }
                    },

                     research : {
                         validators : {
                             file: {
                                 extension: 'docx,doc',
                                 maxSize: 102400,
                                 message: 'selected file is not supported or bigger.'
                             }

                        }
                    },

                     work_exp : {
                         validators : {
                             file: {
                                 extension: 'jpg,jpeg,png',
                                 type:'image/jpg,image/jpeg,image/png',
                                 maxSize: 102400,
                                 message: 'selected file is not supported or bigger.'
                             }

                        }
                    },

                     awards_certi : {
                         validators : {
                             file: {
                                 extension: 'jpg,jpeg,png',
                                 type:'image/jpg,image/jpeg,image/png',
                                 maxSize: 204800,
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
    </body></html>

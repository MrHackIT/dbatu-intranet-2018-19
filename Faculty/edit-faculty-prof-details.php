<?php

	session_start();
    ob_start();
    error_reporting(1);
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';

   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

   if(! $conn ) {
      die('Could not connect: ' . mysqli_connect_error());
   }
	mysqli_select_db($conn,'intranet');

    $_SESSION['t_emp_id']=$_POST['t_emp_id'];
    $_SESSION['t_discipline']=$_POST['t_discipline'];
	$temp = $_SESSION['user_id'];
    $sql = "SELECT * FROM t_professional_details WHERE t_emp_id=$temp";


	$t_award = $_SESSION["t_emp_id"].".jpg";
	$t_award_tmp = $_FILES['t_award']['tmp_name'];

	$extc = pathinfo($t_award,PATHINFO_EXTENSION);

if($extc == 'jpg' || $extc == 'jpeg' || $extc == 'JPG' || $extc == 'JPEG')
{
    $srcc=imagecreatefromjpeg($t_award_tmp);
}

    list($width_min,$height_min) = getimagesize($t_award_tmp);

    $newwidth_min = 350;
    $newheight_min = ($height_min / $width_min)*$newwidth_min;

    $tmp_min = imagecreatetruecolor($newwidth_min,$newheight_min);

    imagecopyresampled($tmp_min,$srcc,0,0,0,0,$newwidth_min,$newheight_min, $width_min,$height_min);

    imagejpeg($tmp_min,"t_prof_details/t_award/".$t_award,80);




	$t_conference = $_SESSION["t_emp_id"].".jpg";
    $t_conference_tmp = $_FILES['t_conference']['tmp_name'];

$extc = pathinfo($t_conference,PATHINFO_EXTENSION);

if($extc == 'jpg' || $extc == 'jpeg' || $extc == 'JPG' || $extc == 'JPEG')
{
    $srcc=imagecreatefromjpeg($t_conference_tmp);
}

    list($width_min,$height_min) = getimagesize($t_conference_tmp);

    $newwidth_min = 350;
    $newheight_min = ($height_min / $width_min)*$newwidth_min;

    $tmp_min = imagecreatetruecolor($newwidth_min,$newheight_min);

    imagecopyresampled($tmp_min,$srcc,0,0,0,0,$newwidth_min,$newheight_min, $width_min,$height_min);

    imagejpeg($tmp_min,"t_prof_details/t_conference/".$t_conference,80);


	$t_current_mem = $_SESSION["t_emp_id"].".jpg";
$t_current_mem_tmp = $_FILES['t_current_mem']['tmp_name'];

$extc = pathinfo($t_current_mem,PATHINFO_EXTENSION);

if($extc == 'jpg' || $extc == 'jpeg' || $extc == 'JPG' || $extc == 'JPEG')
{
    $srcc=imagecreatefromjpeg($t_current_mem_tmp);
}

    list($width_min,$height_min) = getimagesize($t_current_mem_tmp);

    $newwidth_min = 350;
    $newheight_min = ($height_min / $width_min)*$newwidth_min;

    $tmp_min = imagecreatetruecolor($newwidth_min,$newheight_min);

    imagecopyresampled($tmp_min,$srcc,0,0,0,0,$newwidth_min,$newheight_min, $width_min,$height_min);

    imagejpeg($tmp_min,"t_prof_details/t_current_mem/".$t_current_mem,80);



	$t_past_mem = $_SESSION["t_emp_id"].".jpg";
$t_past_mem_tmp = $_FILES['t_past_mem']['tmp_name'];

$extc = pathinfo($t_past_mem,PATHINFO_EXTENSION);

if($extc == 'jpg' || $extc == 'jpeg' || $extc == 'JPG' || $extc == 'JPEG')
{
    $srcc=imagecreatefromjpeg($t_past_mem_tmp);
}

    list($width_min,$height_min) = getimagesize($t_past_mem_tmp);

    $newwidth_min = 350;
    $newheight_min = ($height_min / $width_min)*$newwidth_min;

    $tmp_min = imagecreatetruecolor($newwidth_min,$newheight_min);

    imagecopyresampled($tmp_min,$srcc,0,0,0,0,$newwidth_min,$newheight_min, $width_min,$height_min);

    imagejpeg($tmp_min,"t_prof_details/t_past_mem/".$t_past_mem,80);


	$t_cur_project = $_SESSION["t_emp_id"].".jpg";
$t_cur_project_tmp = $_FILES['t_cur_project']['tmp_name'];

$extc = pathinfo($t_cur_project,PATHINFO_EXTENSION);

if($extc == 'jpg' || $extc == 'jpeg' || $extc == 'JPG' || $extc == 'JPEG')
{
    $srcc=imagecreatefromjpeg($t_cur_project_tmp);
}

    list($width_min,$height_min) = getimagesize($t_cur_project_tmp);

    $newwidth_min = 350;
    $newheight_min = ($height_min / $width_min)*$newwidth_min;

    $tmp_min = imagecreatetruecolor($newwidth_min,$newheight_min);

    imagecopyresampled($tmp_min,$srcc,0,0,0,0,$newwidth_min,$newheight_min, $width_min,$height_min);

    imagejpeg($tmp_min,"t_prof_details/t_cur_project/".$t_cur_project,80);




	$t_past_project = $_SESSION["t_emp_id"].".jpg";
$t_past_project_tmp = $_FILES['t_past_project']['tmp_name'];

$extc = pathinfo($t_past_project,PATHINFO_EXTENSION);

if($extc == 'jpg' || $extc == 'jpeg' || $extc == 'JPG' || $extc == 'JPEG')
{
    $srcc=imagecreatefromjpeg($t_past_project_tmp);
}

    list($width_min,$height_min) = getimagesize($t_past_project_tmp);

    $newwidth_min = 350;
    $newheight_min = ($height_min / $width_min)*$newwidth_min;

    $tmp_min = imagecreatetruecolor($newwidth_min,$newheight_min);

    imagecopyresampled($tmp_min,$srcc,0,0,0,0,$newwidth_min,$newheight_min, $width_min,$height_min);

    imagejpeg($tmp_min,"t_prof_details/t_past_project/".$t_past_project,80);



	$t_inter_research = $_SESSION["t_emp_id"].".jpg";
$t_inter_research_tmp = $_FILES['t_inter_research']['tmp_name'];

$extc = pathinfo($t_inter_research,PATHINFO_EXTENSION);

if($extc == 'jpg' || $extc == 'jpeg' || $extc == 'JPG' || $extc == 'JPEG')
{
    $srcc=imagecreatefromjpeg($t_inter_research_tmp);
}

    list($width_min,$height_min) = getimagesize($t_inter_research_tmp);

    $newwidth_min = 350;
    $newheight_min = ($height_min / $width_min)*$newwidth_min;

    $tmp_min = imagecreatetruecolor($newwidth_min,$newheight_min);

    imagecopyresampled($tmp_min,$srcc,0,0,0,0,$newwidth_min,$newheight_min, $width_min,$height_min);

    imagejpeg($tmp_min,"t_prof_details/t_inter_research/".$t_inter_research,80);



	$t_nat_research = $_SESSION["t_emp_id"].".jpg";
$t_nat_research_tmp = $_FILES['t_nat_research']['tmp_name'];

$extc = pathinfo($t_nat_research,PATHINFO_EXTENSION);

if($extc == 'jpg' || $extc == 'jpeg' || $extc == 'JPG' || $extc == 'JPEG')
{
    $srcc=imagecreatefromjpeg($t_nat_research_tmp);
}

    list($width_min,$height_min) = getimagesize($t_nat_research_tmp);

    $newwidth_min = 350;
    $newheight_min = ($height_min / $width_min)*$newwidth_min;

    $tmp_min = imagecreatetruecolor($newwidth_min,$newheight_min);

    imagecopyresampled($tmp_min,$srcc,0,0,0,0,$newwidth_min,$newheight_min, $width_min,$height_min);

    imagejpeg($tmp_min,"t_prof_details/t_nat_research/".$t_nat_research,80);



	$t_inter_phd = $_SESSION["t_emp_id"].".jpg";
$t_inter_phd_tmp = $_FILES['t_inter_phd']['tmp_name'];

$extc = pathinfo($t_inter_phd,PATHINFO_EXTENSION);

if($extc == 'jpg' || $extc == 'jpeg' || $extc == 'JPG' || $extc == 'JPEG')
{
    $srcc=imagecreatefromjpeg($t_inter_phd_tmp);
}

    list($width_min,$height_min) = getimagesize($t_inter_phd_tmp);

    $newwidth_min = 350;
    $newheight_min = ($height_min / $width_min)*$newwidth_min;

    $tmp_min = imagecreatetruecolor($newwidth_min,$newheight_min);

    imagecopyresampled($tmp_min,$srcc,0,0,0,0,$newwidth_min,$newheight_min, $width_min,$height_min);

    imagejpeg($tmp_min,"t_prof_details/t_inter_phd/".$t_inter_phd,80);



	$t_nat_phd = $_SESSION["t_emp_id"].".jpg";
$t_nat_phd_tmp = $_FILES['t_nat_phd']['tmp_name'];

$extc = pathinfo($t_nat_phd,PATHINFO_EXTENSION);

if($extc == 'jpg' || $extc == 'jpeg' || $extc == 'JPG' || $extc == 'JPEG')
{
    $srcc=imagecreatefromjpeg($t_nat_phd_tmp);
}

    list($width_min,$height_min) = getimagesize($t_nat_phd_tmp);

    $newwidth_min = 350;
    $newheight_min = ($height_min / $width_min)*$newwidth_min;

    $tmp_min = imagecreatetruecolor($newwidth_min,$newheight_min);

    imagecopyresampled($tmp_min,$srcc,0,0,0,0,$newwidth_min,$newheight_min, $width_min,$height_min);

    imagejpeg($tmp_min,"t_prof_details/t_nat_phd/".$t_nat_phd,80);


//<<<<<<< HEAD
   $retval = mysqli_query( $conn,$sql);
   $row = mysqli_fetch_assoc($retval);
/*=======
	mysqli_select_db('intranet');
   $retval = mysql_query( $sql, $conn );
   $row = mysql_fetch_assoc($retval);
>>>>>>> 0d29f38a8544c96742f40e0c23043adb245117da*/


if(isset($_POST['submit_prof']))
{
     //changes from here
 $project ="";
           $start ="";
         $end_date ="";

       if( isset($_POST["student"]) && is_array($_POST["student"]) && isset($_POST["end_date"]) && is_array($_POST["end_date"]) && isset($_POST["start"]) && is_array($_POST["start"]) && isset($_POST["project"]) && is_array($_POST["project"])){
         $student = implode("~",$_POST["student"]);

    $end_date = implode("~", $_POST["end_date"]);
      $start = implode("~", $_POST["start"]);
      $project = implode("~", $_POST["project"]);
}


     if(isset($_POST["student"]) && isset($_POST["end_date"]) && isset($_POST["start"]) && isset($_POST["project"]))
     {
         $student = '~'.$student;
         $end_date = '~'.$end_date;
         $start = '~'.$start;
         $project = '~'.$project;
     }
    // end

	$t_award_desc=$_POST['t_award_desc'];
	$t_award=$_POST['t_award'];
	$t_conference_desc=$_POST['t_conference_desc'];
	$t_conference=$_POST['t_conference'];
	$t_current_mem_desc=$_POST['t_current_mem_desc'];
	$t_current_mem=$_POST['t_current_mem'];
	$t_past_mem_desc=$_POST['t_past_mem_desc'];
	$t_past_mem=$_POST['t_past_mem'];
	$t_cur_project_desc=$_POST['t_cur_project_desc'];
	$t_cur_project=$_POST['t_cur_project'];
	$t_past_project_desc=$_POST['t_past_project_desc'];
	$t_past_project=$_POST['t_past_project'];
	$t_inter_research_desc=$_POST['t_inter_research_desc'];
	$t_inter_research=$_POST['t_inter_research'];
	$t_nat_research_desc=$_POST['t_nat_research_desc'];
	$t_nat_research=$_POST['t_nat_research'];
	$t_inter_phd_desc=$_POST['t_inter_phd_desc'];
	$t_inter_phd=$_POST['t_inter_phd'];
	$t_nat_phd_desc=$_POST['t_nat_phd_desc'];
	$t_nat_phd=$_POST['t_nat_phd'];

//changes

	$query="UPDATE t_professional_details SET    t_award_desc='$t_award_desc',t_award='$t_award',t_conference_desc='$t_conference_desc',t_conference='$t_conference',t_current_mem_desc='$t_current_mem_desc',t_current_mem='$t_current_mem',t_past_mem_desc='$t_past_mem_desc',t_past_mem='$t_past_mem',t_cur_project_desc='$t_cur_project_desc',t_cur_project='$t_cur_project', t_past_project_desc='$t_past_project_desc',t_past_project='$t_past_project', t_inter_research_desc='$t_inter_research_desc',t_inter_research='$t_inter_research',t_nat_research_desc='$t_nat_research_desc',t_nat_research='$t_nat_research',t_inter_phd_desc='$t_inter_phd_desc',t_inter_phd='$t_inter_phd',t_nat_phd_desc='$t_nat_phd_desc',t_nat_phd='$t_nat_phd',end_date=CONCAT(end_date,'$end_date'),start=CONCAT(start,'$start'),project=CONCAT(project,'$project'),student=CONCAT(student,'$student') WHERE t_emp_id='$temp'";
    //end
    $run = mysqli_query($conn,$query);
	if($run)
	{
header('location:post_edit_msg.php');
	}
   mysqli_close($conn);

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Faculty Edit Page</title>
<link rel="stylesheet" href="../LOGIN/css/bootstrap.css" />
<link rel="stylesheet" href="../LOGIN/css/bootstrap.min.css" />
<link rel="stylesheet" href="../LOGIN/css/bootstrap-theme.min.css" />
<link rel="stylesheet" href="../LOGIN/css/bootstrapValidator.min.css" />
<link rel="stylesheet" href="style.css" />
<link href="style.css" rel="stylesheet" />
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
</head>

<body>
<style>
    .container{
        width: 100%;
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

       <div class="jumbotron text-center">
  <h1>Professional Details</h1>
</div>

    <p style="padding:40px;"></p>

        <div class="row row-content">
            <div class="col-xs-12 col-sm-12">
            <ul class="prg_track">
            <li class="active"><a href="#">Personal Details</a></li>
            <li><a href="edudetails.php">Educational Details</a></li>
			<li><a href="faculty-prof-details.php">Professional Details</a></li>
            <li><a href="#">Account Details</a></li>
            <li><a href="#">Step 4</a></li>
            </ul>
            </div>
            </div>

	 <p style="margin:50px"></p>

        <div class="container">

          <div class="row">

      <form class="form" id="prof_det" action="" method="post">
	 <div class="col-xs-5 col-sm-5 col-xs-offset-1 col-sm-offset-1">
     <div class="panel panel-info">
      <div class="panel-heading"><h1 class="panel-title" style="color:black">ACHIEVEMENTS</h1></div>
      <div class="panel-body" style="font-size:130%">
           <div class="row">

               <div class="col-sm-12">
              <div class="form-group">
	   <label for="skills">Awards</label><br>
	  <textarea class="form-control" rows="5" name="t_award_desc" placeholder="Awards"><?php echo $row['t_award_desc'];?></textarea>
	  <p style="padding:0.5px;"></p>
	  <input type="file" class="form-control" id="projects" name="t_award">
                  </div>
				  </div>

			   <div class="col-sm-12">
              <div class="form-group">
	   <label for="skills">Conference</label><br>
	  <textarea class="form-control" rows="5" name="t_conference_desc" placeholder="Conference"><?php echo $row['t_conference_desc'];?></textarea>
	  <p style="padding:0.5px;"></p>
	  <input type="file" class="form-control" id="projects" name="t_conference">

                </div>
				</div>

			</div>
		</div>
		</div>
		</div>

      <div class="col-xs-5 col-sm-5">
     <div class="panel panel-info">
      <div class="panel-heading"><h1 class="panel-title" style="color:black">MEMBERSHIP OF COMMITTEE</h1></div>
      <div class="panel-body" style="font-size:130%">
           <div class="row">

		    <div class="col-sm-12">
              <div class="form-group">
	   <label for="skills">Current</label><br>
	  <textarea class="form-control" rows="5" name="t_current_mem_desc" placeholder="Current Membership"><?php echo $row['t_current_mem_desc'];?></textarea>
	  <p style="padding:0.5px;"></p>
	  <input type="file" class="form-control" id="projects" name="t_current_mem">
                  </div>
				  </div>

			   <div class="col-sm-12">
              <div class="form-group">
	   <label for="skills">Past</label><br>
	  <textarea class="form-control" rows="5" name="t_past_mem_desc" placeholder="Past Membership"><?php echo $row['t_past_mem_desc'];?></textarea>
	  <p style="padding:0.5px;"></p>
	  <input type="file" class="form-control" id="projects" name="t_past_mem">

                </div>
				</div>

			</div>
		</div>
		</div>
		</div>


		<!-- <div class="col-xs-5 col-sm-5 col-xs-offset-1 col-sm-offset-1">
     <div class="panel panel-info">
      <div class="panel-heading"><h1 class="panel-title" style="color:black">PROJECT/CONSULATION</h1></div>
      <div class="panel-body" style="font-size:130%">
           <div class="row">

               <div class="col-sm-12">
              <div class="form-group">
	   <label for="skills">Current</label><br>
	  <textarea class="form-control" rows="5" name="t_cur_project_desc" placeholder="Current Project/Consulation"></textarea>
	  <p style="padding:0.5px;"></p>
	  <input type="file" class="form-control" id="projects" name="t_cur_project">
                  </div>
				  </div>

			   <div class="col-sm-12">
              <div class="form-group">
	   <label for="skills">Completed</label><br>
	  <textarea class="form-control" rows="5" name="t_past_project_desc" placeholder="Completed Project/Consulation"><php echo $row['t_past_project_desc'];?></textarea>
	  <p style="padding:0.5px;"></p>
	  <input type="file" class="form-control" id="projects" name="t_past_project">

                </div>
				</div>

			</div>
		</div>
		</div>
		</div>-->

		<div class="col-xs-5 col-sm-5 col-xs-offset-1 col-sm-offset-1">
     <div class="panel panel-info">
      <div class="panel-heading"><h1 class="panel-title" style="color:black">RESEARCH</h1></div>
      <div class="panel-body" style="font-size:130%">
           <div class="row">

		    <div class="col-sm-12">
              <div class="form-group">
	   <label for="skills">International</label><br>
	  <textarea class="form-control" rows="5" name="t_inter_research_desc" placeholder="International Research"><?php echo $row['t_inter_research_desc'];?></textarea>
	  <p style="padding:0.5px;"></p>
	  <input type="file" class="form-control" id="projects" name="t_inter_research">
                  </div>
				  </div>

			   <div class="col-sm-12">
              <div class="form-group">
	   <label for="skills">National</label><br>
	  <textarea class="form-control" rows="5" name="t_nat_research_desc" placeholder="National Research"><?php echo $row['t_nat_research_desc'];?></textarea>
	  <p style="padding:0.5px;"></p>
	  <input type="file" class="form-control" id="projects" name="t_nat_research">

                </div>
				</div>

			</div>
		</div>
		</div>
		</div>


		<div class="col-xs-5 col-sm-5">
     <div class="panel panel-info">
      <div class="panel-heading"><h1 class="panel-title" style="color:black">NO. OF PHD GUIDANCE</h1></div>
      <div class="panel-body" style="font-size:130%">
           <div class="row">

               <div class="col-sm-12">
              <div class="form-group">
	   <label for="skills">International</label><br>
	  <textarea class="form-control" rows="5" name="t_inter_phd_desc" placeholder="International Guidance"><?php echo $row['t_inter_phd_desc'];?></textarea>
	  <p style="padding:0.5px;"></p>
	  <input type="file" class="form-control" id="projects" name="t_inter_phd">
                  </div>
				  </div>

			   <div class="col-sm-12">
              <div class="form-group">
	   <label for="skills">National</label><br>
	  <textarea class="form-control" rows="5" name="t_nat_phd_desc" placeholder="National Guidance"><?php echo $row['t_nat_phd_desc'];?></textarea>
	  <p style="padding:0.5px;"></p>
	  <input type="file" class="form-control" id="projects" name="t_nat_phd">

                </div>
				</div>

			</div>
		</div>
		</div>
		</div>

          <!--changes -->
           <div class="row">

               <div class="col-sm-10 col-sm-offset-1">
	 <div class="form-group">
	   <label for="workintern">Project &amp; Thesis</label><br>

         <div class="col-sm-2" >
         <input type="text" placeholder="Student Name" class="form-control" id="work1">
         </div>
         <div class="col-sm-2">
         <input type="text" placeholder="Project/Thesis Title" class="form-control" id="work2">
         </div>

          <div class="col-sm-2">
         <input type="date" placeholder="Start Date(dd-mm-YYYY)" class="form-control" id="work3">
         </div>

          <div class="col-sm-2">
         <input type="date" placeholder="End Date(dd-mm-YYYY)" class="form-control" id="work4">
         </div>

         <div class="col-sm-2">
           <button type="button" class="btn btn-info btn-xs" id="add_work_table">Add Skill  <span class="glyphicon glyphicon-plus"></span></button>
         </div>

         <br><br>
<?php
     $Query = "SELECT * FROM t_professional_details WHERE t_emp_id=$temp";
     $result = mysqli_query($conn,$Query);
?>
                  <table id="work_table" class="table table-condensed table-hover table-striped table-bordered" width="60%">

				<tr>
					<thead>
                        <th>Name of Student</th>
					<th>Project/Thesis Title</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Delete</th>
                    </thead>
				</tr>
                      <?php
                if ( mysqli_num_rows($result)==0 )
                {
                    echo "<tr>No Projects Data Available. Add a new project in the last row.</tr>";
                }
                else
                {
                    while( $row=mysqli_fetch_array($result) )
                    {

                        $dura = explode('~',$row['end_date']);

                        $duran = explode('~',$row['start']);
                        $durati = explode('~',$row['project']);
                        $duration = explode('~',$row['student']);
                          $n = sizeof($duration);
                        // if($row['student']=='~');
                           // echo $n=8;
                    //    for($j=0;$j<$n;$j++)
                        //{

                        //}



                        for($i=1;$i<$n;$i++){

                           echo "<tr><td>".$duration[$i]."</td><td>".$durati[$i]."</td><td>".$duran[$i]."</td><td>".$dura[$i]."</td><td><button name='del' value='".$i."' onclick=\" return confirm('Are You Sure You Want To Delete ?');\" class=\"btn btn-danger\">Remove</button></td></tr>";
                    }
                           // echo "<tr><td>".$duran_e."</tr></td>";

                         //  echo "<td>".$row['funded_by']."</td>";


                        //foreach($dura as $dura_e){
                           //echo "<tr><td>".$dura_e."</tr></td>";}

                      /*  $dura = explode(',',$row['work_post']);
                        foreach($dura as $dura_e){
                           echo "<tr><td>".$dura_e."</tr></td>";}
                        /*   $d=strtotime($row['start_date']);echo "<td>".date("d-m-Y", $d)."</td>";
                           if( $row['end_date']==NULL || 01-01-1970 ){ echo "<td>Ongoing</td>"; }
                           else{ $d=strtotime($row['end_date']);echo "<td>".date("d-m-Y", $d)."</td>"; }*/
                          /* echo "<td><button name=\"removeProject\" id=\"removeProject\" onclick=\"removeProject(".$row['id'].")\" class=\"btn btn-danger\">Remove</button></td>";
                        echo "</tr>"; */
                    }
                    if(isset($_POST['del']))
                    {
                         $del=$_POST['del'];
                        $newString = "";
                        $newStr = "";
                        $newstring = "";
                        $newstr = "";
                        $new = mysqli_query($conn,"SELECT * FROM t_professional_details WHERE t_emp_id=$temp");

                         while( $row=mysqli_fetch_array($new) )
                    {
                        $R=0;
                        $dura = explode('~',$row['end_date']);
                         $R = sizeof($dura);
                        $duran = explode('~',$row['start']);
                        $durati = explode('~',$row['project']);
                         sizeof($durati);
                        $duration = explode('~',$row['student']);

                             for($i=1;$i<$n;$i++)
                             {
                                 if($del!=$i)
                                 {
                                     $newString=$newString.'~'.$dura[$i];
                                     $newStr=$newStr.'~'.$duran[$i];
                                     $newstring=$newstring.'~'.$durati[$i];
                                     $newstr=$newstr.'~'.$duration[$i];

                                 }
                             }
                        $run = mysqli_query($conn,"UPDATE t_professional_details SET end_date='$newString',start='$newStr',project='$newstring',student='$newstr' WHERE  t_emp_id='$temp'");
                             if($run)
                                 header("refresh:0.5");
                    }
                }
                }
        ?>
		</table>
<!--End changes -->
	 	 </div>
	  </div>

          </div>


		 <div class="form-group">
                        <div class="col-xs-8 col-xs-offset-2 col-lg-4 col-lg-offset-4">
                            <p style="padding: 5px;"></p>
                        <button type="submit" name="submit_prof" class="btn btn-primary btn-block">Save &amp; Continue</button>
                        </div>
                       </div>
      </form>
	 </div>
	</div>

	 <script src="js/jquery-3.1.1.js"></script>
	 <script src="js/bootstrap.min.js" type="text/javascript"></script>
	 <script src="js/bootstrapValidator.js" type="text/javascript"></script>


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


    <!--     <script type="text/javascript">
        $(document).ready(function(){
            var validator= $("#prof_det").bootstrapValidator({


                fields : {

                        t_award:{
                         validators:{
                             notEmpty:{
                                 message:"please upload the doc."
                             },
                                file:{
                                    extension: 'jpg,jpeg,png',
                                 type:'image/jpg,image/jpeg',
                                 maxSize: 102400,
                                 message: 'selected file is not supported or bigger.'
                                }
                         }
                     },

                t_conference:{
                         validators:{
                             notEmpty:{
                                 message:"please upload the doc."
                             },
                                file:{
                                    extension: 'jpg,jpeg,png',
                                 type:'image/jpg,image/jpeg',
                                 maxSize: 102400,
                                 message: 'selected file is not supported or bigger.'
                                }
                         }
                     },
                t_current_mem:{
                         validators:{
                             notEmpty:{
                                 message:"please upload the doc."
                             },
                                file:{
                                    extension: 'jpg,jpeg,png',
                                 type:'image/jpg,image/jpeg',
                                 maxSize: 102400,
                                 message: 'selected file is not supported or bigger.'
                                }
                         }
                     },
                t_past_mem:{
                         validators:{
                             notEmpty:{
                                 message:"please upload the doc."
                             },
                                file:{
                                    extension: 'jpg,jpeg,png',
                                 type:'image/jpg,image/jpeg',
                                 maxSize: 102400,
                                 message: 'selected file is not supported or bigger.'
                                }
                         }
                     },
                t_cur_project:{
                         validators:{
                             notEmpty:{
                                 message:"please upload the doc."
                             },
                                file:{
                                    extension: 'jpg,jpeg,png',
                                 type:'image/jpg,image/jpeg',
                                 maxSize: 102400,
                                 message: 'selected file is not supported or bigger.'
                                }
                         }
                     },
                t_past_project:{
                         validators:{
                             notEmpty:{
                                 message:"please upload the doc."
                             },
                                file:{
                                    extension: 'jpg,jpeg,png',
                                 type:'image/jpg,image/jpeg',
                                 maxSize: 102400,
                                 message: 'selected file is not supported or bigger.'
                                }
                         }
                     },
                t_inter_research:{
                         validators:{
                             notEmpty:{
                                 message:"please upload the doc."
                             },
                                file:{
                                    extension: 'jpg,jpeg,png',
                                 type:'image/jpg,image/jpeg',
                                 maxSize: 102400,
                                 message: 'selected file is not supported or bigger.'
                                }
                         }
                     },
                t_nat_research:{
                         validators:{
                             notEmpty:{
                                 message:"please upload the doc."
                             },
                                file:{
                                    extension: 'jpg,jpeg,png',
                                 type:'image/jpg,image/jpeg',
                                 maxSize: 102400,
                                 message: 'selected file is not supported or bigger.'
                                }
                         }
                     },
                t_inter_phd:{
                         validators:{
                             notEmpty:{
                                 message:"please upload the doc."
                             },
                                file:{
                                    extension: 'jpg,jpeg,png',
                                 type:'image/jpg,image/jpeg',
                                 maxSize: 102400,
                                 message: 'selected file is not supported or bigger.'
                                }
                         }
                     },
                t_nat_phd:{
                         validators:{
                             notEmpty:{
                                 message:"please upload the doc."
                             },
                                file:{
                                    extension: 'jpg,jpeg,png',
                                 type:'image/jpg,image/jpeg',
                                 maxSize: 102400,
                                 message: 'selected file is not supported or bigger.'
                                }
                         }
                     },

                }

            });
        });
    </script>
        -->

     <!--changes -->
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
            $(work_table).append('<tr><td><input type="text" class="form-control" name="student[]"  value="'+$("#work1").val()+'"></td><td><input class="form-control" type="text" name="project[]" value="'+$("#work2").val()+'"></td><td><input class="form-control" type="date" name="start[]" value="'+$("#work3").val()+'"></td><td><input class="form-control" type="date" name="end_date[]" value="'+$("#work4").val()+'"></td><td><button class="btn btn-danger remove_field">Remove</button></td></tr>'); //add input box
        }
    });

    $(work_table).on('click','.remove_field',function(e){
        e.preventDefault();
                    $(this).closest('tr').remove();
                });
});

</script><!--End changes -->
</body>
</html>

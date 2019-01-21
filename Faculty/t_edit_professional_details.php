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
error_reporting(1);
session_start();
include 'isLoggedIn.php';
include 'connect.php';

$temp = $_SESSION['user_id'];
$user_role = $_SESSION['user_role'];

/**************************************************************************/
//inserting a new project
if( isset($_POST['submit_project']) )
{
    $project_title = $_POST['project_title'];
    $funded_by = NULL;
    if ( $_POST['funded']=="not_funded" ) {
        $funded_by = "Not Funded";
    } else if ( $_POST['funded']=="funded" ) {
        $funded_by = $_POST['funded_by'];
    }
    if(isset($_POST['date_of_sanction'])){ $temporary = $_POST['date_of_sanction']; }
            $date_of_sanction = date( 'Y-m-d',strtotime($temporary) );
    if(isset($_POST['start_date'])){ $temporary = $_POST['start_date']; }
            $start_date = date( 'Y-m-d',strtotime($temporary) );
    $end_date = NULL;
    if ($_POST['projectstatus']=="ongoing")
    {
        $end_date = NULL;
    }
    else if($_POST['projectstatus']=="finished")
    {
        if(isset($_POST['end_date'])){ $temporary = $_POST['end_date']; }
            $end_date = date( 'Y-m-d',strtotime($temporary) );
    }
    $x = "INSERT INTO `faculty_projects` (`user_id`, `project_title`, `funded_by`, `date_of_sanction`, `start_date`, `end_date`) VALUES ('$temp', '$project_title', '$funded_by', '$date_of_sanction', '$start_date', '$end_date')";
    $projectFlag = NULL;
    if ( mysqli_query($conn,$x) )
    {
        $projectFlag == true;
    }
    else{
        $projectFlag == false;
    }
}
/**************************************************************************/
//inserting a new position
if ( isset($_POST['submit_position']) )
{
    $val = rand(100,10000000);
    $position_title = $_POST['position_title'];
    $start_date = $_POST['start_date'];
    $end_date = NULL;
    if ( $_POST['positionStatus']=="inOffice" ) {
        $end_date = NULL;
    }
    else if ( $_POST['positionStatus']=="tenureFinished" ) {
        $end_date = $_POST['end_date'];
    }
    $target_dir = "positionProof/";
    $target_file = $target_dir.$val."-".basename($_FILES["position_proof"]["name"]);
    //uploading the file and inserting the values and headers in the database
    $positionUploadFlag = NULL;
    $proofDocType = pathinfo($target_file,PATHINFO_EXTENSION);
    if ( $proofDocType != "pdf" && "PDF" )
    {
        $positionUploadFlag = true;
    }
    else
    {
        move_uploaded_file($_FILES["position_proof"]["tmp_name"], $target_file);
        $Query = "INSERT INTO `faculty_positions` (`user_id`, `position_title`, `start_date`, `end_date`, `proof`) VALUES ('$temp', '$position_title', '$start_date', '$end_date', '$target_file')";
        $result = mysqli_query($conn,$Query);
    }
}

// inserting new papers
if( isset($_POST['submit_paper']) )
{
    $title = $_POST['title'];
    $coauthor= $_POST['coauthor'];
    $conf_title= $_POST['conf_title'];
    $year_pro= $_POST['year'];
    $volume_no= $_POST['volume_no'];
    $pp_no= $_POST['pp_no'];

    $x = "INSERT INTO `faculty_papers` (`user_id`, `title`, `coauthor`, `conf_title`, `year`, `volume_no`, `no`) VALUES ('$temp', '$title', '$coauthor', '$conf_title', '$year_pro', '$volume_no','$pp_no')";
    $projectFlag = NULL;
    if ( mysqli_query($conn,$x) )
    {
        $projectFlag == true;
    }
    else{
        $projectFlag == false;
    }


}
// inserting new awards
    if( isset($_POST['submit_award']) )
{
    $award_name = $_POST['award_name'];
    $year= $_POST['year'];
    $awarded_by= $_POST['awarded_by'];

    $x = "INSERT INTO `faculty_awards` (`user_id`, `award_name`, `year`, `awarded_by`) VALUES ('$temp', '$award_name', '$year', '$awarded_by')";
    $projectFlag = NULL;
    if ( mysqli_query($conn,$x) )
    {
        $projectFlag == true;
    }
    else{
        $projectFlag == false;
    }


}




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Professional Details</title>
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
    .red {
          color:red
    }
    </style>
	    <div id="wrapper">
        <?php
        //If PDF not uploaded
            if ($positionUploadFlag==true) {
                echo "<div class=\"alert alert-danger\" role=\"alert\">
                      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                        <strong class=\"text-center\">PDF File only!</strong>
                    </div>";
            }
        ?>
         <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Welcome  <?php echo $_SESSION["user_id"] ?>&nbsp;&nbsp;&nbsp;  <button class="btn btn-xs" id="tgl">&times;</button>
                    </a>
                </li>

                <li>
                    <a href="../dashboard/index.php"><span  class="glyphicon glyphicon-home"></span> Dashboard</a>
                </li>
                <li>
                    <a href="../resources/upload.php"><span  class="glyphicon glyphicon-folder-open"></span> Course Material</a>
                </li>
                <li>
                    <a href="../resources/index.php">Online Resources Library</a>
                </li>

            </ul>
        </div>
        <div id="page-content-wrapper">


		<div class="jumbotron text-center">
        <h1>Professional Details</h1>
        </div>
        <?php include 'topBar.php'; ?>
</div>

		 <p style="margin:50px"></p>
   <div class="col-xs-12 col-sm-12">
            <ul class="prg_track">
            <li class="active"><a href="t_edit_personal_details.php">Personal Details</a></li>
            <li><a href="t_edit_edu_details.php">Educational Details</a></li>
            <li><a href="t_edit_banking_details.php">Account Details</a></li>
            <li><a href="t_edit_professional_details.php">Professional Details</a></li>
            <li><a href="t_edit_aicte_details.php">AICTE Details</a></li>
            </ul>
            </div></div>
            <p style="margin:50px"></p>
             <body>

<!-- Academic positions Begins-->
<?php
     $Query1 = "SELECT * FROM faculty_positions WHERE user_id=$temp ORDER BY start_date DESC";
     $result1 = mysqli_query($conn,$Query1);
?>
<div class="box">
    <div class="box-title row">
        <div class="col-sm-11">
            <p class="pull-left text-left">Academic Positions</p>
        </div>
        <div class="col-sm-1">
            <button href="t_edit_professional_details.php" class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
        </div>
    </div>
    <div class="box-body">
    <table class="col-xs-12 table table-striped table-hover table-responsive">
        <thead>
        <tr>
                <th class="col-sm-1">Sr. No.</th>
                <th class="col-sm-3">Position Title</th>
                <th class="col-sm-3">From</th>
                <th class="col-sm-2">Till</th>
                <th class="col-sm-2">Document of Proof/Appointment Letter</th>
                <th class="col-sm-1">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
                if ( mysqli_num_rows($result1)==0 )
                {
                    echo "<tr><center>No Positions Data Available. Add a new position in the last row.</center></tr>";
                }
                else
                {
                    $i = 1;
                    while( $row=mysqli_fetch_array($result1) )
                    {

                           echo "<tr id=\"position".$row['id']."\">";
                           echo "<td>".$i."</td>";
                           echo "<td>".$row['position_title']."</td>";
                           $d=strtotime($row['start_date']);echo "<td>".date("d-m-Y", $d)."</td>";
                           $d=strtotime($row['end_date']);
                           if( $d==NULL )
                           {
                                echo "<td>Currently In Office</td>";
                           }
                           else
                           {
                            echo "<td>".date("d-m-Y",$d)."</td>";
                           }
                           echo "<td><a href=\"".$row['proof']."\">View File</td>";
                           echo "<td><button name=\"removePosition\" id=\"removePosition\" onclick=\"removePosition(".$row['id'].")\" class=\"btn btn-danger\">Remove</button></td>";
                        echo "</tr>";
                        $i++;
                    }
                }
        ?>
        <tr>
            <form method="POST" enctype="multipart/form-data" name="add_project" id="add_project">
                <td></td>
                <td><input type="text" name="position_title" placeholder="Position Title" class="form-control"></td>
                <td><label for="start_date">From (Date):</label><input type="date" name="start_date" id="start_date" class="form-control" placeholder="Start Date dd/mm/YYYY" onchange="assignValue()"></td>
                <td><input type="checkbox" name="positionStatus" value="inOffice" id="inoffice_checkbox" checked><label for="positionStatus">In office</label>
                    <br><input type="checkbox" name="positionStatus" value="tenureFinished" id="tenurefinished_checkbox"><label for="positionStatus">Tenure Finished On</label>
                <input type="date" name="end_date" style="display: none;" id="positions_end_date" class="form-control" placeholder="End Date dd/mm/YYYY">
                </td>
                <td><label for="position_proof">*PDF Only</label><br><input type="file" name="position_proof" accept="application/pdf"></td>
                <td><button type="submit" name="submit_position" class="btn btn-primary">Add Position</button></td>
            </form>
        </tr>
        </tbody>
    </table>
    </div>
</div>
<!-- Academic positions Ends -->

<!-- Projects Section Begins-->
<?php
     $Query = "SELECT * FROM faculty_projects WHERE user_id=$temp ORDER BY date_of_sanction DESC";
     $result = mysqli_query($conn,$Query);
?>
<div class="box">
    <div class="box-title row">
        <div class="col-sm-11">
            <p class="pull-left text-left">Projects</p>
        </div>
        <div class="col-sm-1">
            <button href="t_edit_professional_details.php" class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
        </div>
    </div>
    <div class="box-body">
    <table class="col-xs-12 table table-striped table-hover table-responsive">
        <tr>
                <th class="col-sm-3">Project Title</th>
                <th class="col-sm-2">Funded By</th>
                <th class="col-sm-2">Date Sanctioned</th>
                <th class="col-sm-2">Start Date</th>
                <th class="col-sm-2">End Date</th>
                <th class="col-sm-1">Action</th>
        </tr>
        <?php
                if ( mysqli_num_rows($result)==0 )
                {
                    echo "<tr><center>No Projects Data Available. Add a new project in the last row.</center></tr>";
                }
                else
                {
                    while( $row=mysqli_fetch_array($result) )
                    {

                        echo "<tr id=\"".$row['id']."\">";
                           echo "<td>".$row['project_title']."</td>";
                           echo "<td>".$row['funded_by']."</td>";
                           $d=strtotime($row['date_of_sanction']);echo "<td>".date("d-m-Y", $d)."</td>";
                           $d=strtotime($row['start_date']);echo "<td>".date("d-m-Y", $d)."</td>";
                           $d=strtotime($row['end_date']);
                           if( $d==NULL){ echo "<td>Ongoing</td>"; }
                           else{ echo "<td>".date("d-m-Y", $d)."</td>"; }
                           echo "<td><button name=\"removeProject\" id=\"removeProject\" onclick=\"removeProject(".$row['id'].")\" class=\"btn btn-danger\">Remove Project</button></td>";
                        echo "</tr>";
                    }
                }
        ?>
        <tr>
            <form method="POST" enctype="multipart/form-data" name="add_project" id="add_project">
                <td><input type="text" name="project_title" placeholder="Project Title" class="form-control"></td>
                <td><input type="checkbox" name="funded" value="not_funded" id="not_funded_checkbox" checked><label for="not_funded">Not Funded</label>
                    <br><input type="checkbox" name="funded" value="funded" id="funded_checkbox"><label for="funded">Funded</label>
                    <br><input type="text" name="funded_by" id="funded_by" style="display: none;" placeholder="Funded By" class="form-control">
                </td>
                <td><input type="text=" name="date_of_sanction" id="date_of_sanction" class="form-control" placeholder="Date sanctioned dd/mm/YYYY"></td>
                <td><input type="text" name="start_date" id="start_date" class="form-control" placeholder="Start Date dd/mm/YYYY" onchange="assignValue()"></td>
                <td><input type="checkbox" name="projectstatus" value="ongoing" id="ongoing_checkbox" checked><label for="projectstatus">Ongoing</label>
                    <br><input type="checkbox" name="projectstatus" value="finished" id="finished_checkbox"><label for="projectstatus">Finished</label>
                <input type="text" name="end_date" style="display: none;" id="end_date" class="form-control" placeholder="End Date dd/mm/YYYY">
                </td>
                <td><button type="submit" name="submit_project" class="btn btn-primary">Add Project</button></td>
            </form>
        </tr>
    </table>

    </div>
</div>
<!-- Projects Section Ends -->



           <!-- Papers -->
<?php
     $Query = "SELECT * FROM faculty_papers WHERE user_id=$temp ORDER BY year ASC";
     $result = mysqli_query($conn,$Query);
?>
<div class="box">
       <div class="box-title row">
        <div class="col-sm-11">
            <p class="pull-left text-left">Papers Published</p>
        </div>
        <div class="col-sm-1">
            <button href="t_edit_professional_details.php" class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
        </div>
    </div>
    <div class="box-body">
    <table class="col-xs-12 table table-striped table-hover table-responsive">
        <tr>
                <th class="col-sm-2">Paper Title</th>
                <th class="col-sm-2">Authors</th>
                <th class="col-sm-2">Conference Tilte/ Journal</th>
                <th class="col-sm-2">Year of Publishing</th>
                <th class="col-sm-2">Volume No.</th>
                <th class="col-sm-2">Number</th>
                <th class="col-sm-2">Action</th>
        </tr>
        <?php
                if ( mysqli_num_rows($result)==0 )
                {
                    echo "<tr><center>No Paper Data Available. Add a new project in the last row.</center></tr>";
                }
                else
                {
                    while( $row=mysqli_fetch_array($result) )
                    {

                        echo "<tr id=\"".$row['id']."\">";
                           echo "<td>".$row['title']."</td>";
                           echo "<td>".$row['coauthor']."</td>";
                           echo "<td>".$row['conf_title']."</td>";
                           echo "<td>".$row['year']."</td>";
                           echo "<td>".$row['volume_no']."</td>";
                           echo "<td>".$row['no']."</td>";




                           //$d=strtotime($row['date_of_sanction']);echo "<td>".date("d-m-Y", $d)."</td>";
                           //$d=strtotime($row['start_date']);echo "<td>".date("d-m-Y", $d)."</td>";
                           //if( $row['end_date']==NULL || 01-01-1970 ){ echo "<td>Ongoing</td>"; }
                           //else{ $d=strtotime($row['end_date']);echo "<td>".date("d-m-Y", $d)."</td>"; }
                           echo "<td><button name=\"removePaper\" id=\"removePaper\" onclick=\"removePaper(".$row['id'].")\" class=\"btn btn-danger\">Remove Paper</button></td>";
                        echo "</tr>";
                    }
                }
        ?>
        <tr>
            <form method="POST" enctype="multipart/form-data" name="add_project" id="add_project">
                <td><input type="text" name="title" placeholder="Project Title" class="form-control"></td>
                <td><input type="text" name="coauthor" placeholder="Author of Project" class="form-control"><!--input type="checkbox" name="funded" value="not_funded" id="not_funded_checkbox" checked><label for="not_funded">Not Funded</label>
                    <br><input type="checkbox" name="funded" value="funded" id="funded_checkbox"><label for="funded">Funded</label>
                    <br><input type="text" name="funded_by" id="funded_by" style="display: none;" placeholder="Funded By" class="form-control"-->
                </td>
                <td><input type="text=" name="conf_title" id="conf_title" class="form-control" placeholder="conference title / Journal"></td>
                <td><input type="number" name="year" id="year" class="form-control" placeholder="Year of publishing"></td>
                <td><!--input type="checkbox" name="projectstatus" value="ongoing" id="ongoing_checkbox" checked><label for="projectstatus">Ongoing</label>
                    <br><input type="checkbox" name="projectstatus" value="finished" id="finished_checkbox"><label for="projectstatus">Finished</label>
                <input type="text" name="end_date" style="display: none;" id="end_date" class="form-control" placeholder="End Date dd/mm/YYYY"-->
                    <input type="number" name="volume_no" placeholder="Volume No:" class="form-control">
                </td>
                <td><input type="number" name="pp_no" placeholder="Number:" class="form-control"></td>
                <td><button type="submit" name="submit_paper" class="btn btn-primary">Add Paper</button></td>
            </form>
        </tr>
    </table>

    </div>
</div>

  <!--paper ends-->



            <!-- Awards -->
<?php
     $Query = "SELECT * FROM faculty_awards WHERE user_id=$temp ORDER BY year ASC";
     $result = mysqli_query($conn,$Query);
?>
<div class="box">
        <div class="box-title row">
        <div class="col-sm-11">
            <p class="pull-left text-left">Awards</p>
        </div>
        <div class="col-sm-1">
            <button href="t_edit_professional_details.php" class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
        </div>
    </div>
    <div class="box-body">
    <table class="col-xs-12 table table-striped table-hover table-responsive">
        <tr>
                <th class="col-sm-3">Awards</th>
                <th class="col-sm-3">Year</th>
                <th class="col-sm-3">Awarded By</th>
                <!--th class="col-sm-2">Start Date</th>
                <th class="col-sm-2">End Date</th>
                <th class="col-sm-2">Year</th-->
                <th class="col-sm-3">Action</th>
        </tr>
        <?php
                if ( mysqli_num_rows($result)==0 )
                {
                    echo "<tr><center>No Awards Data Available. Add a new project in the last row.</center></tr>";
                }
                else
                {
                    while( $row=mysqli_fetch_array($result) )
                    {

                        echo "<tr id=\"".$row['id']."\">";
                           echo "<td>".$row['award_name']."</td>";
                           echo "<td>".$row['year']."</td>";
                           echo "<td>".$row['awarded_by']."</td>";
                           //echo "<td>".$row['year']."</td>";
                           //echo "<td>".$row['volume_no']."</td>";
                           //echo "<td>".$row['pp_no']."</td>";




                           //$d=strtotime($row['date_of_sanction']);echo "<td>".date("d-m-Y", $d)."</td>";
                           //$d=strtotime($row['start_date']);echo "<td>".date("d-m-Y", $d)."</td>";
                           //if( $row['end_date']==NULL || 01-01-1970 ){ echo "<td>Ongoing</td>"; }
                           //else{ $d=strtotime($row['end_date']);echo "<td>".date("d-m-Y", $d)."</td>"; }
                           echo "<td><button name=\"removeaward\" id=\"removeaward\" onclick=\"removeaward(".$row['id'].")\" class=\"btn btn-danger\">Remove Award</button></td>";
                        echo "</tr>";
                    }
                }
        ?>
        <tr>
            <form method="POST" enctype="multipart/form-data" name="add_project" id="add_project">
                <td><input type="text" name="award_name" placeholder="Awards" class="form-control"></td>
                <td><input type="text" name="year" placeholder="Year" class="form-control"><!--input type="checkbox" name="funded" value="not_funded" id="not_funded_checkbox" checked><label for="not_funded">Not Funded</label>
                    <br><input type="checkbox" name="funded" value="funded" id="funded_checkbox"><label for="funded">Funded</label>
                    <br><input type="text" name="funded_by" id="funded_by" style="display: none;" placeholder="Funded By" class="form-control"-->
                </td>
                <td><input type="text=" name="awarded_by" id="Awarded By" class="form-control" placeholder="Awarded By"></td>
                <!--td><input type="text" name="start_date" id="start_date" class="form-control" placeholder="Start Date dd/mm/YYYY" onchange="assignValue()"></td>
                <td><!--input type="checkbox" name="projectstatus" value="ongoing" id="ongoing_checkbox" checked><label for="projectstatus">Ongoing</label>
                    <br><input type="checkbox" name="projectstatus" value="finished" id="finished_checkbox"><label for="projectstatus">Finished</label>
                <input type="text" name="end_date" style="display: none;" id="end_date" class="form-control" placeholder="End Date dd/mm/YYYY">
                    <input type="text" name="projectstatus" placeholder="Project Title" class="form-control">
                </td-->
                <!--td><input type="text" name="pp_no" placeholder="Project Title" class="form-control"></td-->
                <td><button type="submit" name="submit_award" class="btn btn-primary">Add Award</button></td>
            </form>
        </tr>
    </table>

    </div>
</div>

  <!--awards ends-->




<hr><p style="padding: 10px;"></p><hr>
<?php include 'footer.php';?>

<!-- jQuery and BOOTstrap JS-->
<script src="../front/js/jquery-3.1.1.js"></script>
<script src="../LOGIN/js/bootstrap.min.js" type="text/javascript"></script>
<!--BootstrapValidator-->
<script src="../LOGIN/js/bootstrapValidator.min.js" type="text/javascript"></script>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $("#")
</script>
<script>
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 4000);

var startDate = 00/00/0000;
function assignValue(){
    startDate = document.getElementById("start_date").value;
}

    $("#tgl").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    /******************** Academic Positions Section ***************/
    $(document).ready(function(){
    $("#inoffice_checkbox").click(function(){
        $("#positions_end_date").toggle();
        document.getElementById("tenurefinished_checkbox").checked = !document.getElementById("tenurefinished_checkbox").checked;
        });
    });

    $(document).ready(function(){
    $("#tenurefinished_checkbox").click(function(){
        $("#positions_end_date").toggle();
        document.getElementById("inoffice_checkbox").checked = !document.getElementById("inoffice_checkbox").checked;
        });
    });

    function removePosition(str)
      {
          var row = document.getElementById("position"+str);
          var x = confirm("Are you sure to delete this position history?")
          if( x==true )
          {


            if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
            }
            else
            {
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function()
            {
              if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        row.deleteCell(-1);
                        row.deleteCell(-1);
                        row.deleteCell(-1);
                        row.deleteCell(-1);
                        row.deleteCell(-1);
                        row.deleteCell(-1);
              }
            }
                xmlhttp.open("GET","removePosition.php?q="+str,true);
                xmlhttp.send();
          }
      }

    /******************** Projects Section ***************/
    $(document).ready(function(){
    $("#funded_checkbox").click(function(){
        $("#funded_by").toggle();
        document.getElementById("not_funded_checkbox").checked = !document.getElementById("not_funded_checkbox").checked;
        });
    });

    $(document).ready(function(){
    $("#not_funded_checkbox").click(function(){
        $("#funded_by").toggle();
        document.getElementById("funded_checkbox").checked = !document.getElementById("funded_checkbox").checked;
        });
    });

    $(document).ready(function(){
    $("#ongoing_checkbox").click(function(){
        $("#end_date").toggle();
        document.getElementById("finished_checkbox").checked = !document.getElementById("finished_checkbox").checked;
        });
    });

    $(document).ready(function(){
    $("#finished_checkbox").click(function(){
        $("#end_date").toggle();
        document.getElementById("ongoing_checkbox").checked = !document.getElementById("ongoing_checkbox").checked;
        });
    });


      /******************** Projects Section ***************/


    function removeProject(str)
      {
          var row = document.getElementById(str);
          var x = confirm("Are you sure to delete this project?")
          if( x==true )
          {


            if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
            }
            else
            {
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function()
            {
              if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        row.deleteCell(-1);
                        row.deleteCell(-1);
                        row.deleteCell(-1);
                        row.deleteCell(-1);
                        row.deleteCell(-1);
                        row.deleteCell(-1);
              }
            }
                xmlhttp.open("GET","removeProject.php?q="+str,true);
                xmlhttp.send();
          }
      }


      /******************** Papers Section ***************/

      function removePaper(str)
        {
            var row = document.getElementById(str);
            var x = confirm("Are you sure to delete this paper?")
            if( x==true )
            {


              if (window.XMLHttpRequest) {
              xmlhttp = new XMLHttpRequest();
              }
              else
              {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange = function()
              {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                          row.deleteCell(-1);
                          row.deleteCell(-1);
                          row.deleteCell(-1);
                          row.deleteCell(-1);
                          row.deleteCell(-1);
                          row.deleteCell(-1);
                          row.deleteCell(-1);
                }
              }
                  xmlhttp.open("GET","removePaper.php?q="+str,true);
                  xmlhttp.send();
            }
        }


      /******************** awards Section ***************/



      function removeaward(str)
        {
            var row = document.getElementById(str);
            var x = confirm("Are you sure to delete this award?")
            if( x==true )
            {


              if (window.XMLHttpRequest) {
              xmlhttp = new XMLHttpRequest();
              }
              else
              {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange = function()
              {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                          row.deleteCell(-1);
                          row.deleteCell(-1);
                          row.deleteCell(-1);
                          row.deleteCell(-1);

                }
              }
                  xmlhttp.open("GET","removeaward.php?q="+str,true);
                  xmlhttp.send();
            }
        }
</script>
</body>
</html>

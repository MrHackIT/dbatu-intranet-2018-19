<?php
ob_start();
error_reporting(1);
session_start();

include 'connect.php';

$temp = $_SESSION['user_id'];
$user_role = $_SESSION['user_role'];

//inserting a new project
if( isset($_POST['submitcourse']) )
{
    $course_name = $_POST['course_name'];

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
    $x = "INSERT INTO `faculty_courses` (`user_id`, `course_name`, `date_of_sanction`, `start_date`, `end_date`) VALUES ('$temp', '$course_name', '$date_of_sanction', '$start_date', '$end_date')";
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
<title>Courses Handled</title>
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
        <h1>Courses Handled</h1>
        </div>

    <p style="padding:5px;"></p>
    <p style="padding:20px;"></p>
    <div class="row">
        <div class="col-xs-4"><a href="#menu-toggle" class="btn btn-default pull-left" id="menu-toggle"><span class="glyphicon glyphicon-list"></span> More</a></div>
        <div class="col-xs-4"><h3 align="center">Welcome <?php echo $_SESSION["user_id"] ?></h3></div>
		<div class="col-xs-4"><a href="../LOGIN/logout.php" class="btn btn-danger pull-right">LOGOUT</a></div>
	</div>
		 <p style="margin:50px"></p>


<!-- Projects -->
<?php
     $Query = "SELECT * FROM faculty_courses WHERE user_id=$temp ORDER BY date_of_sanction DESC";
     $result = mysqli_query($conn,$Query);
?>
<div class="box">
    <div class="box-title text-left">Courses</div>
    <div class="box-body">
    <table class="col-xs-12 table table-striped table-hover table-responsive">
        <tr>
                <th class="col-sm-2">Name of Course</th>
                <th class="col-sm-2">Whether Ongoing</th>
                <th class="col-sm-2">From Date</th>
                <th class="col-sm-2">Till Date</th>
                <th class="col-sm-2">PG/UG</th>
                <th class="col-sm-2">Action</th>
        </tr>
        <?php
                if ( mysqli_num_rows($result)==0 )
                {
                    echo "<tr>No Data Available. Add a new course in the last row.</tr>";
                }
                else
                {
                    while( $row=mysqli_fetch_array($result) )
                    {

                        echo "<tr id=\"".$row['id']."\">";
                           echo "<td>".$row['course_name']."</td>";
                           if( $row['end_date']==NULL || 01-01-1970 ){ echo "<td>Ongoing</td>"; }
                           else{ $d=strtotime($row['end_date']);echo "<td>".date("d-m-Y", $d)."</td>"; }

                           $d=strtotime($row['start_date']);echo "<td>".date("d-m-Y", $d)."</td>";
                           $d=strtotime($row['end_date']);echo "<td>".date("d-m-Y", $d)."</td>";
                            if( $row['pgorug']=="pg"){ echo "<td>PG</td>"; }
                           else{ echo "<td>UG</td>"; }

                           echo "<td><button name=\"removeProject\" id=\"removeProject\" onclick=\"removeProject(".$row['id'].")\" class=\"btn btn-danger\">Remove</button></td>";
                        echo "</tr>";
                    }
                }
        ?>
        <tr>
            <form method="POST" enctype="multipart/form-data" name="add_project" id="add_project">
                <td><input type="text" name="course_name" placeholder="Name of Course" class="form-control"></td>

                <td><input type="checkbox" name="projectstatus" value="ongoing" id="ongoing_checkbox" checked><label for="projectstatus">Ongoing</label>
                    <br><input type="checkbox" name="projectstatus" value="finished" id="finished_checkbox"><label for="projectstatus">Finished</label>
                <input type="text" name="end_date" style="display: none;" id="end_date" class="form-control" placeholder="End Date dd/mm/YYYY">
                </td>
                <td><input type="text=" name="date_of_sanction" id="date_of_sanction" class="form-control" placeholder="Start Date dd/mm/YYYY"></td>
                <td><input type="text" name="start_date" id="start_date" class="form-control" placeholder="End Date dd/mm/YYYY" onchange="assignValue()"></td>

                <td><input type="checkbox" name="funded" value="UG" id="not_funded_checkbox" checked><label for="not_funded">UG</label>
                    <br><input type="checkbox" name="funded" value="PG" id="funded_checkbox"><label for="funded">PG</label>

                </td>
                <td><button type="submit" name="submitcourse" class="btn btn-primary">Add Project</button></td>
            </form>
        </tr>
    </table>

    </div>
</div>
    <p style="margin-bottom: 50px;"></p>
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
</script>
</body>
</html>

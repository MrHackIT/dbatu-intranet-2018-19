<?php
    error_reporting(1);
    session_start();
    if( isset($_SESSION["isLoggedIn"]) ){
         if( $_SESSION["user_role"]!="admin" ){
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
<html>
<head>
    <title> Admin Panel</title>
		<link type="text/css" href="../LOGIN/css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="css/bootstrap-table.css" rel="stylesheet">
		<link type="text/css" href="../LOGIN/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href="css/custom.css" rel="stylesheet">
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="../LOGIN/js/bootstrap.min.js"></script>
        <script src="js/bootstrap-table.js"></script>

        <script type="text/javascript">

            $(document).ready(function () {

                var trigger = $('.hamburger'),
                overlay = $('.overlay'),
                isClosed = false;

                trigger.click(function () {
                    hamburger_cross();
                });

                function hamburger_cross() {

                    if (isClosed == true) {
                    overlay.hide();
                    trigger.removeClass('is-open');
                    trigger.addClass('is-closed');
                    isClosed = false;
                    } else {
                    overlay.show();
                    trigger.removeClass('is-closed');
                    trigger.addClass('is-open');
                    isClosed = true;
                    }

                }

                $('[data-toggle="offcanvas"]').click(function () {
                    $('#wrapper').toggleClass('toggled');
                });

            });

        </script>


    </head>
<body>

<div id="wrapper" >

    <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
    <span class="hamb-top"></span>
    <span class="hamb-middle"></span>
    <span class="hamb-bottom"></span>
    </button>

    <div id="sidebar_design">
    </div>

    <div id="page-content-wrapper">
        <div class="jumbotron padding_adjust">

            <div class="container">

                <div class="row">

                    <div class="col-lg-1">
                    <img src="images/batulogo.png" alt="LOGO" id="logo">
                    </div>

                    <div class="col-lg-1"></div>

                    <div class="col-lg-10">
                        <h2 id="college_name">Dr. Babasaheb Ambedkar Technological University</h2>
                    </div>

                    <div class="container">

                        <div class="row">
                            <div class="col-lg-4"></div>

                            <div class="col-lg-2">
                                <p>Admin Panel</p>
                            </div>

                            <div class="col-lg-6"></div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="overlay"></div>

        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
        <ul class="nav sidebar-nav">
        <li class="sidebar-brand">
        <a href="#">
        DETAILS
        </a>
        </li>
        <li>

        </li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">COMPUTER<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
        <li class="dropdown-header">COMPUTER STUDENTS DETAILS</li>
        <li><a href="admin_queries/COMPUTER/personal/" >Personal Details</a></li>
        <li><a href="admin_queries/COMPUTER/educational/" >Education Details</a></li>
        <li><a href="admin_queries/COMPUTER/bank/" >Banking Details</a></li>
        </ul>
        </li>

        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">IT<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
        <li class="dropdown-header">IT STUDENTS DETAILS</li>
        <li><a href="admin_queries/IT/personal/" >Personal Details</a></li>
        <li><a href="admin_queries/IT/educational/" >Education Details</a></li>
        <li><a href="admin_queries/IT/bank/" >Banking Details</a></li>
        </ul>
        </li>

        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">MECHANICAL<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
        <li class="dropdown-header">MECHANICAL STUDENTS DETAILS</li>
        <li><a href="admin_queries/MECHANICAL/personal/" >Personal Details</a></li>
        <li><a href="admin_queries/MECHANICAL/educational/" >Education Details</a></li>
        <li><a href="admin_queries/MECHANICAL/bank/" >Banking Details</a></li>
        </ul>
        </li>

        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">ELECTRICAL<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
        <li class="dropdown-header">ELECTRICAL STUDENTS DETAILS</li>
        <li><a href="admin_queries/ELECTRICAL/personal/" >Personal Details</a></li>
        <li><a href="admin_queries/ELECTRICAL/educational/" >Education Details</a></li>
        <li><a href="admin_queries/ELECTRICAL/bank/" >Banking Details</a></li>
        </ul>
        </li>

        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">ELECTRONICS<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
        <li class="dropdown-header">ELECTRONICS STUDENTS DETAILS</li>
        <li><a href="admin_queries/EXTC/personal/" >Personal Details</a></li>
        <li><a href="admin_queries/EXTC/educational/" >Education Details</a></li>
        <li><a href="admin_queries/EXTC/bank/" >Banking Details</a></li>
        </ul>
        </li>

        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">CHEMICAL<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
        <li class="dropdown-header">CHEMICAL STUDENTS DETAILS</li>
        <li><a href="admin_queries/CHEMICAL/personal/" >Personal Details</a></li>
        <li><a href="admin_queries/CHEMICAL/educational/" >Education Details</a></li>
        <li><a href="admin_queries/CHEMICAL/bank/" >Banking Details</a></li>
        </ul>
        </li>
        

        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">PETRO CHEMICAL<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
        <li class="dropdown-header">PETRO STUDENTS DETAILS</li>
        <li><a href="admin_queries/PETROCHEMICAL/personal/" >Personal Details</a></li>
        <li><a href="admin_queries/PETROCHEMICAL/educational/" >Education Details</a></li>
        <li><a href="admin_queries/PETROCHEMICAL/bank/" >Banking Details</a></li>
        </ul>
        </li>


        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">CIVIL<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
        <li class="dropdown-header">CIVIL STUDENTS DETAILS</li>
        <li><a href="admin_queries/CIVIL/personal/" >Personal Details</a></li>
        <li><a href="admin_queries/CIVIL/educational/" >Education Details</a></li>
        <li><a href="admin_queries/CIVIL/bank/" >Banking Details</a></li>
        </ul>
        </li>

        <li>
        <a href="reg_faculty.php">NEW FACULTY MEMBER</a>
        </li>

        <li>
        <a href="additions.php">ADD A NEW DEPT/SUBJECT</a>
        </li>

         <li>
        <a href="../LOGIN/logout.php">LOGOUT</a>
        </li>
        </ul>
        </nav>




<div class="container-fluid" id="admin_panel_body">
<div class="row"  >
<div class="col-lg-12">
<div class="container" id="main_list_box">

<div class="panel panel-success" >
<div class="panel-heading ">
<span class="admin_panel_heading">STUDENTS</span>
</div>




<div class="panel-body" >
<div class="row">
<div class="col-md-12">

<table 	id="table"
data-show-columns="true"
data-height="560">
</table>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>


</div>


    <script>

        var $table = $('#table');
             $table.bootstrapTable({
                  url: 'personal.php',
                  search: true,
                  pagination: true,
                  buttonsClass: 'primary',
                  showFooter: true,
                  minimumCountColumns: 2,
                   columns: [{
			          field: 'id',
			          title: 'ID',
			          sortable: true,
			      },{
			          field: 'roll_no',
			          title: 'Roll No.',
			          sortable: true,

			      },{
			          field: 'full_name',
			          title: 'Full Name',
			          sortable: true,
			      },{
			          field: 'gender',
			          title: 'Gender',
			          sortable: true,

			      },{
			          field: 'dob',
			          title: 'Date of Birth',
			          sortable: true,

			      },{
			          field: 'contact_no',
			          title: 'Contact No.',
			          sortable: true,

			      },{
			          field: 'email',
			          title: 'E-mail',
			          sortable: true,

			      },{
			          field: 'blood_group',
			          title: 'Blood Group',
			          sortable: true,

			      },{
			          field: 'category',
			          title: 'Category',
			          sortable: true,

			      },{
			          field: 'mname',
			          title: 'Mothers Name',
			          sortable: true,

			      },{
			          field: 'fname',
			          title: 'Fathers Name',
			          sortable: true,

			      },{
			          field: 'guardian_email',
			          title: 'Guardian Email',
			          sortable: true,

			      },{
			          field: 'guardian_contact',
			          title: 'Guardian Contact',
			          sortable: true,

			      },{
			          field: 'address',
			          title: 'Address',
			          sortable: true,

			      },{
			          field: 'discipline',
			          title: 'Discipline',
			          sortable: true,

			      },{
			          field: 'time_stamp',
			          title: 'Reg_Date',
			          sortable: true,

			      }],
         });
    </script>

      </body>
</html>

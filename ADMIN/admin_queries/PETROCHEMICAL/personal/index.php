<html>
<head>
    <title>Admin Panel</title>
		<link type="text/css" href="../../../css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="../../../css/bootstrap-table.css" rel="stylesheet">
		<link type="text/css" href="../../../css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href="../../../css/custom.css" rel="stylesheet">
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="../../../js/jquery-1.11.1.min.js"></script>
        <script src="../../../js/bootstrap.min.js"></script>
        <script src="../../../js/bootstrap-table.js"></script>
    
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
                    <img src="../../../images/batulogo.png" alt="LOGO" id="logo">
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
        DISCIPLINES
        </a>
        </li>
        <li>
       
        </li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">COMPUTER<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
        <li class="dropdown-header">COMPUTER STUDENTS DETAILS</li>
        <li><a href="../../COMPUTER/personal/" onclick="it_personal()">Personal Details</a></li>
        <li><a href="../../COMPUTER/educational/" onclick="it_educational()">Education Details</a></li>
        <li><a href="../../COMPUTER/bank/" onclick="it_bank()">Banking Details</a></li>
        </ul>
        </li>

        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">IT<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
        <li class="dropdown-header">IT STUDENTS DETAILS</li>
        <li><a href="../../IT/personal/" onclick="it_personal()">Personal Details</a></li>
        <li><a href="../../IT/educational/" onclick="it_educational()">Education Details</a></li>
        <li><a href="../../IT/bank/" onclick="it_bank()">Banking Details</a></li>
        </ul>
        </li>

        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">MECHANICAL<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
        <li class="dropdown-header">MECHANICAL STUDENTS DETAILS</li>
        <li><a href="../../MECHANICAL/personal/" onclick="it_personal()">Personal Details</a></li>
        <li><a href="../../MECHANICAL/educational/" onclick="it_educational()">Education Details</a></li>
        <li><a href="../../MECHANICAL/bank/" onclick="it_bank()">Banking Details</a></li>
        </ul>
        </li>

        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">ELECTRICAL<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
        <li class="dropdown-header">ELECTRICAL STUDENTS DETAILS</li>
        <li><a href="../../ELECTRICAL/personal/" onclick="it_personal()">Personal Details</a></li>
        <li><a href="../../ELECTRICAL/educational/" onclick="it_educational()">Education Details</a></li>
        <li><a href="../../ELECTRICAL/bank/" onclick="it_bank()">Banking Details</a></li>
        </ul>
        </li>

        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">ELECTRONICS<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
        <li class="dropdown-header">ELECTRONICS STUDENTS DETAILS</li>
        <li><a href="../../EXTC/personal/" onclick="it_personal()">Personal Details</a></li>
        <li><a href="../../EXTC/educational/" onclick="it_educational()">Education Details</a></li>
        <li><a href="../../EXTC/bank/" onclick="it_bank()">Banking Details</a></li>
        </ul>
        </li>

        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">CHEMICAL<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
        <li class="dropdown-header">CHEMICAL STUDENTS DETAILS</li>
        <li><a href="../../CHEMICAL/personal/" onclick="it_personal()">Personal Details</a></li>
        <li><a href="../../CHEMICAL/educational/" onclick="it_educational()">Education Details</a></li>
        <li><a href="../../CHEMICAL/bank/" onclick="it_bank()">Banking Details</a></li>
        </ul>
        </li>

        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">PETRO CHEMICAL<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
        <li class="dropdown-header">PETRO STUDENTS DETAILS</li>
        <li><a href="./" >Personal Details</a></li>
        <li><a href="../educational/" >Education Details</a></li>
        <li><a href="../bank/" >Banking Details</a></li>
        </ul>
        </li>

        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">CIVIL<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
        <li class="dropdown-header">CIVIL STUDENTS DETAILS</li>
        <li><a href="../../CIVIL/personal/" onclick="it_personal()">Personal Details</a></li>
        <li><a href="../../CIVIL/educational/" onclick="it_educational()">Education Details</a></li>
        <li><a href="../../CIVIL/bank/" onclick="it_bank()">Banking Details</a></li>
        </ul>
        </li>

        <li>
        
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
              url: 'petro_personal.php',
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
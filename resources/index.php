<?php
    error_reporting(1);
    session_start();
    if( isset($_SESSION["isLoggedIn"]) ){
         if( $_SESSION["user_role"]!="stu"){
             if( $_SESSION["user_role"]!="fac" ){
            header( 'Location : ../LOGIN/restrictedAccess.php' );
            die();
             }
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
include 'connect.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Resources Library - CampusConnect</title>
	<link type="text/css" href="../LOGIN/css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="css/bootstrap-table.css" rel="stylesheet">
		<link type="text/css" href="css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href="css/custom.css" rel="stylesheet">
        <link rel="stylesheet" href="css/jquery.dataTables.min.css">
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
</head>
<body>
<style type="text/css">
    .icon{
        max-height: 50px;
        width: auto;
    }
</style>
<div id="wrapper" >
    <div id="page-content-wrapper">
        <div class="jumbotron padding_adjust">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-1">
                    <img src="images/batulogo.png" alt="LOGO" id="logo">
                    </div>

                    <div class="col-lg-11" class="text-center">
                        <h2 id="college_name">Dr. Babasaheb Ambedkar Technological University</h2>
                        <p>CampusConnect - e-Resources Library</p>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-xs-6">
                        <h4>Welcome <?php echo $_SESSION["t_full_name"]; ?></h4>
                    </div>
                    <div class="col-xs-6">
                        <a class="btn btn-danger" href="../LOGIN/logout.php">Log Out</a>
                        <?php
                                $url = "";
                                switch($_SESSION["user_role"])
                                {
                                    case "fac":
                                        $url = "../dashboard/index.php";
                                        break;

                                    case "stu":
                                        $url = "../dashboard/user_dashboard.php";
                                        break;

                                    case "nts":
                                        $url = "../dashboard/ntsuser_dashboard.php";
                                }
                                ?>
                                <a href="<?php echo $url; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#eresource">Browse Library</a></li>
  <!--<li><a data-toggle="tab" href="#local">Online e-Resources/Courses</a></li>-->
</ul>
        <div class="tab-content">
            
        	<div id="eresource" class="tab-pane fade in active">
                <br>
        <div class="row col-lg-12">
        	<div id="deptArea" class="col-sm-2">
        		<?php
        			$query = "SELECT * FROM departments ORDER BY dept_name";
        			$result = mysqli_query($conn,$query);
        		?>
        		<select class="form-control" name="department" onchange="getAlbums(this.value)">
        			<option value="">----Select Databases----</option>
        			<?php
        				while($row = mysqli_fetch_array($result) )
        				{
        					echo "<option value=\"".$row['dept_id']."\">".$row['dept_name']."</option>";
        				}
        			?>
        		</select>
        	</div>
        	<div id="albumArea" class="col-sm-2">

        	</div>
            <div id="fileTypeSelection" class="col-sm-4">
                
            </div>
        </div>
            </div>
            
            <div id="local" class="tab-pane fade">
                <br>
            <div class="row col-sm-8 col-sm-offset-1">
            
        
             <div class="alert alert-warning">
            
                <strong>Alert : </strong> Some of the following links may be disabled .
            </div>
           
                    
                <ol type="1">
                    <h4><li><a href="#">University Subscribed List of e-Resources</a></li></h4>
                    <h4><li><a href="https://www.inflibnet.ac.in/">INFLIBNET: Information and Library Network</a></li></h4>
                    <h4><li><a href="https://doaj.org/">Directory of Open Access Journals (DOAJ)</a></li></h4>
                    <h4><li>All book reading fans out there check this new initiative from HRD and IIT KGP. 6.5 million books are now available in one single portal, where you can read online, or download the books. There are text books, audio and video content. Just browsing them all may take years! Enjoy. National Digital Library is an initiative by HRD ministry. It is a huge collection of learning resources (68 lakh books) from primary to PG level. Students  can use it free of charge. <a href="https://ndl.iitkgp.ac.in/">To register, go to</a></li></h4>
                    <h4><li><a href="https://swayam.gov.in/">SWAYAM</a> is an instrument for self-actualisation providing opportunities for a life-long learning. Here learner can choose from hundreds of courses , virtually every course that is taught at the university / college / school level and these shall be offered by best of the teachers in India and elsewhere. If a student is studying in any college, he/she can transfer the credits earned by taking these courses into their academic record. If you are, working or not working, in school or out of school, SWAYAM presents a unique educational opportunity to expand the horizons of knowledge.<a href="https://swayam.gov.in/About">More..</a></li></h4>
                    <h4><li>Information Systems Audit and Control Association  (ISACA), provides practical guidance, benchmarks and other effective tools for all enterprises that use information systems. Through its comprehensive guidance and services, ISACA defines the roles of information systems governance, security, audit and assurance professionals worldwide. The COBIT framework and the CISA, CISM, CGEIT and CRISC certifications are ISACA brands respected and used by these professionals for the benefit of their enterprises.<a href="https://www.isaca.org/pages/default.aspx"> For more details please click here. . .</a></li></h4>
                    <h4><li><b>Empower Yourself: Enjoy the Freedom to Learn and the Tools </b><p></p>
                        Register for free e-courses of your choice and learn additional skills at your own pace. You may earn certificate by giving tests on the site though.<a href="https://alison.com/">  Register yourself on the site and take maximum benefit of online learning</a></li></h4>
                    <h4><li>Register free for daily update on Engineering News and latest product developments, browse product catalogs to understand latest developments…in Engineering 360, powered by IEEE. <a href="http://www.globalspec.com/"> Click here. . .</a> </li></h4>
                    <h4><li><a href="http://www.ic-impacts.com/">IC-IMPACTS (the India-Canada Centre for Innovative Multidisciplinary Partnerships to Accelerate Community Transformation and Sustainability)</a> is the first, and only, Canada-India Research Centre of Excellence established through the Canadian Networks of Centres of Excellence (NCE) as a new Centre dedicated to the development of research collaborations between Canada and India. Built upon the vision of three of Canada’s leading research universities – The University of British Columbia, the University of Alberta, and the University of Toronto – IC-IMPACTS is a pan-Canadian Centre bringing together researchers, industry innovators, community leaders, government agencies, and community organizations from across India and Canada, to work hand-in-hand to find solutions to the key challenges that affect the quality of life of millions of people in Indian and Canadian communities. visit <a href="http://www.ic-impacts.com/">www.ic-impacts.com</a> for finding key challenges</li></h4>
                    
                    <h4><li>Innovation has always been a team sport. If you can take challenge of real problems for your projects with your team with a diverse array of star players, visit<a href="https://www.innocentive.com/"> https://www.innocentive.com </a>Once you register on the site as solver, you can access a whole list of challenges posed by different industries. And if you can solve it in given time frame and if the solution is accepted, financial reward awaits you. Most importantly, it will urge you to take up the next challenge.</li></h4>
                    <h4><li>EXCLUSIVE FREE WEBINAR – Tools & Tips For THE Safe Scale-Up Of Chemical Processes Processes are developed and optimised using small-scale equipment in the laboratory which gives little clue as to the potential hazards after scale-up. Experience and observations based on the bench-scale reactors can give totally misleading information of the likely risk. This webinar will highlight the limitations of small-scale data and describe with examples, why without proper tools, development chemists cannot possibly predict the likely issues and risks.<a href="http://bit.ly/safe-scale-up"> Click here to register . . .</a> </li></h4>
                    <h4><li>What are smart Cities challenges? Register free and get daily updates on the same. May be you will find suitable project for you.<a href="http://smartcitiesconnect.org/">  Click here for details. . . </a></li></h4>
                    <h4><li>Tech Briefs’ White Paper Library to your desktop. At no charge, you can instantly access dozens of reports from industry leaders in electronics, materials, manufacturing, and more. <a href="http://ims.lyris.net/t/12523825/930157780/8710976/31/?fb8dc108=di5nLmdhaWthckBnbWFpbC5jb20%3d&x=1695946d"> White Papers for Engineers and Researchers</a></li></h4>
                </ol>
                
            </div>
            
            </div>
            
        </div>
        <div class="row"><div class="col-lg-1"></div>      <div class="col-lg-10" id="resourceArea"></div>        <div class="col-lg-1"></div></div>
    </div>
</div>
</body>
<script>
function getAlbums(str) {
    if (str == "") {
        document.getElementById("albumArea").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("albumArea").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","getAlbums.php?q="+str,true);
        xmlhttp.send();
    }
}

function getResources(str) {
    if (str == "") {
        document.getElementById("resourceArea").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("resourceArea").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","tst.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</html>

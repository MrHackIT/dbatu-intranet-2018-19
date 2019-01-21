<?php
    error_reporting(1);
    session_start();
    if( isset($_SESSION["isLoggedIn"]) ){
         if( $_SESSION["user_role"]!="fac" ){
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

  $servername = "localhost";
  $username="root";
  $password = "";
  $dbname = "intranet";

  $connection = mysqli_connect($servername,$username,$password,$dbname);
  session_start();
$roll_no = $_SESSION["user_id"];
     $branch = $_SESSION['discipline'];
  $roll_no = $_SESSION["user_id"];
     $branch = $_SESSION['discipline'];



?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Uploaded Documents</title>

  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../login/css/bootstrap.min.css" rel="stylesheet">
    <link href="../login/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="../login/css/bootstrapValidator.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="../login/css/style.css" rel="stylesheet">
    <link href="../login/css/bootstrap.css" rel="stylesheet" />
    <link href="../login/css/font-awesome.css" rel="stylesheet" />
    <link href="../login/css/custom.css" rel="stylesheet" />
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



<div class="jumbotron text-center">
  <h1>Documents</h1>
</div>

    <p style="padding:5px;"></p>
     
<?php include 'topBar.php'; ?>


    <p style="margin:50px"></p>
   

    <p style="margin:50px"></p>

        <div class="container">

          <div class="row">


        <form class="form" id="edu_det" action="edudetails.php" method="post"  enctype="multipart/form-data">



            
              
            </div>


    <div class="panel panel-info">
      <div class="panel-heading"><h1 class="panel-title" style="color:black">Documents</div>
      <div class="panel-body" style="font-size:100%">
          <div class="col-sm-12">

    <div class="col-sm-6">
      <h3>Documents</h3>
        <h4>CET Marksheet</h4><p style="padding:9px"></p>
      <h4>JEE Marksheet</h4><p style="padding:9px"></p>
      <h4>Project</h4><p style="padding:9px"></p>
      <h4>Research Paper</h4><p style="padding:9px"></p>
      <h4>Work Experience</h4><p style="padding:9px"></p>
      <h4>Awards and Certification</h4><p style="padding:9px"></p>
      <h4>Income Certificate(General)</h4><p style="padding:9px"></p>
      <h4>Domicile Certificate(General)</h4><p style="padding:9px"></p>
      <h4>Income Certificate</h4><p style="padding:9px"></p>
      <h4>Domicile Certificate</h4><p style="padding:9px"></p>     
      <h4>Caste Certificate</h4><p style="padding:9px"></p>
      <h4>Caste Validity Certificate</h4><p style="padding:9px"></p>
      <h4>Non-Creamy layer Certificate</h4><p style="padding:9px"></p>



    </div>
    <div class="col-sm-6">
      <h3><center>View/Download</center></h3>
      <h4><center><a class="btn btn-success" href="education/cet_photo/<?php echo $_SESSION["user_id"] ?>.jpg">View</a>&nbsp &nbsp<a class="btn btn-warning" href="education/cet_photo/<?php echo $_SESSION["user_id"] ?>.jpg" download="<?php echo $_SESSION["user_id"] ?>.jpg".>Download</a></center></h4><p style="padding:0.05px"></p>
      
      <h4><center><a class="btn btn-success" href="education/jee_photo/<?php echo $_SESSION["user_id"] ?>.jpg">View</a>&nbsp &nbsp<a class="btn btn-warning" href="education/jee_photo/<?php echo $_SESSION["user_id"] ?>.jpg" download="<?php echo $_SESSION["user_id"] ?>.jpg">Download</a></center></h4><p style="padding:0.05px"></p>

      <h4><center><a class="btn btn-success" href="education/project/<?php echo $_SESSION["user_id"] ?>.pdf">View</a>&nbsp &nbsp<a class="btn btn-warning" href="education/project/<?php echo $_SESSION["user_id"] ?>.pdf" download="<?php echo $_SESSION["user_id"] ?>.pdf">Download</a></center></h4><p style="padding:0.05px"></p>

      <h4><center><a class="btn btn-success" href="education/research/<?php echo $_SESSION["user_id"] ?>.pdf">View</a>&nbsp &nbsp<a class="btn btn-warning" href="education/research/<?php echo $_SESSION["user_id"] ?>.pdf" download="<?php echo $_SESSION["user_id"] ?>.jpg">Download</a></center></h4><p style="padding:0.05px"></p>

      <h4><center><a class="btn btn-success" href="education/work_photo/<?php echo $_SESSION["user_id"] ?>.pdf">View</a>&nbsp &nbsp<a class="btn btn-warning" href="education/work_photo/<?php echo $_SESSION["user_id"] ?>.pdf" download="<?php echo $_SESSION["user_id"] ?>.pdf">Download</a></center></h4><p style="padding:0.05px"></p>

      <h4><center><a class="btn btn-success" href="education/awards_certi_photo/<?php echo $_SESSION["user_id"] ?>.pdf">View</a>&nbsp &nbsp<a class="btn btn-warning" href="education/awards_certi_photo/<?php echo $_SESSION["user_id"] ?>.pdf" download="<?php echo $_SESSION["user_id"] ?>.pdf">Download</a></center></h4><p style="padding:0.05px"></p>

        <h4><center><a class="btn btn-success" href="bank/gen_income/<?php echo $_SESSION["user_id"] ?>.jpg">View</a>&nbsp &nbsp<a class="btn btn-warning" href="bank/gen_income/<?php echo $_SESSION["user_id"] ?>.jpg" download="<?php echo $_SESSION["user_id"] ?>.jpg">Download</a></center></h4><p style="padding:0.05px"></p>

        <h4><center><a class="btn btn-success" href="bank/general_domi/<?php echo $_SESSION["user_id"] ?>.jpg">View</a>&nbsp &nbsp<a class="btn btn-warning" href="bank/general_domi/<?php echo $_SESSION["user_id"] ?>.jpg" download="<?php echo $_SESSION["user_id"] ?>.jpg">Download</a></center></h4><p style="padding:0.05px"></p>
       
        <h4><center><a class="btn btn-success" href="bank/oth_income/<?php echo $_SESSION["user_id"] ?>.jpg">View</a>&nbsp &nbsp<a class="btn btn-warning" href="bank/oth_income/<?php echo $_SESSION["user_id"] ?>.jpg" download="<?php echo $_SESSION["user_id"] ?>.jpg">Download</a></center></h4><p style="padding:0.05px"></p>
       
        <h4><center><a class="btn btn-success" href="bank/oth_domi/<?php echo $_SESSION["user_id"] ?>.jpg">View</a>&nbsp &nbsp<a class="btn btn-warning" href="bank/oth_domi/<?php echo $_SESSION["user_id"] ?>.jpg" download="<?php echo $_SESSION["user_id"] ?>.jpg">Download</a></center></h4><p style="padding:0.05px"></p>
       
        <h4><center><a class="btn btn-success" href="bank/oth_cast/<?php echo $_SESSION["user_id"] ?>.jpg">View</a>&nbsp &nbsp<a class="btn btn-warning" href="bank/oth_cast/<?php echo $_SESSION["user_id"] ?>.jpg" download="<?php echo $_SESSION["user_id"] ?>.jpg">Download</a></center></h4><p style="padding:0.05px"></p>
       
        <h4><center><a class="btn btn-success" href="bank/oth_vali/<?php echo $_SESSION["user_id"] ?>.jpg">View</a>&nbsp &nbsp<a class="btn btn-warning" href="bank/oth_vali/<?php echo $_SESSION["user_id"] ?>.jpg" download="<?php echo $_SESSION["user_id"] ?>.jpg">Download</a></center></h4><p style="padding:0.05px"></p>
       
        <h4><center><a class="btn btn-success" href="bank/oth_non_creamy/<?php echo $_SESSION["user_id"] ?>.jpg">View</a>&nbsp &nbsp<a class="btn btn-warning" href="bank/oth_non_creamy/<?php echo $_SESSION["user_id"] ?>.jpg" download="<?php echo $_SESSION["user_id"] ?>">Download</a></center></h4><p style="padding:0.05px"></p>
   

    </div>
          </div>
  </div>
</div>


     
    </form>
            </div>
              </div>
                  
<p style="padding:40px;"></p>
     <?php include 'footer.php'; ?>
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

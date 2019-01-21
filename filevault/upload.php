<?php
    error_reporting(1);
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Upload files to the University Vault</title>
    <link href="../LOGIN/css/bootstrap.min.css" rel="stylesheet">
    <link href="../LOGIN/css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">

</head>

<body>

<!-- ---------Form Elements Customisations---------- -->
<style type="text/css">
#page-content-wrapper{
  margin-top: 20px;
  margin-left: 0px;
  margin-right: 0px;
  padding-left: 0px;
  padding-right: 0px;
  background-color: rgba(0,0,0,0.45);
}

  #formBox{
    border-radius: 0px;
    padding-top: 20px;
    padding-bottom: 20px;
  }

  .fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
    padding-left: 60px;
    padding-right: 60px;
    padding-top: 5px;
    padding-bottom: 45px;
    border-radius: 0px;
    background-color: blue;
    border: 3px solid white;
    color: white;
}

.fileUpload:hover{
  color: yellow;
  border-color: yellow;
}

.fileUpload .glyphicon{
  font-size: 32px;
}

.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}

#fileName{
  color: white;
}

  #page-content-wrapper{
    text-align: center;
  }

  .form-group input[type="checkbox"] {
    display: none;
  }

  .form-group input[type="checkbox"] + .btn-group > label span {
    width: 20px;
  }

  .form-group input[type="checkbox"] + .btn-group > label span:first-child {
    display: none;
  }
  .form-group input[type="checkbox"] + .btn-group > label span:last-child {
    display: inline-block;   
  }

  .form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
    display: inline-block;
  }
  .form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
    display: none;   
  }

  .btn-group>.btn:last-child:not(:first-child):hover, .btn-group>.dropdown-toggle:not(:first-child):hover, .btn-group>.btn:first-child:not(:last-child):not(.dropdown-toggle):hover{
    cursor: pointer;
  }

  #formBox input[type="text"]{
    border-top: none;
    border-right: none;
    border-left: none;
    color: black;
    border-bottom: 3px solid black;
    background-color: rgba(255,255,255,0);
    font-size: 32px;
  }

  #formBox select{
    font-size: 32px;
    max-height: 80px;
    padding-left: 100px;
    padding-right: 100px;
    padding-top: 5px;
    padding-bottom: 5px;
    color: white;
    background: blue;
    border-radius: 0px;
    border: 3px solid white;
  }

  #formBox h3{
    color: black;
  }

  input[type="text"]::-webkit-input-placeholder{
    color: white;
  }

  input[type="text"]::-moz-placeholder{
    color: white;
  }

  input[type="text"]::-ms-input-placeholder{
    color: white;
  }

  #submitBtn{
    padding-top: 10px;
    padding-bottom: 10px;
    text-align: center;
    background-color: green;
    font-family: 'Droid Sans';
    font-size: 36px;
    color: white;
    border-color: white;
    border-radius: 15px;
    padding-right: 60px;
    padding-left: 60px;
    display: inline-block;

  }
</style>
<!--  -->

    <div class="container-fluid">
                <div class="">
                    <div class="col-lg-12">
                        <div class="jumbotron col-sm-12" id="headerBox">
                            <div class="row">
                                <div class="col-sm-2"><center><img src="../LOGIN/img/Batu_logo4.png" class="element" id="universityLogo"></center></div>
                                <div class="col-sm-10">
                                <h2 id="pageHeader" class="text-left">Dr Babasaheb Ambedkar Technological University</h2>
                                <br><p class="text-center" id="subHeading">Welcome to the CampusConnect FileVault!</p>
                                </div>
                            </div>

                            <div class="row">
                                <a href="../LOGIN/logout.php" class="btn btn-danger pull-right" align="right">Logout</a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
    <div id="wrapper">
        <div id="page-content-wrapper" class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6" id="formBox">
          <form role="form" method="post">
          <div class="row">
            <div class="form-group col-sm-6">
              <div class="fileUpload btn">
                <span class="glyphicon glyphicon-upload"></span>
                <input id="fileToUpload" type="file" class="upload" />
              </div>
              <br><span id="fileName">Choose a File</span>
            </div>
            <!--  -->
            <div class="form-group col-sm-6">
              <input type="text" name="fileName" placeholder="Enter Document Name" class="text-center">
            </div>
          </div>
            <!--  -->
        <hr>
        <h3>Check File Attributes [Multiple Allowed]</h3>
        <div class="row"><div class="col-sm-6"> <!-- First Column Begins -->
        <div class="[ form-group ]">
            <input type="checkbox" name="docType[]" value="financialRecord" id="checkbox-financialRecord" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="checkbox-financialRecord" class="[ btn btn-info ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="checkbox-financialRecord" class="[ btn btn-default active ]">
                    Financial Record
                </label>
            </div>
        </div>
        <div class="[ form-group ]">
            <input type="checkbox" name="docType[]" value="estateRecord" id="checkbox-estateRecord" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="checkbox-estateRecord" class="[ btn btn-primary ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="checkbox-estateRecord" class="[ btn btn-default active ]">
                    Estate Record
                </label>
            </div>
        </div>
        <div class="[ form-group ]">
            <input type="checkbox" name="docType[]" value="communicationRecord" id="checkbox-communicationRecord" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="checkbox-communicationRecord" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="checkbox-communicationRecord" class="[ btn btn-default active ]">
                    Communication Document
                </label>
            </div>
        </div>
        <div class="[ form-group ]">
            <input type="checkbox" name="docType[]" value="important" id="checkbox-important" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="checkbox-important" class="[ btn btn-info ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="checkbox-important" class="[ btn btn-default active ]">
                    Important
                </label>
            </div>
        </div>
        </div> <!-- End of first column -->
        <div class="col-sm-6"> <!-- Second Column Begins -->
        <div class="[ form-group ]">
            <input type="checkbox" name="docType[]" value="eventRecord" id="checkbox-eventRecord" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="checkbox-eventRecord" class="[ btn btn-warning ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="checkbox-eventRecord" class="[ btn btn-default active ]">
                    Event Record
                </label>
            </div>
        </div>
        <div class="[ form-group ]">
            <input type="checkbox" name="docType[]" value="eventReport" id="checkbox-eventReport" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="checkbox-eventReport" class="[ btn btn-danger ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="checkbox-eventReport" class="[ btn btn-default active ]">
                    Event Report
                </label>
            </div>
        </div>
        <div class="[ form-group ]">
            <input type="checkbox" name="docType[]" value="expenditures" id="checkbox-expenditures" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="checkbox-expenditures" class="[ btn btn-success ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="checkbox-expenditures" class="[ btn btn-default active ]">
                    Expenditures
                </label>
            </div>
        </div>
        <div class="[ form-group ]">
            <input type="checkbox" name="docType[]" value="other" id="checkbox-other" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="checkbox-other" class="[ btn btn-primary ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="checkbox-other" class="[ btn btn-default active ]">
                    Other
                </label>
            </div>
        </div>
        </div> <!-- End of Second Column-->
            <!--  -->
            <hr>
            <div class="form-group">
              <h3>Select Document Year</h3>
              <select class="" name="">
                <?php
                  $i = 1980;
                  $currentYear = date("Y");
                  for($i=1980;$i<=$currentYear;$i++){
                    echo "<option value=\"".$i."\">".$i."</option>";
                  }
                ?>
              </select>
            </div>
            <!--  -->
            <div class="form">
              <button type="submit" name="submitBtn" id="submitBtn"><span class="glyphicon glyphicon-ok"></span> Upload Document</button>
            </div>
          </form>
          </div>
        <div class="col-sm-3"></div>
        </div>
    </div>
    <script src="../LOGIN/js/jquery-1.11.1.js"></script>
    <script src="../LOGIN/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      document.getElementById("fileToUpload").onchange = function () {
          document.getElementById("fileName").innerHTML = this.files[0].name;;
      };
    </script>
</body>
</html>

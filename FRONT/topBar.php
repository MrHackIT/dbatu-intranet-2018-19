<p style="padding:5px;"></p>
        <div class="row col-sm-12">
          <div class="col-sm-3 text-left">
            
          </div>
          <div class="col-sm-6 text-center">
            <h3 align="center">Welcome <?php echo $_SESSION["user_id"]?> (Logged in as <b>Student</b>)</h3>
          </div>
          <div class="col-sm-3 text-right">
            <a href="../LOGIN/logout.php"><button type="submit" class="btn btn-danger">LOGOUT</button></a>
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

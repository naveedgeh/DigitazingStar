
<?php
define('TITLE', 'Porfile Setting');
include('header.php');
// include('footer.php');
include('Model/dbConnection.php');
session_start();
$obj=new DBConnection();
            $obj_db=$obj->Connect();
if (isset($_SESSION['is_login'])) {
  // code...
  $uemail = $_SESSION['uemail'];
}else {
  echo "<script> location.href='index.php'</script>";
}


 if (isset($_REQUEST['updateprofile'])) {
   // checking values are empty
   if (($_REQUEST['rName'] == "") || ($_REQUEST['uphone'] == ""))  {
     // if empty show error
     $error = '<div class="col-sm-6 ml-5 mt-2 " role="alert" >Empty field</div>';
   }else {
     // getting value form form inputs
     $uname = $_REQUEST['rName'];
     $uphone = $_REQUEST['uphone'];
     $sql = "UPDATE user_register SET user_name ='$uname' , user_phone = '$uphone'
      WHERE user_email = '$uemail'";
      if ($obj_db->query($sql) == TRUE) {
        // code...
        $name =$_FILES['file']['name'];
        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");

        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){

           // Insert record
           // $sql = "UPDATE INTO user_register(image) values('".$name."') WHERE user_email = '".$uemail."'";
           // $conn->query($sql);

           $sql = "UPDATE user_register SET image_path ='$name'
            WHERE user_email = '$uemail'";
            if ($obj_db->query($sql) == TRUE) {
              // code...
              $error = 'Updated Successfully';
            }else {
              $error = 'Unable to change your profile dat';
            }

           // Upload file
           move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

      }
   }
 }
}
 // $uemail = $_SESSION['uemail'];
 $sql = "SELECT user_email, user_name,user_phone,image_path FROM user_register
  Where user_email = '$uemail'";
  $result = $obj_db->query($sql);
  if ($result->num_rows == 1) {
    // code...
    $row = $result->fetch_assoc();
    $rName = $row['user_name'];
    $rPhone = $row['user_phone'];
    $image = $row['image_path'];
      $image_src = "img/".$image;

  }

  if(isset($_POST['updateimg'])){

    $name = $_FILES['file']['name'];
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){

       // Insert record
       // $sql = "UPDATE INTO user_register(image) values('".$name."') WHERE user_email = '".$uemail."'";
       // $conn->query($sql);

       $sql = "UPDATE user_register SET image_path ='$name'
        WHERE user_email = '$uemail'";
        if ($conn->query($sql) == TRUE) {
          // code...
          $error = 'Updated Successfully';
        }else {
          $error = 'Unable to change your profile dat';
        }

       // Upload file
       move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

    }


    $sql = "SELECT image_path,user_email FROM user_register where user_email = '$uemail'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
      // code...
      $row = $result->fetch_assoc();
      $image = $row['image_path'];
        $image_src = "img/".$image;
    }
    // $row = mysqli_fetch_array($result);
    //
    // $image = $row['image_path'];


  }


 ?>
</head>

      <body>

    <!-- #END# Search Bar -->
    <!-- #Top Bar -->
    <?php include('Topbar.php') ?>
    <section>
        <!-- Left Sidebar -->
        <aside id="" class="">
            <!-- User Info -->

            <!-- #User Info -->
            <!-- Menu -->
          <?php  include('Sidebar.php') ?>
            <!-- #Menu -->
            <!-- Footer -->

            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <!-- <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li> -->
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <!-- <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1 style="font-size:28px">Profile Settings</h1>
            </div>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-xs-12">
                    <p style="font-size: 20px; color: #555;">View and edit your personal info below.</p>
            </div>
        </div>
        <!-- from -->

        <div class="row clearfix" style="margin-top:15px;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h4>
                            Login Email : <?php if (isset($uemail)) {
                              // code...
                              echo $uemail;
                            }  ?>

                        </h4>

                    </div>
                    <div class="body">
                        <form id="frmFileUpload" class="form-horizontal" method="post" enctype="multipart/form-data" >
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email_address_2">Email Address</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="email_address_2" class="form-control" value="<?php echo $uemail; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="user_name">User Name</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="rName" id="user_name" class="form-control" value = "<?php echo $rName ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Phone">Phone</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="int" name="uphone" class="form-control mobile-phone-number"  value = "<?php echo $rPhone ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Phone">Profile Picture</label>
                                </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="file" id="user_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                          </div>
                            <div class="row clearfix">
                                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                    <input type="checkbox" id="remember_me_3" class="filled-in">
                                    <label for="remember_me_3">Remember Me</label>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                    <button name="updateprofile" type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE PROFILE</button>
                                </div>
                            </div>
                            <?php if (isset($error)) {
                              // code..
                              echo $error;
                            } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>





        <!-- from end -->





    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>

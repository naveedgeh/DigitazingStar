
<?php
define('TITLE', 'User Prfile');
include('header.php');
// include('footer.php');
include('../dbConnection.php');
session_start();
if (isset($_SESSION['is_login'])) {
  // code...
  $uemail = $_SESSION['uemail'];

}else {
  echo "<script> location.href='Login.php'</script>";
}
// $uemail = $_SESSION['uemail'];
$sql = "SELECT user_email, user_name,image_path FROM user_register
 Where user_email = '$uemail'";
 $result = $conn->query($sql);
 if ($result->num_rows == 1) {
   // code...
   $row = $result->fetch_assoc();
   $rName = $row['user_name'];
   $image = $row['image_path'];
     $image_src = "img/".$image;
 }

 if (isset($_REQUEST['submitorder'])) {
   // code...
   $uimages =$_FILES['ufiles']['name'];
   $target_dir = "img/";
   $target_file = $target_dir . basename($_FILES["ufiles"]["name"]);

   // Select file type
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

   // Valid file extensions
   $extensions_arr = array("jpg","jpeg","png","gif");

   if( in_array($imageFileType,$extensions_arr) ){

          if (($_REQUEST['urequired_format_2'] == "")) {
            // code...
            $urequired_format = $_REQUEST['urequired_format'];
          }else {
            $urequired_format = $_REQUEST['urequired_format_2'];
          }

           $udesign = $_REQUEST['udesign'];
           $uorder_type = $_REQUEST['uorder_type'];
           // $urequired_format = $_REQUEST['urequired_format_2'];
           $uwidth = $_REQUEST['uwidth'];
           $uheight = $_REQUEST['uheight'];
           $umeasure = $_REQUEST['umeasure'];
           $ufabric_type = $_REQUEST['ufabric_type'];
           $uplacement = $_REQUEST['uplacement'];
           $ucolors = $_REQUEST['uno_of_colors'];
           $ublending = $_REQUEST['ublending'];
           $umessage = $_REQUEST['uadditional_details'];


//   return $result;
      $sql = "INSERT INTO order_tb(`design_name`, `order_type`, `required_format`, `width`, `height`, `measure_type`, `fabric_type`, `placement`, `colors`, `blending`, `additional_details`, `image_files`)
       VALUES ('$udesign','$uorder_type','$urequired_format','$uwidth','$uheight','$umeasure','$ufabric_type','$uplacement','$ucolors','$ublending','$umessage','$uimages')";
       if ($conn->query($sql) == TRUE) {
         // code...
         echo "<script> alert('order submited')</script>";
         // $error = 'Order Submited';

       }else {
         echo "<script> alert('Sorry Your Unable to place your order.')</script>";


         // $error = 'Sorry Your Unable to place your order.';
       }

      // Upload file
      move_uploaded_file($_FILES['ufiles']['tmp_name'],$target_dir.$uimages);

 }
}

 ?>

 <style>
 .form-group .form-line:after {

    border-bottom: 2px solid rgba(0,0,0,0.05);
}
.btn-group > .btn:first-child {
    padding-left: 0px !important;
    margin-left: 0;
}
span.filter-option.pull-left {
    color: #aaa;
}
.row.clearfix {
    margin-bottom: 12px !important;
}
form.form-horizontal {
    padding-bottom: 10px;
}
section.content {
    margin: 50px 15px 0 315px !Important;
  }



 </style>
</head>

<body class="theme-red">

    <!-- Top Bar -->
    <?php include('Topbar.php') ?>
    <!-- #Top Bar -->
    <!-- #SIDE BAR -->
    <?php include('Sidebar.php') ?>
      <!-- #SIDE BAR END -->


    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>Orders </h1>
            </div>

            <!-- Order Form start -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Submit Your Order
                            </h2>

                        </div>


                          <form enctype="multipart/form-data"  method="post" class="form-horizontal">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email_address_2">Design</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="udesign" id="desgin" class="form-control" placeholder="your design">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="user_name">Order Type</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                          <select name="uorder_type" id='purpose' class="form-control">
                                          <option value="digitize">Digitize</option>
                                          <option value="vectorize">Vectorize</option>
                                          <option value="Quote">Quote</option>
                                          </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                              <div style='display:none;' id='vectorize'>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="user_name">Required Format</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                              <select class="form-control" required="" id="required_format" name="urequired_format">
                                                <option value="Not Mentioned">Required Format</option>
                                                <option value="cdr">cdr</span></option>
                                                <option value="ai">ai</option>
                                                <option value="eps">eps</option>
                                                <option value="Other">Other</option>
                                              </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                              </div>
                              <div style='' id='digitize'>


                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="user_name">Required Format</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                              <select class="form-control" name="urequired_format_2">
                                                      <option value="">Required Format</option>
                                                      <option value="100">100</option>
                                                      <option value="cnd">cnd</option>
                                                      <option value="dsb">dsb</option>
                                                      <option value="dst">dst</option>
                                                      <option value="dsz">dsz</option>
                                                      <option value="emb">emb</option>
                                                      <option value="exp">exp</option>
                                                      <option value="jef">jef</option>
                                                      <option value="ofm">ofm</option>
                                                      <option value="ksm">ksm</option>
                                                      <option value="pef">pef</option>
                                                      <option value="pof">pof</option>
                                                      <option value="pxf">pxf</option>
                                                      <option value="tap">tap</option>
                                                      <option value="xxx">xxx</option>
                                                      <option value="cdr">cdr</span></option>
                                                      <!-- <option value="ai">ai</option>
                                                      <option value="eps">eps</option>
                                                      <option value="other">other</option> -->
                                                      </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- width -->
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="user_name">Width</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                	<input type="int" name="uwidth" class="form-control" placeholder="width">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- height -->

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="user_name">Height</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                	<input type="int" name="uheight" class="form-control"  placeholder="height">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- sive measure -->

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="user_name">Measure</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                              <select name="umeasure" class="form-control">
                                                  <option value="Not Mentioned">Select</option>
                                              <option value="Inches">Inches</option>
                                            <option value="cms">cms</option>
                                            <option value="mms">mms</option>

                                              </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- fabric type -->

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="user_name">Fabric Type</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                              <select class="form-control" id="fabric_type" name="ufabric_type">
                                          <option value="Not Mentioned">Fabric Type</option>
                                          <option value="Pique">Pique</option>
                                          <option value="Single Jersey">Single Jersey</option>
                                          <option value="Cotton Woven">Cotton   Woven</option>
                                          <option value="Denim">Denim</option>
                                          <option value="Silk">Silk</option>
                                          <option value="Polyester">Polyester</option>
                                          <option value="Twill">Twill</option>
                                          <option value="Flannel">Flannel</option>
                                          <option value="Fleece">Fleece</option>
                                          <option value="Towel">Towel</option>
                                          <option value="Leather">Leather</option>
                                          <option value="Other">Other</option>
                                          </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                  <!-- placement -->
                                  <div class="row clearfix">
                                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                          <label for="user_name">placement</label>
                                      </div>
                                      <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                          <div class="form-group">
                                              <div class="form-line">
                                                <select class="form-control" id="placement" name="uplacement">
                                                      <option value="Not Mentioned">placement</option>
                                                      <option value="Cap">Cap</option>
                                                      <option value="Cap Side">Cap Side</option>
                                                      <option value="Cap Back">Cap Back</option>
                                                      <option value="Chest">Chest</option>
                                                      <option value="Gloves">Gloves</option>
                                                      <option value="Sleeves">Sleeves</option>
                                                      <option value="Towel">Towel</option>
                                                      <option value="Visor">Visor</option>
                                                      <option value="Jacket Back">Jacket Back</option>
                                                      <option value="Other">Other</option>
                                                      </select>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                  <!-- no of colors -->
                                  <div class="row clearfix">
                                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                          <label for="user_name">Colors</label>
                                      </div>
                                      <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                          <div class="form-group">
                                              <div class="form-line">
                                                <select class="form-control" id="no_of_colors" name="uno_of_colors">
                                                              <option value="Not Mentioned">No. of Colors</option>
                                                              <option value="1">1</option><option value="2">2</option><option value="3">3</option>
                                                              <option value="4">4</option><option value="5">5</option><option value="6">6</option>
                                                              <option value="7">7</option><option value="8">
                                                              </select>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                        </div>


                                        <!-- blending -->

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="user_name">Blending</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                      <select class="form-control" id="blending" name="ublending">
                                                      <option value="Not Mentioned">Do You Require blending ?</option>
                                                      <option value="Yes">Yes</option>
                                                      <option value="No">No</option>
                                                      <option value="Not Sure">Not Sure</option>
                                                      </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="user_name">Additional details</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                      <!-- <input type="text" name="uadditional_details" value=""> -->
                                                      <textarea id="additional_details" class="form-control" name="uadditional_details" value="No Message"  rows="5" placeholder="Message"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="user_name">Upload pictures</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="file" name="ufiles" style="padding: 0px 10px !important" required="" multiple="" name="files[]" value="Upload Image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                                <div class="row clearfix">
                                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                                        <button name="submitorder" type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE PROFILE</button>
                                                    </div>
                                                </div>

                          </form>
                    </div>
                </div>
            </div>

            <!-- Order Form End -->
  </div>
    </section>




    <!-- Jquery Core Js -->
    <!-- <script src="plugins/jquery/jquery.min.js"></script> -->

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


    <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>
      <script src="js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>


  <!-- Autosize Plugin Js -->
    <script src="plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="plugins/momentjs/moment.js"></script>


    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>






</body>

</html>

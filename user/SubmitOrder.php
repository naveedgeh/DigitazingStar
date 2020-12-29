
<?php
session_start();
define('TITLE', 'Submitted Order');

include_once 'Model/Order.php';
include_once 'Model/Order_Interface.php';

if (isset($_SESSION['is_login'])) {
  // code...
  $uemail = $_SESSION['uemail'];
  $user_id=$_SESSION['user_id'];
  $user_name=$_SESSION['user_name'];

}else {
  echo header("Location:index.php");
}
include_once ('header.php');
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
    <?php include_once ('Topbar.php') ?>
    <!-- #Top Bar -->
    <!-- #SIDE BAR -->
    <?php  include_once ('Sidebar.php') ?>
      <!-- #SIDE BAR END -->
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <br/><br/>
                <h2>Orders </h2>
</div>
   <!-- Widgets -->
   <?php  include_once 'Widgets.php';?>
                <?php
                            

                        if(isset($_SESSION['errors'])){
                                $erros=$_SESSION['errors'];
                        }

                                if(isset($_SESSION['msg'])){
                                    $msg=$_SESSION['msg'];
                                    unset($_SESSION['msg']);
                              if($msg=="successful"){
                               ?>
               <div class="alert alert-success alert-dismissible" role="alert">
                <strong>Success!</strong>Thanks for submitted Order
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                               <?php }
                              else{

                               
                               ?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                <strong>Warning!</strong> Your order not submitted please check again
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                              <?php }}
                              if(isset($_SESSION['order_obj'])){

                                  $order_obj=unserialize($_SESSION['order_obj']);
                              // echo ($order_obj->desing_name);
                               
                                      }
                                      else{

                                          $order_obj=new Order();
                                      }
                               
                               ?>
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
<form  action="Controller/OrderController.php" method="Post" class="form-horizontal" enctype="multipart/form-data">
                           <input type="hidden" name="user_id" value="<?php echo $user_id;?>"/>
                           <input type="hidden" name="user_name" value="<?php echo $user_name;?>"/>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email_address_2">Design</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                        
                                            <input type="text" name="udesign" value="<?php echo $order_obj->design_name;?>" id="desgin" class="form-control" placeholder="your design">
                                        </div>
                                        <lable style="color:red">
                                        <?php
                                        if(isset($erros['udesign'])){
                                            echo $erros['udesign'];
                                        }
                                        ?>
                                        </lable>
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
                                         
                                          <?php
                                         Web_Interface::Load_OrderType($order_obj->order_type);
                                          ?>
                                         
                                          
                                        </div>
                                        <lable style="color:red">
                                        <?php
                                        if(isset($erros['uordertype'])){
                                            echo $erros['uordertype'];
                                        }
                                        ?>
                                        </lable>
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
                                              <?php
                                       Web_Interface::Load_Required_format();
                                              
                                              ?>
                                            </div>
                                            <lable style="color:red">
                                        <?php
                                        if(isset($erros['urequired_format'])){
                                            echo $erros['urequired_format'];
                                        }
                                        ?>
                                        </lable>
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
                                            <?php
                                          Web_Interface::Required_format2();
                                            ?>
                                             <!-- Here web -->
                                            </div>
                                            <lable style="color:red">
                                        <?php
                                        if(isset($erros['urequired_format'])){
                                            echo $erros['urequired_format'];
                                        }
                                        ?>
                                        </lable>
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
                                                	<input type="number"  value="<?php echo $order_obj->width;?>" name="uwidth" class="form-control" placeholder="width">
                                            </div>
                                            <lable style="color:red">
                                        <?php
                                        if(isset($erros['uwidth'])){
                                            echo $erros['uwidth'];
                                        }
                                        ?>
                                        </lable>
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
                                                	<input type="number"  value="<?php echo $order_obj->height;?>" name="uheight" class="form-control"  placeholder="height"/>
                                            </div>
                                            <lable style="color:red">
                                        <?php
                                        if(isset($erros['uheight'])){
                                            echo $erros['uheight'];
                                        }
                                        ?>
                                        </lable>
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
                                             <!-- measure -->
                                             <?php
                                             
                                             Web_Interface::Load_Measure($order_obj->Measure);
                                             ?>
                                            </div>
                                            <lable style="color:red">
                                        <?php
                                        if(isset($erros['umesure'])){
                                            echo $erros['umesure'];
                                        }
                                        ?>
                                        </lable>
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
                                            <?php
                                            Web_Interface::Load_Fabric($order_obj->fabric_type);
                                            ?>
                                            </div>
                                            <lable style="color:red">
                                        <?php
                                        if(isset($erros['ufabric_type'])){
                                            echo $erros['ufabric_type'];
                                        }
                                        ?>
                                        </lable>
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
                                               <!-- placement -->
                                               <?php
                                               
                                            Web_Interface::Load_placement($order_obj->placement);
                                               ?>
                                              </div>
                                              <lable style="color:red">
                                        <?php
                                        if(isset($erros['uplacement'])){
                                            echo $erros['uplacement'];
                                        }
                                        ?>
                                        </lable>
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
                                                <?php
                                                
                                              Web_Interface::Load_Color($order_obj->color);
                                                ?>
                                              </div>
                                              <lable style="color:red">
                                        <?php
                                        if(isset($erros['uno_of_colors'])){
                                            echo $erros['uno_of_colors'];
                                        }
                                        ?>
                                        </lable>
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

                                                     <?php
                                                    Web_Interface::Load_blending($order_obj->blending);
                                                     ?>
                                                     
                                                    </div>
                                                    <lable style="color:red">
                                        <?php
                                        if(isset($erros['ublending'])){
                                            echo $erros['ublending'];
                                        }
                                        ?>
                                        </lable>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="user_name">Urgent Work</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                      
                                                     
                                                     <?php
                                                    Web_Interface::Load_urgent($order_obj->urgent_work);
                                                     ?>
                                                     
                                                      
                                                    </div>
                                                    <lable style="color:red">
                                        <?php
                                        if(isset($erros['urgent_work'])){
                                            echo $erros['urgent_work'];
                                        }
                                        ?>
                                        </lable>
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
                                                      <textarea id="additional_details" class="form-control" name="uadditional_details" value="No Message"  rows="5" placeholder="Message"><?php echo $order_obj->additional_work;?></textarea>
                                                    </div>
                                                    <lable style="color:red">
                                        <?php
                                        if(isset($erros['uadditional_details'])){
                                            echo $erros['uadditional_details'];
                                        }
                                        ?>
                                        </lable>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="user_name">Upload Zip/Pictures</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="file" name="work_file" style="padding: 0px 10px !important" required="" multiple="" name="files[]" value="Upload Image">
                                                    </div>
                                                    <lable style="color:red">
                                        <?php
                                        if(isset($erros['work_file'])){
                                            echo $erros['work_file'];
                                        }
                                        ?>
                                        </lable>
                                                </div>
                                            </div>
                                        </div>

                                                <div class="row clearfix">
                                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                                        <input  name="submitorder" type="submit" class="btn btn-primary m-t-15 waves-effect" value="Submit Order">
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
    <srcipt src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    





</body>

</html>

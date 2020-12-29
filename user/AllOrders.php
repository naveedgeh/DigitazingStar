
<?php
session_start();
define('TITLE', 'User Prfile');
include('header.php');
// include('footer.php');
include('../dbConnection.php');

$obj=new DBConnection();
            $obj_db=$obj->connect();

            if (isset($_SESSION['is_login'])) {
                // code...
                $uemail = $_SESSION['uemail'];
                $user_id=$_SESSION['user_id'];
              }else {
                echo "<script> location.href='index.php'</script>";
              }
// $uemail = $_SESSION['uemail'];
$sql = "SELECT user_email, user_name FROM user_register
 Where user_email = '$uemail'";
 $result = $obj_db->query($sql);
 if ($result->num_rows == 1) {
   // code...
   $row = $result->fetch_assoc();
   $rName = $row['user_name'];
 }



 ?>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <?php include('Topbar.php') ?>
    <!-- #Top Bar -->



    <?php include('Sidebar.php') ?>



    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
           <?php include_once 'Widgets.php'?>

        </div>

        <div class="table-responsive">
        <table id="myTable" class="table table-bordered" width="100%">
        
        <thead class="bg-primary">
        <tr>
        <th>Design Name</th>
        <th>Order Type</th>
        <th>Required Format</th>
        <th>Width</th>
        <th>Height</th>
        <th >Measure Type</th>
        <th >Fabric Type</th>
        <th >Placement</th>
        <th >Total Colors</th>
        <th >Blending</th>
        <th >Additional Details</th>
        <th >Status</th>
        </tr>
        </thead>
        <tbody>
        <?php
        
        $oderselect="SELECT * FROM `order_tb` WHERE `user_id`='$user_id'";

        $result=$obj_db->query($oderselect);
        while($data=$result->fetch_array())
       
        {
        ?>
        <tr>
        <td><?php echo $data['design_name'];?></td>
        <td><?php echo $data['order_type'];?></td>
        <td><?php echo $data['required_format'];?></td>
        <td><?php echo $data['width'];?></td>
        <td><?php echo $data['height'];?></td>
        <td><?php echo $data['measure_type'];?></td>
        <td><?php echo $data['fabric_type'];?></td>
        <td><?php echo $data['placement'];?></td>
        <td><?php echo $data['colors'];?></td>
        <td><?php echo $data['blending'];?></td>
        <td><?php echo $data['additional_details'];?></td>
        <td><?php if($data['reject']=='1'){

                    echo "Reject";

                   }
                   elseif($data['statuss']==''){
                       echo "Pending";
                   }
                   else{
                       echo $data['statuss'];
                   }
        ?></td>

        </tr>
        <?php }?>
        
        
        </tbody>
        <thead class="bg-primary">
        <tr>
        <th>Design Name</th>
        <th>Order Type</th>
        <th>Required Format</th>
        <th>Width</th>
        <th>Height</th>
        <th >Measure Type</th>
        <th >Fabric Type</th>
        <th >Placement</th>
        <th >Total Colors</th>
        <th >Blending</th>
        <th >Additional Details</th>
        <th >Status</th>
        
        </tr>
        </thead>
        </table>
        </div>
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

    <srcipt src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    
   
</body>

</html>

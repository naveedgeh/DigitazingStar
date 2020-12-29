<?php
session_start();
define('TITLE','View Invoice');
include_once 'Model/dbConnection.php';
if (isset($_SESSION['is_login'])) {
  // code...
  $uemail = $_SESSION['uemail'];
  $user_id=$_SESSION['user_id'];
}else {
  echo "<script> location.href='index.php'</script>";
}



include('header.php');
include('Sidebar.php');
 ?>

</head>
<?php include ("Topbar.php"); ?>
<body class="theme-red">
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

              <!-- Widgets -->
                <?php // include_once 'Widgets.php';?>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <div class="panel" >
                    <div class=" bg-primary" style="padding:3px;"></div>
                    <div class="panel-body" id="printElement">
                   
   <?php
                    $obj=new DBConnection();
                    $obj_db=$obj->Connect();
                    if(isset($_GET['invoice'])){
                        $invoiceid=$_GET['invoice'];
                    }
                    if(isset($_SESSION['user_id'])){
                        $user_id=$_SESSION['user_id'];
                    }
                    $invoice_data="SELECT * FROM `invoice` JOIN `user_register` ON (invoice.user_id=user_register.user_id) where `invoice_id`='$invoiceid'";
                    $result=$obj_db->query($invoice_data);
                    $data=$result->fetch_array();
                    ?>
                    <strong>Digitizing Star</strong>
                    <p>We believe in quality then quantity</p>

                    <div>
                    <span style="margin-top:50px;font-size:30px; color:#e91e63;">Invoice</span>
                    <p>Submitted on <?php echo date('d/m/Y',strtotime($data['submittd_date']));?></p>
                    </div>
                    <div class="row" style="margin-top:40px;">
                    <div class="col-md-4">
                    <strong>Invoice for</strong>
                    <p>Customer Name:<?php echo $data['user_name']?></p>

                    
                    </div>
                    <div class="col-md-4">
                    <strong>Invoice Type</strong>
                    <p><?php echo $data['invoice_type'];?></p>
                    </div>
                    <div class="col-md-4">
                    <strong>Invoice Number</strong>
                    <p><?php echo $data['invoice_number']?></p>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Description</th>
        <th>Qty</th>
        <th>Unit Price</th>
        <th>Total Price</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Total Regular Work</td>
        <td><?php echo $data['total_regular_work'];?></td>
        <td><?php echo $data['regular_price'];?></td>
        <td><?php echo $data['total_regular_price']?></td>
      </tr>
      <tr>
        <td>Total Urgent Work</td>
        <td><?php echo $data['total_urgent_work']?></td>
        <td><?php echo $data['urgent_price']?></td>
        <td><?php echo $data['total_urgent_price']?></td>
      </tr>
       <tr>
        <td>Total Complex Logo</td>
        <td><?php echo $data['complex_order']?></td>
        <td><?php echo $data['complex_price']?></td>
        <td><?php echo $data['total_complex_price']?></td>
      </tr>
      <tr>
        <td>Total Back Logo</td>
        <td><?php echo $data['back_logo']?></td>
        <td><?php echo $data['back_logo_price']?></td>
        <td><?php echo $data['total_back_logo_price']?></td>
      </tr>
      <tr>
       
        <td colspan="3"><span style="float:right;font-size:18px;">Grand Total</span></td>
        <td><?php echo $data['grand_total']?><b>$</b></td>
        
      </tr>
     
    </tbody>
  </table>
                    </div>
                    </div>
                   
                    </div>
                    <button type="button" id="printButton" style="margin-top:-30px; margin-left:30px;" class="btn btn-primary;">Print</button>
                    </div>
                    
                </div>
               
            </div>

    <?php include('footer.php') ?>

</body>

</html>

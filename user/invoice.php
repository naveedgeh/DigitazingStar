<?php
session_start();
define('TITLE','Invoice');
include('header.php');
include_once 'Model/ExtraFunction.php';
// include_once('dbConnection.php');

if (isset($_SESSION['is_login'])) {
    // code...
    $uemail = $_SESSION['uemail'];
    $user_id=$_SESSION['user_id'];
  }else {
    echo "<script> location.href='index.php'</script>";
  }
 ?>

</head>



<body class="theme-red">
<?php
include_once 'Topbar.php';
?>
<?php include('Sidebar.php') ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

              <!-- Widgets -->
              <?php include_once 'Widgets.php';?>

            <div class="row clearfix">
            <div class="panel ">
            <div class="panel-heading bg-primary">
            <h5>Invoice Details</h5>
            
            </div>
            <div class="panel-body">
            <form action="Controller/Multiple_Invoice_delete.php" method="post">
        <input type="submit" value="All Invoice Delete" class="btn btn-primary" style="margin-bottom:30px; margin-left:18px;"/>
        <div class="table-responsive">
        <table id="myTable" class="table table-bordered" width="100%">
        
        <thead class="bg-primary">
        <tr>
        
        <th><input type="checkbox" id="selectallinvoice" style="opacity: unset;position: unset;"></th>
        <th>Invoice Number</th>
        <th>Payment Status</th>
        <th>Received Date</th>
        <th>Invoice Type</th>
        <th>Invoice Action</th>
        </tr>
        </thead>
        <tbody>
        
        <?php
        
        $invoice_obj=new ExtraFunction();
                $allinvoice=$invoice_obj->GetAllInvoies($user_id);
            foreach ($allinvoice as $value) {
        ?>
        <tr>
        <td>
        <input type="checkbox" name="delete[]" value="<?php echo $value->invoice_id;?>" class="checkbox" style="opacity: unset;position: unset; margin-left:9px;"/>
        </td>
        <td><?php echo $value->invoice_number;?></td>
        <td><?php echo $value->payment_status;?></td>
        <td><?php echo $value->invoice_date;?></td>
        <td><?php echo $value->invoice_type;?></td>
        
    <td>
    <a href="view_invoice.php?invoice=<?php echo $value->invoice_id?>" class="btn btn-primary">View</a>
    <!-- <a href="View/ViewUpdate.php" id="updateOrder" data-viewid="<?php// echo $value->order_id;?>" Data-coption="Update Order" class="btn btn-primary">Update</a> -->
    <a href="Controller/Invoice_Single_Record_Delete.php" data-invoice="<?php echo $value->invoice_id;?>" id="singleinvoice" class="btn btn-primary">Delete</a>
    </td>
        </tr>
        <?php }?>
        
        
        </tbody>
       
        </table>
        </div>
        </form>
            
            
            </div>
           
                
  </div>
  </div>

    <?php include('footer.php') ?>
    <script>
 $('#selectallinvoice').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
});
$('#singleinvoice').click(function(event){
        //  event.preventDefault();
        var invoice_id=$(this).data('invoice');
        var url=$(this).attr('href');

        $.ajax
        (
            {
                type:'POST',    
                url:url,
                data:{"data":invoice_id},
            }
        ).done(function(res){
          
        if(res=="done"){
            location.reload();
        }
        });
    });
</script>

</body>

</html>

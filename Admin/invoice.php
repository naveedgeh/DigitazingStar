<?php
include('header.php');
include('sidebar.php');
include_once 'Model/generate_invoice.php';

 ?>

</head>

<?php

?>

<body class="theme-red">
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
                <?php include_once 'Widgets.php';?>
            </div>

              <!-- Widgets -->
             

               <?php
    if(isset($_SESSION['sent'])){
      $msg=$_SESSION['sent'];
      unset($_SESSION['sent']);
    

    
  ?>
  <div class="alert alert-warning alert-dismissible " role="alert">
  <strong>Invoice!</strong> <?php   echo $msg;?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    <?php }?>
            <div class="row clearfix">
            <div class="panel ">
            <div class="panel-heading bg-primary">
            <h5>Invoice Details</h5>
            <a href="" style="float:right;margin-top:-30px;" id="ginvoice" class="btn btn-primary">Generate Invoice</a>
            </div>
            <div class="panel-body">
          
            <form action="Controller/Multiple_Invoice_delete.php" method="post">
            <input type="submit" value="All Invoice Delete" class="btn btn-primary" style="margin-bottom:30px; margin-left:18px;"/>
            


            
            <div class="table-responsive">
            

<table id="myTable202" class="table table-bordered" width="100%">

<thead class="bg-primary">
<tr><th><input type="checkbox" id="selectallin" style="opacity: unset;position: unset;"></th>

<th>Name</th>
<th>User Name</th>
<th>Invoice Number</th>
<th>Payment Status</th>
<th>Invoice Type</th>
<th>Status</th>
<th>Invoice View</th>

</tr>
</thead>
<tbody>
<?php

$obj_invoice=new Invoice();
$invoice=$obj_invoice->GetAllInvoice();
foreach ($invoice as $value) {

?>

<tr>
<td>
<input type="checkbox" name="delete[]" value="<?php echo $value->invoice_id;?>" class="checkbox" style="opacity: unset;position: unset; margin-left:9px;"/>
</td>
<td><?php echo $value->customername;?></td>
<td><?php echo $value->username;?></td>
<td><?php echo $value->invoice_number;?></td>
<td><?php echo $value->paymentstatus;?></td>
<td><?php echo $value->invoice_type;?></td>
<td><?php echo $value->status;?></td>
<td>
<a href="view_invoice.php?invoice=<?php  echo $value->invoice_id;?>" class="btn btn-primary">View</a>
<a href="Controller/sendInvoiceController.php" data-invoiceid="<?php  echo $value->invoice_id;?>" data-userd="<?php  echo $value->user_id;?>" id="" class="btn btn-primary send">Send</a>
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
<!--Model Content-->
<div class="modal fade" id="invoiceModel" role="dialog">
    <div class="modal-dialog ">
<div class="modal-content modal-lg">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title title">Generate Invoice</h4>
        </div>
        <div class="modal-body invoice_data">
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </div>
    </div>
    <!--Model Content End-->
    <?php include('footer.php') ?>
    <script>
$('#selectallin').click(function(event) {   
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
$(".send").click(function(event){

  event.preventDefault()
  var invoiceid=$(this).data("invoiceid");
  var userd=$(this).data('userd');
  var url=$(this).attr('href');
  
  $.ajax
  ({
    type:'Post',
    data:{'invoiceid':invoiceid,'userd':userd},
    url:url,

  }).done(function(res){

          // alert(res);
       
      if(res=='done'|| res=='sorry'){
        location.reload();
      }

  });


});
  

  


</script>

</body>

</html>

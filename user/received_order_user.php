<?php
session_start();
define('TITLE','Recived Order');
include_once 'Model/ExtraFunction.php';

include('header.php');
if (isset($_SESSION['is_login'])) {
    // code...
    $uemail = $_SESSION['uemail'];
  }else {
    echo "<script> location.href='index.php'</script>";
  }

if(isset($_SESSION['user_id'])){
    $user_id=$_SESSION['user_id'];
}
 ?>

</head>
<?php  ?>
<body class="theme-red">
    <?php
    include_once 'Topbar.php';
    include_once 'Sidebar.php';
    ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

              <!-- Widgets -->
               <?php include_once 'Widgets.php';?>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Received Order</h2>
                        </div>
                        <br/>
                        <form action="Controller/Received_Multiple__Record_delete.php" method="post">
        <input type="submit" value="All Received Order Delete" class="btn btn-primary" style="margin-bottom:30px; margin-left:18px;"/>
        <div class="table-responsive">
        <table id="myTable" class="table table-bordered" width="100%">
        
        <thead class="bg-primary">
        <tr>
        
        <th><input type="checkbox" id="selectallr" style="opacity: unset;position: unset;"></th>
        
        <th>Work File Download</th>
        <th>Received Date</th>
        <th>Status</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
        
        <?php
        
        $order_obj=new ExtraFunction();
                $recived=$order_obj->ShowReceivedOrder($user_id);
            foreach ($recived as $value) {
        ?>
        <tr>
        <td>
        <input type="checkbox" name="delete[]" value="<?php echo $value->received_id;?>"  class="checkbox" style="opacity: unset;position: unset; margin-left:9px;"/>
        </td>
        <td>
        <a href="../Techlog/workfile/<?php echo $value->workfile; ?>" download class="download_status"><button type="button" data-receivedid="<?php echo $value->received_id;?>" class="btn btn-primary download">Download</button></a>
        </td>
        <td><?php echo $value->received_date;?></td>
        <td><?php echo $value->workstatus;?></td>
      
        
    <td>
    
    <a href="Controller/Single_Received_Record_Delete.php" data-signle="<?php echo $value->received_id;?> " id="singlere" class="btn btn-primary">Delete</a>
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

    <?php include_once 'footer.php';?>

    <script>
   $('#selectallr').click(function(event) {   
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
$('#singlere').click(function(event){
        //  event.preventDefault();
        var single_id=$(this).data('signle');
        var url=$(this).attr('href');
        
        $.ajax
        (
            {
                type:'POST',    
                url:url,
                data:{"data":single_id},
            }
        ).done(function(res){
         // alert(res);
        if(res=="done"){
            location.reload();
        }
        });
    });
    $('.download').click(function(event){
         // event.preventDefault();
         debugger
         var download_id=$(this).data('receivedid');
        $.ajax
        (
            {
                type:'POST',    
                url:'Controller/DownloadStatusChange.php',
                data:{"data":download_id},
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

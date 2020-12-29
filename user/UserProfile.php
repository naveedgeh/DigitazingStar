
<?php
session_start();
define('TITLE', 'User Prfile');

include_once 'Model/Order.php';
// include('footer.php');
// include('../dbConnection.php');


include('header.php');
//  $obj=new DBConnection1();
//             $obj_db=$obj->connect();

if (isset($_SESSION['is_login'])) {
  // code...
  $uemail = $_SESSION['uemail'];
 // $image_src = $_SESSION['image_src'];
 $user_id=$_SESSION['user_id'];
}else {
  echo "<script> location.href='index.php'</script>";
}
// // $uemail = $_SESSION['uemail'];
// $sql = "SELECT user_email, user_name,image_path FROM user_register
//  Where user_email = '$uemail'";
//  $result = $obj_db->query($sql);
//  if ($result->num_rows == 1) {
//   // code...
//   $row = $result->fetch_assoc();
//   $rName = $row['user_name'];
//   $image = $row['image_path'];
//      $image_src = "img/".$image;
//  }
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
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="../index.php">Digitizing <strong>Star</strong></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
               
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->

    <?php include('Sidebar.php') ?>



    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
           <?php include_once 'Widgets.php';?>

        </div>
      
        
 </div>
 <form action="Controller/Multiple_order_delete.php" method="post">
        <input type="submit" value="All Order Delete" class="btn btn-primary" style="margin-bottom:30px; margin-left:18px;"/>
        <div class="table-responsive">
        <table id="myTable" class="table table-bordered" width="100%">
        
        <thead class="bg-primary">
        <tr>
        
        <th><input type="checkbox" id="select-all" style="opacity: unset;position: unset;"></th>
        <th>Design Name</th>
        <th>Order Type</th>
        <th>Required Format</th>
        <th>Order Date</th>
        <th>Status</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
        
        <?php
        
       $order_obj=new Order();
                $allorder=$order_obj->GetAllOrder($user_id);
            foreach ($allorder as $value) {
        ?>
        <tr>
        <td>
        <input type="checkbox" name="delete[]" value="<?php echo $value->order_id;?>" class="checkbox" style="opacity: unset;position: unset; margin-left:9px;"/>
        </td>
        <td><?php  echo $value->design_name;?></td>
        <td><?php echo $value->order_type;?></td>
        <td><?php echo $value->required_formate;?></td>
        <td><?php echo $value->order_date;?></td>
        <td>
        <?php if($value->reject=='1'){

                    echo "Reject";

                  }
                  elseif($value->status==''){
                      echo "Pending";
                  }
                  else{
                      echo $value->status;
                  }
        ?></td>
        
    <td>
    <a href="View/ViewDetail.php" data-viewid="<?php echo $value->order_id;?>" id="viewOrder" Data-coption="Order Details" class="btn btn-primary">View</a>
     <!--<a href="View/ViewUpdate.php" id="updateOrder" data-viewid="<?php  //echo $value->order_id;?>" Data-coption="Update Order" class="btn btn-primary">Update</a> -->
    <a href="Controller/Single_Record_Delete.php" data-signle="<?php echo $value->order_id;?>" id="single" class="btn btn-primary">Delete</a>
    </td>
        </tr>
        <?php  }?>
        
        
        </tbody>
       
        </table>
        </div>
        </form>
        
    </section>


    <div class="modal fade" id="exampleModal" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background-color:#f5f5f5;">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<?php include_once 'footer.php';?>
   
   <script>
   $('#select-all').click(function(event) {   
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
    $('#single').click(function(event){
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
          
        if(res=="done"){
            location.reload();
        }
        });
    });
    $('#viewOrder,#updateOrder').click(function(event){
          event.preventDefault();
        var ti=$(this).data('coption');
        var id=$(this).data('viewid');
        var url=$(this).attr('href');
       

        $.ajax
        (
            {
                type:'POST',    
                url:url,
                data:{"data":id},
            }
        ).done(function(res){
        //   alert(res);
        // if(res=="done"){
        //     location.reload();
        // }
            $(".modal").modal();
            $(".modal-title").html(ti);
            $(".modal-body").html(res);
        });
    });
   </script>

</body>

</html>

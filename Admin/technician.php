<?php
include_once 'header.php';
include('sidebar.php');
include_once ('Model/Technician.php');
 ?>

</head>

<body class="theme-red">
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
                            <h2>List Of Technician</h2>
                            <button type="button" id="technician" data-toggle="modal" data-target="#myModal" style="float:right; margin-top:-20px;" class="btn btn-primary">Add New Techinician</button>
                        </div>
                        <form action="Controller/Multiple_order_delete.php" method="post">
        <!-- <input type="submit" value="All Order Delete" class="btn btn-primary" style="margin-bottom:30px; margin-left:18px;"/> -->
        <div class="table-responsive">
        <table id="myTable12" class="table table-bordered" width="100%">
        
        <thead class="bg-primary">
        <tr>
        
        <th><input type="checkbox" id="select-all" style="opacity: unset;position: unset;"></th>
        <th>Technician Image</th>
        <th>NAME</th>
        <th>Phone</th>
        <th>EMAIL</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
        
        <?php
        
        $tech_obj=new Technician();
        $alltech=$tech_obj->GetTechnician();
        foreach ($alltech as  $value) {
        
        ?>
        <tr>
        <td>
        <input type="checkbox" name="delete[]" value="<?php echo $value->tech_id;?>" class="checkbox" style="opacity: unset;position: unset; margin-left:9px;"/>
        </td>
        <td><img src="Technician/<?php echo $value->technician_username;?>/<?php echo $value->technician_image; ?>" style="width:50px; height:50px;"/></td>
        <td><?php echo $value->technician_name;?></td>
        <td><?php echo $value->phone_number;?></td>
       <td><?php echo $value->email_address;?></td>
        
       <td>
         <?php
           if($value->status=="Disable"){
           ?>
            <a href="Controller/EnableController.php?enb=<?php echo $value->tech_id;?>" class="btn btn-primary">Enable</a>
            <?php }else{ ?>
            
                
                <a href="Controller/DisableController.php?dis=<?php echo $value->tech_id;?>" class="btn btn-primary">Disable</a>
            <?php }?>
            
            
            
            <a href="Controller/TechDeleteController.php?del=<?php echo $value->tech_id;?>"   class="btn btn-primary" >Delete</a>
            </td>
    
        </tr>
    <?php } ?>
    </td>
        </tr>
       
        
        
        </tbody>
       
        </table>
        </div>
        </form>
                    </div>
                </div>
            </div>

    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog ">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title title">Add New Technician</h4>
        </div>
        <div class="modal-body modal_data">
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </div>
    </div>
    <div class="modal fade" id="myModal202" role="dialog">
    <div class="modal-dialog ">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title title">Delete Technician</h4>
        </div>
        <div class="modal-body">
         <h1>Do You Want to Delete</h1>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" id="yes" data-val="Yes">Yes</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
      </div>
      </div>
    </div>
  </div>
  





    <?php include_once 'footer.php'; ?>
    
</body>

</html>

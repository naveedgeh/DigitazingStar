<?php
include('header.php');
include('sidebar.php');
include_once('../dbConnection.php');
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
                        <div class="body table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Technician Image</th>
                                        <th>NAME</th>
                                        <th>Phone</th>
                                        <th>EMAIL</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $obj=new DBConnection();
                                $obj_db=$obj->connect();
                                
                                $technician="SELECT * FROM `technician_tb` order by `id` desc";
                                $result=$obj_db->query($technician);
                             
                               while($data=$result->fetch_array()){

                                
                                ?>
                                    <tr>
                                        <td><img src="tech_img/<?php  echo $data['image'];?>" style="width:50px;height:50px;" class="img img-responsove"/></td>
                                        <td><?php echo $data['name']?></td>
                                        <td><?php echo $data['phone']?></td>
                                        <td><?php echo $data['email']?></td>
                                        <td>
                                        <a href="#" class="btn btn-primary">Disable</a>
                                        <a href="#" class="btn btn-primary">Enable</a>
                                        <a href="#" class="btn btn-primary">Delete</a>
                                        </td>

                                    </tr>
                                <?php } ?>
                                   
                                </tbody>
                            </table>
                        </div>
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
  </div>





    <?php include('footer.php') ?>

</body>

</html>

<?php
session_start();
include_once('Model/dbConnection.php');
include('header.php');
include('sidebar.php');
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
                   
                <?php
    if(isset($_SESSION['d_msg'])){
      $msg=$_SESSION['d_msg'];
      unset($_SESSION['d_msg']);
    

    
  ?>
  <div class="alert alert-warning alert-dismissible " role="alert">
  <strong>About Order!</strong> <?php   echo $msg;?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    <?php }?>
                    <div class="card">
                        <div class="header">
                            <h2>Received Order</h2>
                        </div>
                        <div class="body table-responsive">
                            <table id="myTable12" class="table table-striped">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>User ID</th>
                                        
                                        <th>Comment</th>
                                        <th>Work</th>
                                        <th>Status<th>
                                        <th>Deliver</th>
                                        

                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $obj=new DBConnection2();
                                $obj_db=$obj->Connect();
                                $received_order="SELECT * FROM `tech_deliver_order`  ORDER BY `tech_order_id` desc";
                                $result=$obj_db->query($received_order);
                                while($data=$result->fetch_array()){

                                
                              
                              ?>
                                    <tr>
                                        <th><?php echo $data['user_name_id']?></th>
                                        <td><?php echo $data['comment']?></td>
                                        
                                        <td>
                                        <a href="../Techlog/workfile/<?php echo $data['workfile']?>" download>Download</a>
                                        </td>
                                        <td><?php echo $data['status']?><td>
                                        
                                        <td>
                                        <form action="Controller/DeliverOrderController.php" method="post" enctype="multipart/form-data">
                                        <input type="file" class="wfile" name="workfile"/>
                                        
                                       
                                        
                                        <input type="hidden" name="userd" value="<?php echo $data['user_id']?>"/>
                                        <input type="hidden" name="techorder" value="<?php echo $data['tech_order_id']?>"/>
                                       
                                        <input type ="submit" data-userd="<?php echo $data['user_id']?>" data-techorder="<?php echo $data['tech_order_id'];?>"  class="btn btn-primary deliver" style="margin-bottom:5px;" Value="Deliver">
                                        </form>
                                        <a href="Controller/EnableOrderController.php" data-userd="<?php echo $data['user_id']?>" data-techorder="<?php echo $data['tech_order_id'];?>"  class="btn btn-primary enable"> Enable</a>
                                        
                                        </form>
                                        </td>

                                    </tr>
                                <?php }?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

    <?php include('footer.php') ?>


    <script>
    // $('.deliver').click(function(event){
    //     event.preventDefault();
    //     var userd=$(this).data('userd');
    //     var techorder=$(this).data('techorder');
    //     var url=$(this).attr('href');
    //     //alert(url);

    //     $.ajax
    //     ({
    //         type:'post',
    //         data:{'userd':userd,'techorder':techorder},
    //         url:url,
    //     }).done(function(res){
    //             if(res=='done'){
    //                     location.reload();
    //             }
    //     });

    // });
    $('.enable').click(function(event){
        event.preventDefault();
        var userd=$(this).data('userd');
        var techorder=$(this).data('techorder');
        var url=$(this).attr('href');
        //alert(url);

        $.ajax
        ({
            type:'post',
            data:{'userd':userd,'techorder':techorder},
            url:url,
        }).done(function(res){
                if(res=='done'){
                        location.reload();
                }
        });

    });
    </script>

</body>

</html>

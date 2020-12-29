<?php
include('header.php');
include('sidebar.php');
include_once('Model/dbConnection.php');
 ?>

</head>

<body class="theme-red">
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

              <!-- Widgets -->
               <?php  include_once 'Widgets.php';?>

            <div class="row clearfix">
            <?php
            $obj=new DBConnection2();
            $obj_db=$obj->Connect();

            $result_per_page=9;
            $sql="SELECT * FROM `order_tb`";
            $result1=$obj_db->query($sql);
           $number_of_results=mysqli_num_rows($result1);


           $number_of_pages=ceil($number_of_results/$result_per_page);
            
        if(!isset($_GET['page'])){
                $page=1;
        }else{

            $page=$_GET['page'];
        }

            $this_page_first_result=($page-1)*$result_per_page;


            $select_order="SELECT * FROM `order_tb` join `user_register` on(order_tb.user_id=user_register.user_id) where `reject`='0' and `technician_id`='0' ORDER BY `order_id` desc Limit $this_page_first_result,$result_per_page";
        
            $result=$obj_db->query($select_order);
            while($data=$result->fetch_array()){
            ?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                    <div class="card" style="background-color:#e4e4e4;">
                        <div class="header">
                          <?php
                          $date1=date($data['order_date']);
                          $date=date('Y-m-d');
                          $start = strtotime($date1);
                          $end = strtotime($date);
                          
                          $days_between = ceil(abs($end - $start) / 86400);
                          
                          ?>
                          <span class="badge badge-secondary"style="margin-left: 121px;
                           margin-top: -5px;"><?php echo $days_between;?>-day ago</span>
                          <?php ?>
                          <?php
                           if($data['image_path']!=''){
                           ?>
                           <span ><img src="../user/img/<?php echo $data['image_path']?>" class="img img-responsive img-circle" style="margin-top: -39px;width:50px;height:50px;"/></span>
                          <?php } else{?>
                            <span ><img src="../user/images/user.png" class="img img-responsive img-circle" style="margin-top: -39px;"/></span>
                          <?php }?>
                            <h2 style="margin-left:-5px;margin-top:10px;"><?php echo $data['user_name']?></h2>
                           <?php
                           if($days_between<=4){

                           
                           ?>
                            <img src="img/tag.jpg" style="width: 33px;height: 33px;float: right;margin-top:-87px;margin-right: -30px;" class="img img-responsive img-circle"/>
                          <?php }?>
                          </div>
                        <div class="table-responsive">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            User Email
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php  echo $data['user_email']?>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            Phone Number
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php  echo $data['user_phone']?>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            User ID
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $data['usernameid']?>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              Order Type
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $data['order_type']?>
                            </div>

                            <a href ="<?php echo $data['order_id']?>" data-toggle="modal" data-target="#myModal" class="popup"><button type="button" style="margin-top:10px;width:100%;" class="btn btn-lg btn-primary">View Detail</button></a>

                        </div>
                    </div>
                </div>
<?php }



?>
                
                </div>
            </div>
            <?php  
            for ($page=1; $page <=$number_of_pages ; $page++) { 
                echo "<ul class='pagination pagination-lg'>
                        <li><a href='request.php?page=$page'>$page</a></li>
                
                     </ul"; 
               // echo '<a href="request.php?page='.$page.'">'.$page.'</a>';
            }
            
            ?>
            <!--Modal-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
         
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

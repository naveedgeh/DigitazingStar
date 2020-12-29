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
               <?php // include_once 'Widgets.php';?>

            <div class="row clearfix">
            <?php
            $obj=new DBConnection();
            $obj_db=$obj->connect();
            if(isset($_SESSION['idd'])){
              $idd=$_SESSION['idd'];
              
            }
            
            
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


            $select_order="SELECT * FROM `order_tb` where `technician_id`='$idd' and `statuss`!='Deliver' ORDER BY `order_id` desc Limit $this_page_first_result,$result_per_page";
        
            $result=$obj_db->query($select_order);
            while($data=$result->fetch_array()){
            ?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                    <div class="card">
                        <div class="header">
                            <h2>Request</h2>
                        </div>
                        <div class="table-responsive">
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            Design Name
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $data['design_name']?>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            Order Type
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $data['order_type']?>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                           Req Format
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo $data['required_format']?>
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

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
               <?php include_once 'Widgets.php';?>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Order Status</h2>
                        </div>
                        <div class="body table-responsive">
                            <table id="myTable" class="table table-striped">
                                <thead class="bg-primary">
                                    <tr>
                                        
                                        <th>Design Name </th>
                                        <th>Order Type </th>
                                        <th>Require Formart</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $obj=new DBConnection3();
                                $obj_db=$obj->Connect();
                                $progress="SELECT * FROM `order_tb` JOIN `technician_tb` ON(order_tb.technician_id=technician_tb.id) ORDER BY `order_id` desc";
                                $result=$obj_db->query($progress);
                                while($data=$result->fetch_array()){

                                
                              
                              ?>
                                    <tr>
                                        <!-- <th><?php// echo $data['name']?></th> -->
                                        <td><?php echo $data['design_name']?></td>
                                        <td><?php echo $data['order_type']?></td>
                                        <td><?php echo $data['required_format']?></td>
                                        <td>
                                   
                                        <select name="statuss" class="statuss" data-iddd="<?php echo $data['order_id']?>">
                                        <option><?php  echo $data['statuss']?></option>
                                        <option value="Completed">Completed</option>
                                        <option value="Deliver">Deliver</option>
                                        </select>
                                        
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

</body>

</html>

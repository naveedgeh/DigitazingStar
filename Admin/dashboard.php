<?php
include('header.php');
include('sidebar.php');
include_once 'Model/dbConnection.php';


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
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>User List</h2>
                        </div>
                        <div class="body table-responsive">
                            <table id="myTable12" class="table table-striped">
                                <thead class="bg-primary">
                                    <tr>
                                        
                                        <th>NAME</th>
                                        <th>EMAIL</th>
                                        <th>Phone</th>

                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
                                   
                                   $obj=new DBConnection2();
                                   $obj_db=$obj->connect();


                                   $user="SELECT * FROM `user_register` ORDER BY `user_id` DESC";

                                   $result=$obj_db->query($user);

                                   while($data=$result->fetch_array())
                                   {

                                   
                                   ?>
                                    <tr>
                                        <td><?php echo $data['user_name'];?></td>
                                        <td><?php echo $data['user_email'];?></td>
                                        <td><?php echo $data['user_phone'];?></td>

                                    </tr>
                                   
                                   <?php  } ?>
                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

    <?php include('footer.php') ?>

</body>

</html>

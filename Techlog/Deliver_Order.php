<?php
include_once 'Model/dbConnection.php';
include('header.php');
include('sidebar.php');
 ?>

</head>

<?php
$user_id=$_POST['user_id'];
$user_name=$_POST['user_name'];
?>

<body class="theme-red">
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

              <!-- Widgets -->
               <?php include_once 'Widgets.php';?>

            <div class="row clearfix">

                <div class="col-md-12">
                <div class="panel">
                <div class="panel-heading bg-primary">
                Deliver Order
                </div>
                <div class="panel-body">
                <form action="Model/tech_deliver_order.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="user_idddd" value="<?php echo $user_id;?>"/>
                <input type="hidden" name="user_namename" value="<?php echo $user_name;?>"/>
                <div class="col-md-6">
                <div class="panel">
                <div class="panel-heading bg-primary">
                Comment 
                </div>
                <div class="panel-body">
                <textarea type="text" name="commnetss" class="form-control"></textarea>
                </div>
                </div>
                </div>
                <!--file-->
                <div class="col-md-6">
                <div class="panel">
                <div class="panel-heading bg-primary">
                Work File 
                </div>
                <div class="panel-body">
               <input type="file" name="work_file" class="form-control"/>
                </div>
                </div>
                </div>
                <div class="col-md-12">
                <input type="submit" name="submit" style="float:right;" name="submit" class="btn btn-primary"/>
                </div>
                </form>
                
                </div>
                
                </div>
            </div>
           
            <!--Modal-->

      
    </div>
  </div>
  </div>

    <?php include('footer.php') ?>

</body>

</html>

<?php
if (isset($_SESSION['is_login'])) {
    // code...
    $uemail = $_SESSION['uemail'];
    $user_id=$_SESSION['user_id'];
  }else {
    echo "<script> location.href='index.php'</script>";
  }
$user_id=$_SESSION['user_id'];

$allorder="SELECT * from `order_tb` where `user_id`='$user_id'";

$result=$obj_db->query($allorder);
    $totalorder=mysqli_num_rows($result);

    
    $pending_order="SELECT * from `order_tb` where `user_id`='$user_id' and `statuss`='Pending'";

    $result=$obj_db->query($pending_order);
        $totalpending=mysqli_num_rows($result);

        $complete_order="SELECT * from `order_tb` where `user_id`='$user_id' and `statuss`='Delivered'";

    $result=$obj_db->query($complete_order);
        $totalcomplete=mysqli_num_rows($result);
        $reject_order="SELECT * from `order_tb` where `user_id`='$user_id' and `reject`='1'";

    $result=$obj_db->query($reject_order);
        $totalreject=mysqli_num_rows($result);
    
?>

<div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">All Orders</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $totalorder;?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">Pending Orders</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo  $totalpending?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">Completed Orders</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo  $totalcomplete;?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">Canceled Orders</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $totalreject;?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
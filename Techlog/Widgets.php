<?php
$obj=new DBConnection3();
$obj_db=$obj->Connect();

if(isset($_SESSION['idd'])){
    $tech_id=$_SESSION['idd'];
}



$rework="SELECT * FROM `order_tb` where `technician_id`='$tech_id'";

$result=$obj_db->query($rework);

$totalrework=mysqli_num_rows($result);





$completework="SELECT * FROM `order_tb` where `technician_id`='$tech_id' And `statuss`='Deliver'";

$result=$obj_db->query($completework);

$totalcompletework=mysqli_num_rows($result);

?>

<div class="row clearfix">
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Recieved Work</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $totalrework;?>" data-speed="15" data-fresh-interval="20"><?php echo $totalrework;?></div>
                        </div>
                    </div>
                </div>
                
                
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">Complete Work</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $totalcompletework;?>" data-speed="1000" data-fresh-interval="20"><?php echo $totalcompletework;?></div>
                        </div>
                    </div>
                </div>
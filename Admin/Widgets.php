<?php
include_once 'Model/ExtraWork.php';
$extra=new ExtraWork();
?>

<div class="row clearfix">
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Orders</div>
                            <div class="number count-to" data-from="0" data-to="<?php $extra->TotalOrder();?>" data-speed="15" data-fresh-interval="20"><?php $extra->TotalOrder();?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">Assigned Work</div>
                            <div class="number count-to" data-from="0" data-to="<?php  $extra->TotalAssignWork();?>" data-speed="1000" data-fresh-interval="20"><?php  $extra->TotalAssignWork();?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">No.of Technician</div>
                            <div class="number count-to" data-from="0" data-to="<?php  $extra->TotalTechnician();?>" data-speed="1000" data-fresh-interval="20"><?php  $extra->TotalTechnician();?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW VISITORS</div>
                            <div class="number count-to" data-from="0" data-to="<?php $extra->TotalUser();?>" data-speed="1000" data-fresh-interval="20"><?php $extra->TotalUser();?></div>
                        </div>
                    </div>
                </div>
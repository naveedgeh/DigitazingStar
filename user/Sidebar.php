<?php

include_once('Model/dbConnection.php');
if (isset($_SESSION['is_login'])) {
    // code...
    $uemail = $_SESSION['uemail'];
    $user_id=$_SESSION['user_id'];
  }else {
    echo "<script> location.href='index.php'</script>";
  }

$obj=new DBConnection();
$obj_db=$obj->Connect();

if(isset($_SESSION['uemail'])){
    $uemail=$_SESSION['uemail'];
}
$sql = "SELECT user_email, user_name,image_path FROM user_register
 Where user_email = '$uemail'";
 $result = $obj_db->query($sql);
 if ($result->num_rows == 1) {
   // code...
   $row = $result->fetch_assoc();
   $rName = $row['user_name'];
   $image = $row['image_path'];
     $image_src = "img/".$image;
 }
$altimage = "images/user.png";

 ?>


<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="<?php
                $supported_image = array(
                    'gif',
                    'jpg',
                    'jpeg',
                    'png'
                );


                $ext = strtolower(pathinfo($image_src, PATHINFO_EXTENSION));

                 if (in_array($ext, $supported_image)) {
                  echo $image_src;
                } else {
                    echo $altimage;
                    }  ?>
                    " width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php if (isset($rName)) {

                   echo $rName;
                }else {
                  echo "sorry";
                } ?></div>
                <div class="email"><?php echo $uemail ?></div>
               
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active ">
                    <a href="UserProfile.php">
                        <i class="material-icons">home</i>
                        <span>Dashboard</span>
                    </a>
                </li>




                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">swap_calls</i>
                        <span>Orders</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="SubmitOrder.php">Submit Order</a>
                        </li>
                        <!-- <li>
                            <a href="OrderStatus.php">Order Status</a>
                        </li> -->
                        <!-- <li>
                            <a href="AllOrders.php">All Orders</a>
                        </li> -->
                        <li>
                            <a href="received_order_user.php">Received Order</a>
                        </li>


                    </ul>
                </li>
                      
                
                <li>
                    <a href="invoice.php">
                        <i class="material-icons">logout</i>
                        <span>Invoice</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">settings</i>
                        <span>Settings</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="profilesetting.php">Profile Settings</a>
                        </li>
                        <!--<li>-->
                        <!--    <a href="passwords.php">Change Password</a>-->
                        <!--</li>-->
                        <!-- <li>
                            <a href="#">All Orders</a>
                        </li> -->


                    </ul>
                
                </li>
                <li>
                    <a href="logout.php">
                        <i class="material-icons">logout</i>
                        <span>Sign-out</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <?php include('Copyright.php') ?>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
            <!-- <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li> -->
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <li data-theme="red" class="active">
                        <div class="red"></div>
                        <span>Red</span>
                    </li>
                    <li data-theme="pink">
                        <div class="pink"></div>
                        <span>Pink</span>
                    </li>
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span>
                    </li>
                    <li data-theme="deep-purple">
                        <div class="deep-purple"></div>
                        <span>Deep Purple</span>
                    </li>
                    <li data-theme="indigo">
                        <div class="indigo"></div>
                        <span>Indigo</span>
                    </li>
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span>
                    </li>
                    <li data-theme="light-blue">
                        <div class="light-blue"></div>
                        <span>Light Blue</span>
                    </li>
                    <li data-theme="cyan">
                        <div class="cyan"></div>
                        <span>Cyan</span>
                    </li>
                    <li data-theme="teal">
                        <div class="teal"></div>
                        <span>Teal</span>
                    </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span>
                    </li>
                    <li data-theme="light-green">
                        <div class="light-green"></div>
                        <span>Light Green</span>
                    </li>
                    <li data-theme="lime">
                        <div class="lime"></div>
                        <span>Lime</span>
                    </li>
                    <li data-theme="yellow">
                        <div class="yellow"></div>
                        <span>Yellow</span>
                    </li>
                    <li data-theme="amber">
                        <div class="amber"></div>
                        <span>Amber</span>
                    </li>
                    <li data-theme="orange">
                        <div class="orange"></div>
                        <span>Orange</span>
                    </li>
                    <li data-theme="deep-orange">
                        <div class="deep-orange"></div>
                        <span>Deep Orange</span>
                    </li>
                    <li data-theme="brown">
                        <div class="brown"></div>
                        <span>Brown</span>
                    </li>
                    <li data-theme="grey">
                        <div class="grey"></div>
                        <span>Grey</span>
                    </li>
                    <li data-theme="blue-grey">
                        <div class="blue-grey"></div>
                        <span>Blue Grey</span>
                    </li>
                    <li data-theme="black">
                        <div class="black"></div>
                        <span>Black</span>
                    </li>
                </ul>
            </div>
            <!-- <div role="tabpanel" class="tab-pane fade" id="settings">
                <div class="demo-settings">
                    <p>GENERAL SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Report Panel Usage</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Email Redirect</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>SYSTEM SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Notifications</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Auto Updates</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>ACCOUNT SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Offline</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Location Permission</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div> -->
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>

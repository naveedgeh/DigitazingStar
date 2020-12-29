<?php
session_start();

                
if(isset($_SESSION['image'])){
     $image=$_SESSION['image'];
}
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
}


?>

<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="../Admin/Technician/<?php echo $username?>/<?php echo $image;?>" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                
                if(isset($_SESSION['name'])){
                    echo $email=$_SESSION['name'];
                }
                ?>
                </div>
                <div class="email">
                <?php
                
                if(isset($_SESSION['aEmail'])){
                    echo $email=$_SESSION['aEmail'];
                }
                ?>
                </div>

            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active">
                    <a href="dashboard.php">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="">
                    <a href="work.php">
                        <i class="material-icons">work</i>
                        <span>Work Order</span>
                    </a>
                </li>

                <!-- <li class="">
                    <a href="request.php">
                        <i class="material-icons">layers</i>
                        <span>Requests</span>
                    </a>
                </li> -->
                <!-- <li class="">
                    <a href="Deliver_Order.php">
                        <i class="material-icons">layers</i>
                        <span>Deliver Order</span>
                    </a>
                </li> -->
               


                
               
                <!-- <li>
                    <a href="Changepass.php">
                        <i class="material-icons">swap_calls</i>
                        <span>Chang Password</span>
                    </a>
                </li> -->
                <li>
                    <a href="logout.php">
                        <i class="material-icons">logout</i>
                        <span>Logout</span>
                    </a>
                </li>


            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
             &copy; 2020 <a href="javascript:void(0);">Design & Developed by webtecki's team</a>.
            </div>

        </div>
        <!-- #Footer -->

</section>

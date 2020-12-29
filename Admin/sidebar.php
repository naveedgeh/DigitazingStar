
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="../user/images/user.png" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                 if(isset($_SESSION['adminname'])){
                      $adminemail=$_SESSION['adminname'];
                     echo $adminemail;
                 }
                 ?>
                </div>
                <div class="email"><?php
                 if(isset($_SESSION['adminemail'])){
                      $adminemail=$_SESSION['adminemail'];
                     echo $adminemail;
                 }
                
                ?></div>

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

                <li class="">
                    <a href="request.php">
                        <i class="material-icons">layers</i>
                        <span>Requests</span>
                    </a>
                </li>
                <li class="">
                    <a href="received_order_admin.php">
                        <i class="material-icons">widgets</i>
                        <span>Received Order </span>
                    </a>
                </li>


                <li>
                    <a href="technician.php">
                        <i class="material-icons">text_fields</i>
                        <span>Technician</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="requester.php">
                        <i class="material-icons">layers</i>
                        <span>Requester</span>
                    </a>
                </li> -->
                <li>
                    <a href="invoice.php">
                        <i class="material-icons">work</i>
                        <span>Invoice</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="workreport.php">
                        <i class="material-icons">layers</i>
                        <span>Work Report</span>
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

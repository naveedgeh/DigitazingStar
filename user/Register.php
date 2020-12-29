
<?php
define('TITLE', 'Register');
include('header.php');
include('footer.php');
include('Model/dbConnection.php');
$obj=new DBConnection();
                                   $obj_db=$obj->Connect();
if (isset($_REQUEST['registernow'])) {
  // code...
  if (($_REQUEST['uname'] == "") || ($_REQUEST['uemail'] == "")
  || ($_REQUEST['uphone'] == "") || ($_REQUEST['upassword'] == "")) {
    // code...
    $pmsg ="All fields are required";
  }else {
    // code...
    $sql = "SELECT user_email FROM user_register
    WHERE user_email = '".$_REQUEST['uemail']."'";
    $result = $obj_db->query($sql);
    if ($result->num_rows == 1) {
      // code...
      $pmsg = "Try With Another Email it's already Registerd";
    }else {
      // code...
      $uname = $_REQUEST['uname'];
      $uemail = $_REQUEST['uemail'];
      $uphone = $_REQUEST['uphone'];
      $upassword = $_REQUEST['upassword'];
        $rand_number=rand(10,1000);
        $usernewname=$uname.$rand_number;
      $sql="INSERT INTO user_register( `user_name`, `user_email`, `user_phone`, `user_password`,`username`)
       VALUES ('$uname','$uemail','$uphone','$upassword','$usernewname')";
       if($obj_db->query($sql) == TRUE){
         $pmsg = "Account Successfully Created";
         echo "
         <script>
         alert('Your Account is Created Plese Login Now.')
         location.href='index.php'
          </script>";
       }else {
         $pmsg ="Sorry unable to create you Account";
       }
    }

  }

}



 ?>
</head>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="https://www.trandinggo.com/">Digitizing<b class="" style="color:#0C2E8A;">Star</b></a>

        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST">
                    <div class="msg">Create your Account</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="uname" placeholder="Name Surname" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="uemail" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">phone</i>
                        </span>
                        <div class="form-line">
                            <input type="tel" class="form-control" name="uphone" placeholder="Phone" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="upassword" minlength="6" placeholder="Password" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>

                    <button name="registernow" class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <?php if(isset($pmsg)){echo"$pmsg";} ?>
                    </div>
                    <div class="m-t-25 m-b--5 align-center">
                        <a href="/user">Already have Account!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>

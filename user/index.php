<?php
session_start();
include_once 'Model/dbConnection.php';
define('TITLE', 'Login');
include('header.php');
include('footer.php');



$obj=new DBConnection();
            $obj_db=$obj->Connect();


if (!isset($_SESSION['is_login'])) {
  // code...
  if (isset($_REQUEST['submitlogin'])) {
    // code...
    $uemail = trim($_REQUEST['uemail']);
    $upassword = trim($_REQUEST['upassword']);
  // echo $uemail;
  // echo $upassword;
    $sql = "SELECT `user_id`,`username`, `user_email`,`user_password` FROM `user_register`
    WHERE `user_email` = '".$uemail."' AND `user_password` = '".$upassword."' limit 1";
    $result = $obj_db   ->query($sql);

    if($result->num_rows == 1 ){
        $data=$result->fetch_array();
      $_SESSION['is_login'] = true;
      $_SESSION['uemail'] = $uemail;
      $_SESSION['password']=$upassword;
      $_SESSION['user_id']=$data['user_id'];
      $_SESSION['user_name']=$data['username'];

      echo "<script> location.href='UserProfile.php'</script>";
      exit;
    }else {
      $pmsg = "Invalid Email & Password";
    }
  }
}else {
    echo "<script> location.href='UserProfile.php'</script>";
}


 ?>
</head>

<body class="login-page">
    <div class="login-box">
      <div class="logo">
        <a href="https://www.trandinggo.com/"> <img src="https://trandinggo.com/assets/img/logo.png" alt=""> </a>
          <!-- <a href="../index.php">Digitizing<b class="" style="color:#0C2E8A;">Star</b></a> -->

      </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="uemail" placeholder="Your Email" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="upassword" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button name="submitlogin" class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-12">
                            <?php if (isset($pmsg)) {  echo $pmsg;  } ?>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="Register.php">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forget.php">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>

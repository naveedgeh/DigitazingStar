<?php
session_start();
include('Model/dbConnection.php');

$obj=new DBConnection3();
            $obj_db=$obj->Connect();

if (!isset($_SESSION['is_adminlogin'])) {

    if (isset($_REQUEST['aEmail'])) {
      // code...
      $aEmail = $_REQUEST['aEmail'];
      $aPassword = $_REQUEST['aPassword'];
      $sql = "SELECT * FROM `technician_tb`
       WHERE `tech_username`='".$aEmail."' AND `tech_password`='".$aPassword."' limit 1";
       $result = $obj_db->query($sql);
       $data=$result->fetch_array();
       if ($result->num_rows== 1) {
         // code...
         $_SESSION['is_adminlogin'] = true;
         $_SESSION['aEmail'] = $data['email'];
         $_SESSION['username']=$data['tech_username'];
         $_SESSION['password']=$aPassword;
         $_SESSION['name']=$data['name'];
         $_SESSION['image']=$data['image'];
         $_SESSION['idd']=$data['id'];
         echo "<script> location.href='dashboard.php'</script>";
         exit;
       }else {
         $error = "envalid is or pass";
       }
    }

}else {
  echo "<script> location.href='dashboard.php'</script>";
}


 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../user/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../user/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../user/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../user/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Technician<b>Login</b></a>

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
                            <input type="text" class="form-control" name="aEmail" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="aPassword" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>

                        </div>

                        <?php if (isset($error)) {  echo $error;} ?>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="../Admin-Area/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../user/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../user/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="../user/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="../user/js/admin.js"></script>
    <script src="../user/js/pages/examples/sign-in.js"></script>
</body>

</html>

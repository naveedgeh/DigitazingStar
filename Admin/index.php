<?php
session_start();
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
            <a href="javascript:void(0);">Admin<b>Login</b></a>

        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" action="Controller/AdminLoginController.php" method="POST">
                    <div class="msg">

                    <?php
                    if(isset($_SESSION['msg'])){
                            $msg=$_SESSION['msg'];
                            echo $msg;
                    }
                    if(isset($_SESSION['errors'])){
                        $errors=$_SESSION['errors'];
                    }
                    
                    ?>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" placeholder="Username" required autofocus>
                            
                        </div>
                        <lable style="color:red">
                        <?php
                        if(isset($errors['email'])){
                            echo $error=$errors['email'];
                        }
                        ?>
                       </label>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <lable style="color:red">
                        <?php
                        if(isset($errors['password'])){
                            echo $error=$errors['password'];
                        }
                        ?>
                       </label>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <?php
                            if(filter_input(INPUT_COOKIE,'objadmin')!="")
                            {
                               echo '<input type="checkbox" checked="checked" name="rememberlogin" id="rememberme" class="filled-in chk-col-pink">';
                            }
                            else
                            {
                               echo '<input type="checkbox" name="rememberlogin" id="rememberme" class="filled-in chk-col-pink">';
                            }
                            ?>
                            
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>

                        </div>

                       
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

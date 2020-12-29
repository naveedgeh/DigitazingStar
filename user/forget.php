<?php
define('TITLE', 'Register');
include('header.php');
include('footer.php');
include('../dbConnection.php');

if (isset($_REQUEST['forgotpassowrd'])) {
  // code...
  if (($_REQUEST['uemail'] == "")) {
    // code...
    $error ="Email is Empty";
  }else {
    $uemail = $_REQUEST['uemail'];
    $sql = "SELECT user_email FROM user_register WHERE user_email = '$uemail'";
    if ($conn->query($sql) == true) {
      // code...
      echo "<script> location.href='resetpass.php'</script>";
    }else {
      echo "Email is not registerd";
    }
  }
}


 ?>
</head>

<body class="fp-page">
    <div class="fp-box">
      <div class="logo">
          <a href="https://www.trandinggo.com/">Digitizing<b class="" style="color:#50D8AF;">Star</b></a>

      </div>
        <div class="card">
            <div class="body">
                <form id="forgot_password" method="POST">
                    <div class="msg">
                        Enter your email address that you used to register. We'll send you an email with your username and a
                        link to reset your password.
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="uemail" placeholder="Email" required autofocus>
                        </div>
                    </div>

                    <button name="forgotpassowrd" class="btn btn-block btn-lg bg-pink waves-effect" type="submit">RESET MY PASSWORD</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="/user">Sign In!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>

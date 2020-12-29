<?php
include_once 'Model/AdminLogin.php';
$admin=new AdminLogin();
session_start();
if(isset($_SESSION['loginstatus'])==TRUE){
    session_destroy();
    $admin->logout();
    header('Location:index.php');
 
 }

 ?>

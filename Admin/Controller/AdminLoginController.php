<?php
session_start();
include_once '../Model/AdminLogin.php';


 $objadmin=new AdminLogin();

 $errors=array();

try {
 $objadmin->username=$_POST['email'];
} catch (Exception $ex) {
    $errors['email']=$ex->getMessage();
}
try {
    $objadmin->password= $_POST['password'];
} catch (Exception $ex) {
    $errors['password']=$ex->getMessage();
}


if(count($errors)==0){


// $rememberlogin=True;
//  $objadmin->Login();
    try {
        // $rememberlogin=FALSE;
        // if($_POST['rememberlogin']){
        //     $rememberlogin=TRUE;
        // }
        $objadmin->Login($rememberlogin);
        header("Location:../dashboard.php");
    } catch (Exception $ex) {
        $_SESSION['msg']= $ex->getMessage();
        header("Location:../index.php");
     }

 }else{

    $msg="__Failed";
    $_SESSION['msg']=$msg;
    $_SESSION['errors']=$errors;
    $_SESSION['obj_admin']=  serialize($objadmin);
    header("Location:../index.php");
}
?>
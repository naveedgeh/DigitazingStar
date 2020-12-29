<?php
session_start();
include_once '../Model/Order.php';
$order_obj=new Order();
$errors=array();

try {
    $order_obj->design_name=$_POST['udesign'];
} catch (Exception $ex) {
    $errors['udesign']=$ex->getMessage();
}
try {
    $order_obj->order_type=$_POST['uorder_type'];
} catch (Exception $ex) {
    $errors['uorder_type']=$ex->getMessage();
}
try {
    // $_POST['urequired_format2'];
   //echo $_POST['urequired_format'];
    if($_POST['urequired_format']==" "){
      echo  $order_obj->required_formate=$_POST['urequired_format2'];
    }else{
       echo $order_obj->required_formate=$_POST['urequired_format'];
    }
    
} catch (Exception $ex) {
   echo $errors['requred_fil']=$ex->getMessage();
}
try {
    if($_POST['uwidth']!=''){
    $order_obj->width=$_POST['uwidth'];
    }else{
        $order_obj->width="N/A";
    }
} catch (Exception $ex) {
    $errors['uwidth']=$ex->getMessage();
}
try {
    if($_POST['uheight']!=''){
    $order_obj->height=$_POST['uheight'];
    }else{
        $order_obj->height="N/A";
    }
} catch (Exception $ex) {
    $errors['uheight']=$ex->getMessage();
}
try {
    if($_POST['umeasure']!=''){
    $order_obj->Measure=$_POST['umeasure'];
    }else{
        $order_obj->Measure="N/A";
    }
} catch (Exception $ex) {
    $errors['umeasure']=$ex->getMessage();
}
try {
    if($_POST['ufabric_type']!=''){
    $order_obj->fabric_type=$_POST['ufabric_type'];
    }else{
        $order_obj->fabric_type="N/A";
    }
} catch (Exception $ex) {
    $errors['ufabric_type']=$ex->getMessage();
}
try {
    if($_POST['uplacement']!=''){
    $order_obj->placement=$_POST['uplacement'];
    }else{
        $order_obj->placement="N/A";
    }
} catch (Exception $ex) {
    $errors['uplacement']=$ex->getMessage();
}
try {
    if($_POST['uno_of_colors']!=''){
    $order_obj->color=$_POST['uno_of_colors'];
    }else{
        $order_obj->placement="N/A";
    }
} catch (Exception $ex) {
    $errors['uno_of_colors']=$ex->getMessage();
}
try {
    $order_obj->blending=$_POST['ublending'];
} catch (Exception $ex) {
    $errors['ublending']=$ex->getMessage();
}
try {
    $order_obj->additional_work=$_POST['uadditional_details'];
} catch (Exception $ex) {
    $errors['uadditional_details']=$ex->getMessage();
}
try {
    $order_obj->urgent_work=$_POST['urgent_work'];
} catch (Exception $ex) {
    $errors['urgent_work']=$ex->getMessage();
}
try {
    $order_obj->user_id=$_POST['user_id'];
} catch (Exception $ex) {
    $errors['user_id']=$ex->getMessage();
}
try {
    $order_obj->user_name=$_POST['user_name'];
} catch (Exception $ex) {
     $errors['user_name']=$ex->getMessage();
}
try {
    $order_obj->work_file=$_FILES['work_file'];
} catch (Exception $ex) {
    $errors['work_file']=$ex->getMessage();
}
 //$order_obj->PostOrder();

if(count($errors)==0){
    if(isset($_SESSION['order_obj'])){
        unset($_SESSION['order_obj']);
    }
    if(isset($_SESSION['errors'])){
        unset($_SESSION['errors']);
    }
try {
    $order_obj->PostOrder();
    $order_obj->SendMail("digitizingstar@gmail.com");
} catch (Exception $ex) {
  $msg_error=$ex->getMessage();
}
$order_obj->upload_work_file($_FILES['work_file']['tmp_name']);
    $msg="successful";
    $_SESSION['msg']=$msg;
    header("Location:../SubmitOrder.php");
}
else{
    $msg="Failed";

    $_SESSION['msg']=$msg;
    $_SESSION['order_obj']=serialize($order_obj);
    $_SESSION['errors']=$errors;
    header("Location:../SubmitOrder.php");
}
?>
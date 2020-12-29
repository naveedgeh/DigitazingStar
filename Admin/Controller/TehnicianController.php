<?php
include_once '../Model/Technician.php';

$tech_obj=new Technician();
$errors=array();

try {
    $tech_obj->technician_name=$_POST['name'];
} catch (Exception $ex) {
    $errors['name']=$ex->getMessage();
}
try {
    $tech_obj->phone_number=$_POST['phone'];
} catch (Exception $ex) {
    $errors['phone']=$ex->getMessage();
}
try {
    $tech_obj->email_address=$_POST['email'];
} catch (Exception $ex) {
    $errors['email']=$ex->getMessage();
}
try {
    $tech_obj->technician_username=$_POST['tech_username'];
} catch (Exception $ex) {
  echo  $errors['tech_username']=$ex->getMessage();
}
try {
    $tech_obj->technician_password=$_POST['tech_password'];
} catch (Exception $ex) {
  echo  $errors['tech_password']=$ex->getMessage();
}
try {
    $tech_obj->technician_image=$_FILES['tech_img'];
} catch (Exception $ex) {
    $errors['tech_img']=$ex->getMessage();
}


//$tech_obj->AddTechnician();
if(count($errors)==0){
try {
    $tech_obj->AddTechnician();
} catch (Exception $ex) {
    $msg_error=$ex->getMessage();
}
$tech_obj->upload_technician_image($_FILES['tech_img']['tmp_name']);
    $msg="successful";
    $_SESSION['msg']=$msg;
    header("Location:../technician.php");
}else{
    $msg="Failed";

    $_SESSION['msg']=$msg;
    $_SESSION['tech_obj']=serialize($tech_obj);
    $_SESSION['errors']=$errors;
    header("Location:../technician.php");
}

?>
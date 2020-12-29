<?php
session_start();
include_once '../Model/ExtraWork.php';

$extra=new ExtraWork();
$errors=array();
try {
    $extra->userd=$_POST['userd'];
} catch (Exception $th) {
   echo $errors['userd']=$th->getMessage();
}
try {
    $extra->techorder=$_POST['techorder'];
} catch (Exception $th) {
  echo  $errors['techorder']=$th->getMessage();
} 
try {
    $extra->work_file=$_FILES['workfile'];
} catch (Exception $th) {
 echo   $errors['workfile']=$th->getMessage();
} 
//$extra->Deliver();
if(count($errors)==0){
try {
    $extra->Deliver();
   
} catch (Exception $th) {
    echo    $meg=$th->getMessage();
}
$extra->upload_work_file($_FILES['workfile']['tmp_name']);
header("Location:../received_order_admin.php");

}else{
    header("Location:../received_order_admin.php"); 
}
     

?>
<?php
session_start();
include_once '../Model/ExtraWork.php';

$extra=new ExtraWork();

if(isset($_POST['userd']) && isset($_POST['techorder'])){

    $userd=$_POST['userd'];
    $techorder=$_POST['techorder'];
    $extra->EnableOrde($techorder,$userd);
    echo "done";

}
else{
    echo "Sorry";
    header('Location:../received_order_admin.php');
}

?>
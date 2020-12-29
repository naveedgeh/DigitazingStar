<?php
include_once '../Model/Order.php';


$order_obj=new Order();

if(empty($_POST['delete'])){

    header('Location:../UserProfile.php');
}else{
    $deletes=$_POST['delete'];
    $order_obj->AllDeleteOrder($deletes);
    header('Location:../UserProfile.php');
}

?>
<?php
include_once '../Model/ExtraFunction.php';


$order_obj=new ExtraFunction();

if(empty($_POST['delete'])){

    header('Location:../received_order_user.php');
}else{
    $deletes=$_POST['delete'];
    $order_obj->AllDeleteReceivedOrder($deletes);
    header('Location:../received_order_user.php');
}

?>
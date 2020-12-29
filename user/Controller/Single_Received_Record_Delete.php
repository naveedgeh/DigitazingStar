<?php
include_once '../Model/ExtraFunction.php';
$order_obj=new ExtraFunction();

if(isset($_POST['data'])){
    $single_id=$_POST['data'];
}
if($order_obj->SingleReceivedOrderDelete($single_id)){
        echo "done";
}
else{
    
    header("Location:../received_order_user.php");
}
?>
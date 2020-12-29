<?php
include_once '../Model/Order.php';
$order_obj=new Order();

if(isset($_POST['data'])){
    $single_id=$_POST['data'];
}
if($order_obj->SingleOrderDelete($single_id)){
        echo "done";
}
else{
    echo "dsdfsd";
    header("Location:../UserProfile.php");
}
?>
<?php
include_once '../Model/ExtraFunction.php';
$order_obj=new ExtraFunction();


if(isset($_POST['data'])){
    $downloadid=$_POST['data'];
    $order_obj->DownloadStatusChange($downloadid);
    echo   "done";
}else{
    header('Location:../received_order_user.php');
}

    
        


    
    
    
  


?>
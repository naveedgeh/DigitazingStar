<?php
include_once '../Model/ExtraFunction.php';


$order_obj=new ExtraFunction();

if(empty($_POST['delete'])){

    header('Location:../invoice.php');
}else{
    $deletes=$_POST['delete'];
    $order_obj->AllInvoiceDelete($deletes);
    header('Location:../invoice.php');
}

?>
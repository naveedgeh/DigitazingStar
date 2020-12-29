<?php
include_once '../Model/ExtraFunction.php';
$order_obj=new ExtraFunction();

if(isset($_POST['data'])){
    $invoice_id=$_POST['data'];
}
if($order_obj->SingleInvoiceDelete($invoice_id)){
        echo "done";
}
else{
    
    header("Location:../invoice.php");
}
?>
<?php
include_once '../Model/generate_invoice.php';
$obj_invoice=new Invoice();

if(empty($_POST['delete'])){

    header('Location:../invoice.php');
}else{
    $deletes=$_POST['delete'];
    $obj_invoice->AllInvoiceDelete($deletes);
    header('Location:../invoice.php');
}
?>
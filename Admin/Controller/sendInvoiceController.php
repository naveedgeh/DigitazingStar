<?php
session_start();
include_once '../Model/generate_invoice.php';

$invoice=new Invoice();
if(isset($_POST['invoiceid']) && isset($_POST['userd'])){
     $invoiceid=$_POST['invoiceid'];
     $userd=$_POST['userd'];
     
     $invoice->SendInvoice($invoiceid,$userd);
     echo "done";
}
// if(//$invoice->SendInvoice($invoiceid,$userd)){
//    // echo "done";
//     //header("Location:../invoice.php");
// }
else{
    echo "sorry";
    //header("Location:../invoice.php");

}


?>
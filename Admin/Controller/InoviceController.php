<?php
include_once '../Model/generate_invoice.php';

$invoice=new Invoice();
$errors=array();

try {
    $invoice->total_regular_work=$_POST['num_ragular'];
} catch (Exception $ex) {
    $errors['num_ragular']=$ex->getMessage();
}
try {
    $invoice->total_regular_price=$_POST['price_ragular'];
} catch (Exception $ex) {
    $errors['price_ragular']=$ex->getMessage();
}
try {
    $invoice->total_urgent_work=$_POST['num_urgent'];
} catch (Exception $ex) {
    $errors['num_urgent']=$ex->getMessage();
}
try {
    $invoice->total_urgent_price=$_POST['price_urgent'];
} catch (Exception $ex) {
    $errors['price_urgent']=$ex->getMessage();
}
try {
    $invoice->user_id=$_POST['user_id'];
} catch (Exception $ex) {
    $errors['user_id']=$ex->getMessage();
}
try {
    $invoice->invoice_type=$_POST['invoice_type'];
} catch (Exception $ex) {
    $errors['invoice_type']=$ex->getMessage();
}
try {
    $invoice->complex_logo=$_POST['complex_logo'];
} catch (Exception $ex) {
    $errors['complex_logo']=$ex->getMessage();
}
try {
    $invoice->price_complex=$_POST['price_complex'];
} catch (Exception $ex) {
    $errors['price_complex']=$ex->getMessage();
}
try {
    $invoice->back_logo=$_POST['back_logo'];
} catch (Exception $ex) {
    $errors['back_logo']=$ex->getMessage();
}
try {
    $invoice->price_backlogo=$_POST['price_backlogo'];
} catch (Exception $ex) {
    $errors['price_backlogo']=$ex->getMessage();
}
//$invoice->AddInvoice();
    if(count($errors)==0)
    {
        try {
            $invoice->AddInvoice();
        } catch (Exception $ex) {
                $msg=$ex->getMessage();
        }
        header("Location:../invoice.php");

    }
    else{
        header("Location:../invoice.php");
    }





?>
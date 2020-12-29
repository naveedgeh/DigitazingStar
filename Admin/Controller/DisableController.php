<?php 
include_once '../Model/Technician.php';
$tech=new Technician();
if(isset($_GET['dis'])){

    $dis=$_GET['dis'];
$tech->Disable($dis);
header("Location:../technician.php");    
}else{
    header("Location:../technician.php");
}



?>
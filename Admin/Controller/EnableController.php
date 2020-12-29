<?php 
include_once '../Model/Technician.php';
$tech=new Technician();
if(isset($_GET['enb'])){

    $enb=$_GET['enb'];
$tech->Enable($enb);
header("Location:../technician.php");    
}else{
    header("Location:../technician.php");
}



?>
<?php 
include_once '../Model/Technician.php';
$tech=new Technician();
if(isset($_GET['del'])){

     $del=$_GET['del'];
$tech->TechDelete($del);
header("Location:../technician.php");    
}else{
    header("Location:../technician.php");
}



?>
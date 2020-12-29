<?php
include_once('../../dbConnection.php');
$obj=new DBConnection();
            $obj_db=$obj->connect();
if(isset($_GET['enb'])){
        $id=$_GET['enb'];
}
            
            if($result){
                header("Location:../technician.php");

            }          
?>
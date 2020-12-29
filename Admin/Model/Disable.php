<?php
include_once('../../dbConnection.php');
$obj=new DBConnection();
            $obj_db=$obj->connect();
if(isset($_GET['dis'])){
        $id=$_GET['dis'];
}
           
            if($result){
                header("Location:../technician.php");

            }

            
?>
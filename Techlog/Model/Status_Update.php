<?php
include_once('dbConnection.php');
$obj=new DBConnection3();
 $obj_db=$obj->Connect();
$statuss=$_POST['data'];
$id=$_POST['id'];
$status_update="UPDATE `order_tb` set `statuss`='$statuss' where `order_id`='$id'";
 
$result=$obj_db->query($status_update);
if($obj_db->errno){
    echo $obj_db->errer;
}
 
 

?>
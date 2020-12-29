<?php
include_once('../../dbConnection.php');
$obj=new DBConnection();
$obj_db=$obj->connect();
$download_status="SELECT * FROM   `user_dowload_status`";

$result=$obj_db->query($download_status);

if($result){
    $data=$result->fetch_array();
    $d_status=$data['user_dowload_status'];
   echo $d_status;
}
?>
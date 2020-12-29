<?php
include_once('../../dbConnection.php');
$obj=new DBConnection();
            $obj_db=$obj->connect();
    $id=$_POST['data'];
    $val=$_POST['val'];
     if($val="Yes"){
    $del_technician="DELETE FROM `technician_tb`";
    $result=$obj_db->query($del_technician);
    if($result){
        echo "done";
    }
}
?>
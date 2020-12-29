<?php

include_once('../Model/dbConnection.php');


$id=$_POST['data'];

$obj=new DBConnection2();
            $obj_db=$obj->Connect();

            $rejection="UPDATE `order_tb` SET `reject`='1' WHERE `order_id`='$id'";
            $result=$obj_db->query($rejection);

            if($result){

                return "Good";
            }


?>
<?php

include_once('../../dbConnection.php');


$id=$_POST['data'];

$obj=new DBConnection();
            $obj_db=$obj->connect();

            $rejection="UPDATE `order_tb` SET `reject`='1' WHERE `order_id`='$id'";
            $result=$obj_db->query($rejection);

            if($result){

                return "Good";
            }


?>
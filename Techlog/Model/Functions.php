<?php
include_once 'http://localhost/digitizingstar/dbConnection.php';

function GetOrder(){

    $obj=new DBConnection();
    $obj_db=$obj->connect();

    $select_order="SELECT * FROM `order_tb` ORDER BY `order_id` ASC";

    $result=$obj_db->query($select_order);

    return $result;

}

?>
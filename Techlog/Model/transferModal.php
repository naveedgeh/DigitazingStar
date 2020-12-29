<?php
include_once('../../dbConnection.php');
$obj=new DBConnection();
            $obj_db=$obj->connect();



            if(isset($_POST['transfer'])){

                 $technician_id=$_POST['technician'];
                 $r_hidden_id=$_POST['id'];

                 $oder_transfer="UPDATE `order_tb` SET `technician_id`='$technician_id',`status`='In Progress' WHERE `order_id`='$r_hidden_id'";
                 $result=$obj_db->query($oder_transfer);
                 var_dump($result);
                 if($result){
                    header("Location:../request.php");
                 }

            }
?>
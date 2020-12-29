<?php
include_once('dbConnection.php');
$obj=new DBConnection2();
            $obj_db=$obj->Connect();



            if(isset($_POST['transfer'])){

                 $technician_id=$_POST['technician'];
                 $r_hidden_id=$_POST['id'];
                 $comments=$_POST['comment'];

                 $oder_transfer="UPDATE `order_tb` SET `technician_id`='$technician_id',`statuss`='In Progress' WHERE `order_id`='$r_hidden_id'";
                 $result=$obj_db->query($oder_transfer);
                
                 
                 if($result){
                      $message=$obj_db->real_escape_string($comments);
                 echo $insert_comment="INSERT INTO `commenet_admin`(`Comments`,`order_idd`) values('$message','$r_hidden_id')";
                  $result1=$obj_db->query($insert_comment);
                  if($result1)
                  {
                    header("Location:../request.php");
                  }

                 }
                 else{
                  header("Location:../request.php");
                 }

            }
?>
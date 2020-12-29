<?php
include('dbConnection.php');
$obj=new DBConnection3();
            $obj_db=$obj->Connect();
if(isset($_POST['submit'])){
    $user_idddd=$_POST['user_idddd'];
    $user_namename=$_POST['user_namename'];
    $comments=$_POST['commnetss'];
    $commentss=$obj_db->real_escape_string($comments);
    
    $work_file =$_FILES['work_file']['name'];
    
    $array=explode('.',$work_file);
         $name=$array[0];
         $ext=$array[1];
         
          if($ext=='zip'|| $ext=="jpg" || $ext=="png"){
             $path='../workfile/';
             $loacation=$path.$work_file;
           
          
        
          $tech_order_deliver="INSERT INTO `tech_deliver_order`(`user_name_id`,`user_id`,`comment`,`workfile`) VALUES('$user_namename','$user_idddd','$commentss','$work_file')";
          $result=$obj_db->query($tech_order_deliver);
          if($result){
              header("Location:../dashboard.php");
             

          }
          move_uploaded_file($_FILES['work_file']['tmp_name'],$loacation);

        }
         
}


?>
<?php
include('../../dbConnection.php');
$obj=new DBConnection();
            $obj_db=$obj->connect();
if(isset($_POST['submit'])){
    $user_idddd=$_POST['user_id'];
    $user_namename=$_POST['user_name_id'];
    $commentss=$_POST['commnetss'];
    
    
    $work_file =$_FILES['work_file']['name'];
    
    $array=explode('.',$work_file);
         $name=$array[0];
         $ext=$array[1];
         
          if($ext=='zip'|| $ext=="jpg" || $ext=="png"){
             $path='../adminworkfile/';
             $loacation=$path.$work_file;
           
          
        
          $admin_order_deliver="INSERT INTO `admin_deliver_order`(`user_name_id`,`user_id`,`comment`,`workfile`,`work_status`) VALUES('$user_namename','$user_idddd','$commentss','$work_file','1')";
          $result=$obj_db->query($admin_order_deliver);
          if($result){
              header("Location:../request.php");
             

          }
          move_uploaded_file($_FILES['work_file']['tmp_name'],$loacation);

        }
         
}


?>
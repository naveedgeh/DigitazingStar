<?php
include_once('../../dbConnection.php');
$obj=new DBConnection();
            $obj_db=$obj->connect();

//             $target_dir = "../img";
// $target_file = $target_dir . basename($_FILES["tech_img"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if (isset($_POST['add_technician'])) {
  
           $name = $_REQUEST['name'];
           $phone = $_REQUEST['phone'];
          
           $email = $_REQUEST['email'];
           $tech_img=$_FILES['tech_img']['name'];
           
           

          // Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//   $uploadOk = 0;
// }

// Check if $uploadOk is set to 0 by an error

      $sql = "INSERT INTO `technician_tb` (`name`, `phone`, `email`, `image`)
       VALUES ('$name','$phone','$email','$tech_img')";
     
       $result=$obj_db->query($sql);
       if ($result) {
         
       //  header("Location:../technician.php");
         echo "<script> alert('Technician Succesfully Add')
         
         location.replace('../technician.php');
         </script>";
         

       }else {
     
         echo "<script> alert('Sorry Technician Not Add.')
         
         location.replace('../technician.php');
         
         </script>";
        // header("Location:../technician.php");

         // $error = 'Sorry Your Unable to place your order.';
       }

      // Upload file
      
            move_uploaded_file($_FILES['tech_img']['tmp_name'],"../tech_img/".$_FILES['tech_img']['name']);
             

 }

?>
<?php
session_start();
if(isset($_SESSION['aEmail']) && $_SESSION['password']){
session_destroy();
echo " <script> location.href='index.php'</script>";
}
 ?>


?>
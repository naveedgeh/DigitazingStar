<?php include_once('../../dbConnection.php');?>

<form action="Model/transferModal.php" method="post">
  <div class="form-group">
    <label for="email">Please Select Technician:</label>
   <select name="technician" class="form-control" style="border:1px solid;">
<option>Please Select Technician</option>
<?php
        $obj=new DBConnection();
        $obj_db=$obj->connect();
        $id=$_POST['data'];
        $technician="SELECT * FROM `technician_tb`";
                                $result=$obj_db->query($technician);
                             
                               while($data=$result->fetch_array()){


            
            
  ?>
    <option  value="<?php echo $data['id']?>"><?php echo $data['name']?></option>
   <?php }?>
   </select>
  </div>
  <input type="hidden" name="id" value="<?php echo $id;?>"/>
  <input type="submit" name="transfer" class="btn btn-primary" value="Transfer">
</form>
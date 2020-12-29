<form action="Model/technician_add.php" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label for="name">Tehnician Name:</label>
    <input type="text" name="name" style="border:1px solid;" class="form-control" id="name"/>
  </div>
  <div class="form-group">
    <label for="phone">Phone Number:</label>
    <input type="text" name="phone" style="border:1px solid;" class="form-control" id="phone">
  </div>
  <div class="form-group">
    <label for="email">Email Address:</label>
    <input type="email" name="email" style="border:1px solid;" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="email">Tehnician Image:</label>
    <input type="file" name="tech_img" style="border:1px solid;" class="form-control" id="tech_img">
  </div>
  <input type="submit" name="add_technician" value="Submit" class="btn btn-primary"/>
</form>
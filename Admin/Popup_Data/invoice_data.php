<div class="panel panel-primary">
<div class="panel-heading">
Invoice 
</div>
<div class="panel-body">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<form action="Controller/InoviceController.php" method="post">
<div class="form-group">
<lable>Pleaes Enter Total Regular Work</lable>
<input type="number" name="num_ragular" style="border:1px solid;" class="form-control"/>
</div>
<div class="form-group">
<lable>Pleaes Enter Regular Work Price</lable>
<input type="number" name="price_ragular" style="border:1px solid;" class="form-control"/>
</div>
<div class="form-group">
<lable>Pleaes Enter Total Urgent Work </lable>
<input type="number" name="num_urgent" style="border:1px solid;" class="form-control"/>
</div>
<div class="form-group">
<lable>Pleaes Enter  Urgent Work Price </lable>
<input type="number" name="price_urgent" style="border:1px solid;" class="form-control"/>
</div>
<div class="form-group">
<lable>Pleaes Enter  Total Complex  Logos </lable>
<input type="number" name="complex_logo" style="border:1px solid;" class="form-control"/>
</div>
<div class="form-group">
<lable>Pleaes Enter  Complex  Logo Price </lable>
<input type="number" name="price_complex" style="border:1px solid;" class="form-control"/>
</div>
<div class="form-group">
<lable>Pleaes Enter Total Back Logos</lable>
<input type="number" name="back_logo" style="border:1px solid;" class="form-control"/>
</div>
<div class="form-group">
<lable>Pleaes Enter Back Logo Price </lable>
<input type="number" name="price_backlogo" style="border:1px solid;" class="form-control"/>
</div>
<div class="form-group">
<lable>Pleaes Select User</lable>
<select class="form-control" style="border:1px solid;" name="user_id">
<option >Please Select User</option>
<?php
include_once '../Model/generate_invoice.php';
$invoice=new Invoice();
$users=$invoice->GetUserInvoice();
foreach ($users as $user) {
    

?>

<option value="<?php echo $user->userid;?>"><?php echo $user->username;?></option>
<?php }?>
</select>
</div>
<div class="form-group">
<lable>Pleaes Select Invoice Type</lable>
<select class="form-control" style="border:1px solid;" name="invoice_type">
<option >Please Select Invoice Type</option>
<option value="Daily">Daily</option>
<option value="Weekly">Weekly</option>
<option value="Monthly">Monthly</option>
<option value="yearly">Yearly</option>
</select>
</div>
<div class="form-group">
<input type="submit" name="submit" class="btn btn-primary" value="Generate Invoice"/>
</div>
</form>
</div>
</div>
</div>
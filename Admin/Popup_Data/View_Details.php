
<?php
include_once '../../user/Model/Order.php';
?>
<style>


#leftPanel{
    background-color:#0079ac;
    color:#fff;
    text-align: center;
}

#rightPanel{
    min-height:415px;
}

/* Credit to bootsnipp.com for the css for the color graph */
.colorgraph {
  height: 5px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}
</style>

<?php

?>
<div class="row">
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">


<?php
$id=$_POST['data'];
$obj_order=new Order();

$data=$obj_order->SingleOrderDetails($id);

?>

<div class="container">
<br>
<br>
	<div class="row" id="main">
      
        <div class="col-md-8 well" style="margin-left:25px;border:none;"  id="rightPanel">
            <div class="row">
    <div class="col-md-12">
    	<form role="form">
			<h2>View Order Detail.<small></small></h2>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <label> Design Name</label>
                        <input type="text" name="udesing" id="first_name" class="form-control input-lg" value="<?php echo $data->design_name;?>" readonly tabindex="1" style="background-color:white;">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <label>Order Type</label>
						<input type="text" readonly  name="uordertype" id="last_name" class="form-control input-lg" value="<?php echo $data->order_type;?>" tabindex="2" style="background-color:white;">
					</div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <label>Required Format</label>
						<input type="text" readonly name="last_name" id="last_name" class="form-control input-lg" value="<?php echo $data->required_formate;?>" tabindex="2" style="background-color:white;">
					</div>
                </div>
                <?php
                if($data->order_type!='Vectorize'){
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <label>Width</label>
						<input type="text" readonly name="last_name" id="last_name" class="form-control input-lg" value="<?php echo $data->width;?>" tabindex="2" style="background-color:white;">
					</div>
                </div>
                
            
                <div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <label>height</label>
						<input type="text" readonly name="last_name" id="last_name" class="form-control input-lg" value="<?php echo $data->height;?>" tabindex="2" style="background-color:white;">
					</div>
                </div>
              
                
                <div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <label>Measure</label>
						<input type="text" readonly name="last_name" id="last_name" class="form-control input-lg" value="<?php  echo $data->Measure;?>" tabindex="2" style="background-color:white;">
					</div>
                </div>
               
                <div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <label>Fabric Type</label>
						<input type="text" readonly name="last_name" id="last_name" class="form-control input-lg"  value="<?php echo $data->fabric_type;?>" tabindex="2" style="background-color:white;">
					</div>
                </div>
                
                <div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <label>Placement</label>
						<input  type="text" readonly name="last_name" id="last_name" class="form-control input-lg" value="<?php echo $data->placement;?>" tabindex="2" style="background-color:white;">
					</div>
                </div>
                <?php }?>
                <div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <label>Color</label>
						<input type="text" readonly name="last_name" id="last_name" class="form-control input-lg" value="<?php echo $data->color;?>" tabindex="2" style="background-color:white;">
					</div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <label>Blending</label>
						<input type="text" readonly name="last_name" id="last_name" class="form-control input-lg" value="<?php echo $data->blending;?>" tabindex="2"style="background-color:white;">
					</div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <label>Urgent Work</label>
						<input type="text" readonly name="last_name" id="last_name" class="form-control input-lg" value="<?php echo $data->urgent_work;?>" tabindex="2" style="background-color:white;">
					</div>
                </div>
                <?php
                if($data->order_type!='Vectorize'){
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <label style="margin-top:15px;"></label>
						<input type="text" readonly name="last_name" id="last_name" class="form-control input-lg"  tabindex="2" >
					</div>
                </div>
                <?php }?>
			<div class="form-group">
                <label> Additional Details</label>
				<textarea readonly class="form-control input-lg"  tabindex="4" style="background-color:white;"><?php echo $data->additional_work;?></textarea>
			</div>
				
				
			</div>
			<!-- <hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"></div>
				<div class="col-xs-12 col-md-6"><a href="#" class="btn btn-success btn-block btn-lg">Save</a></div>
			</div> -->
		</form>
	</div>
</div>
<!-- Modal -->

</div>
        </div>
     </div> 
     <br/>      
<center>
<a href="<?php echo $id;?>" id="reject" class="btn btn-lg btn-primary">Reject</a>
<a href="<?php echo $id;?>" data-toggle="modal" data-target="#myModal1" id="transfer"class="btn btn-lg btn-primary"> Transfer Order</a>
</center>
</div>
</div>
</div>
</div>
<br/>
<br/>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="panel panel-primary">
<div class="panel-heading">
Product Files
</div>
<div class="panel-body">
<!-- <img src="../user/images/<?php// echo $image_files;?>" class="img img-responsive"/> -->
</br>
<a href="../user/userswork/<?php echo $data->work_file;?>" style="margin-bottom:20px;" download><button type="download" class="btn btn-lg btn-primary ">Download File</button></a>
</div>
</div>
</div>
</div>

<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog ">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title title2">Transfer Order</h4>
        </div>
        <div class="modal-body modal2">
         
        </div>
        <div class="modal-footer">
          <button type="button" id="dis" class="btn btn-default">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  </div>




<script>
$("#reject").click(function(event){
    
    event.preventDefault();
    var id=$(this).attr('href');
    
    $.ajax({
        type:'post',
        url:'Popup_Data/rejection.php',
        data:{data:id},

    }).done(function(responce){

        location.reload();
          
    });
    
});
$("#transfer").click(function(event){
    
    event.preventDefault();
    var id=$(this).attr('href');
    
    $.ajax({
        type:'post',
        url:'Popup_Data/transfer.php',
        data:{data:id},

    }).done(function(responce){

       $(".modal2").html(responce);
       
          
    });
    
});


$("#dis").click(function(){
    $(this).modal('hide');
    location.reload();
});
</script>
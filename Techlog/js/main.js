
$(".popup").click(function(event){
    event.preventDefault();
    var id=$(this).attr('href');
    
    $.ajax({
        type:'post',
        url:'Popup_Data/View_Details.php',
        data:{data:id},

    }).done(function(responce){

       // alert(responce);
          //  $("#myModal").Modal();
          $(".modal-title").html("Order Details");
            $(".modal-body").html(responce);
    });
    
});
$("#technician").click(function(event){
    
    event.preventDefault();
    
    
    $.ajax({
       
        url:'Popup_Data/technician_form.php',
        

    }).done(function(responce){

        $(".modal_data").html(responce);
          
    });
    
});
$(".statuss").change(function(){
    var v=$(this).val();
    var id=$(this).data("iddd");
    $.ajax({
        type:'post',
        url:'Model/Status_Update.php',
        data:{"data":v,"id":id},
    }).done(function(res){
        
        location.reload();

    });


});


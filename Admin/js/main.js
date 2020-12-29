
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
    
   
    
    
    $.ajax({
       
        url:'Popup_Data/technician_form.php',
        

    }).done(function(responce){

        $(".modal_data").html(responce);
          
    });
    
});
$("#yes").click(function(event){
    // event.preventDefault();
    var id=$("#del").attr("href");
    var val=$(this).data("val");
    
    $.ajax({
        type:'post',
        url:'Model/Del_technician.php',
       data:{"data":id,"val":val}, 
    }).done(function(res){
        if(res=="done"){
            location.reload();
        }
        // 
    });

});
$("#ginvoice").click(function(event){

    event.preventDefault();

    $.ajax({

        url:"Popup_Data/invoice_data.php",

    }).done(function(responce){
        $("#invoiceModel").modal("show");
          
        $(".invoice_data").html(responce);
    });

});
    $(document).ready(function(){
        $('#myTable202').DataTable();
    });


    function print() {
        printJS({
        printable: 'printElement',
        type: 'html',
        targetStyles: ['*']
     })
    }
    
    document.getElementById('printButton').addEventListener ("click", print)
    
  


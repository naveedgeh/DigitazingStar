<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8"
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?php echo TITLE?></title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <!-- Bootstrap DatePicker Css -->
    <link href="plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
    <!-- Wait Me Css -->
    <link href="plugins/waitme/waitMe.css" rel="stylesheet" />
    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet"/>
        <script src="plugins/dropzone/dropzone.js"></script>
        <!-- hide/show form fields -->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script>
        $(document).ready(function(){
         
            $('#purpose').on('change', function() {
              debugger 
              if ( this.value == 'Vectorize')
              //.....................^.......
              {
                $("#digitize").hide();
                $("#vectorize").show();
              }
              else  if ( this.value == 'Digitize')
              {
                $("#vectorize").hide();
                $("#digitize").show();
              }
               else if(this.value == 'Quote')
              {
                $("#vectorize").hide();
                $("#digitize").show();
              }else {
                $("#vectorize").hide();
                $("#digitize").show();
              }
            });
        });
        $(document).ready( function () {
     $('#myTable').DataTable({
      responsive: {
        details: true,
    }
     });
} );
      </script>
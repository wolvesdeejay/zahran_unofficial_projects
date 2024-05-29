<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="content">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Codeigniter 4 Ajax Dependent Dropdown List - Tutsmake.COM</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-success">Codeigniter 4 Dynamic Dependent Dropdown with Ajax - Tutsmake.COM</h2>
                    </div>
                    <div class="card-body">
                     <form>
                        <div class="form-group">
                          <label for="country">City</label>
                          <select class="form-control" id="sel_city">
                          <option value="">Select City</option>
                           <?php foreach($cities as $city){?>
                              <option value="<?php echo $city->id;?>"><?php echo $city->cityname;?></option>"
                           <?php }?>
                            
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="state">Departments</label>
                          <select class="form-control" id="sel_depart">
                            
                          </select>
                        </div>                        
                        <div class="form-group">
                          <label for="city">Users</label>
                          <select class="form-control" id="sel_user">
                            
                          </select>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <script type='text/javascript'>
  // baseURL variable
  var baseURL= "<?php echo base_url();?>";
 
  $(document).ready(function(){
 
    // City change
    $('#sel_city').change(function(){
      var city = $(this).val();
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>index.php/User/getCityDepartment',
        method: 'post',
        data: {city: city},
        dataType: 'json',
        success: function(response){
          // Remove options 
          $('#sel_user').find('option').not(':first').remove();
          $('#sel_depart').find('option').not(':first').remove();
          // Add options
          $.each(response,function(index,data){
             $('#sel_depart').append('<option value="'+data['id']+'">'+data['depart_name']+'</option>');
          });
        }
     });
   });
 
   // Department change
   $('#sel_depart').change(function(){
     var department = $(this).val();
     // AJAX request
     $.ajax({
       url:'<?=base_url()?>index.php/User/getDepartmentUsers',
       method: 'post',
       data: {department: department},
       dataType: 'json',
       success: function(response){
 
         // Remove options
         $('#sel_user').find('option').not(':first').remove();
         // Add options
         $.each(response,function(index,data){
           $('#sel_user').append('<option value="'+data['id']+'">'+data['name']+'</option>');
         });
       }
    });
  });
 
 });
 </script>
</body>
</html>
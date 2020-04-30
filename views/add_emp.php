<html>
<header> 
    <title></title>
 
   <link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url(); ?>assests/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</header>
<body>
<?php
if(!empty($this->session->flashdata('success')))
{
    echo $this->session->flashdata('success');
}
if(isset($error))
{
    echo $error;
}

?>
<ul class="breadcrumb">

<li><a href="<?php echo $this->config->base_url(); ?>Login_con/dashboard">Dashboard</a></li>
<li><a href="#">ADD Employee</a></li>


</ul>
<div class="container">
    <h1 class="display-5" >Add Employee</h1>
    <br>
    <div class="col-sm-3">
        
        <?php

        echo form_open('dashboard_con/add_emp','id="add_form"');

        echo form_label('First name');
        $data_fname=array('type'=>'text','name'=>'first_name','class'=>"form-control");
        echo form_input($data_fname);
        
        echo form_label('Middle name');
        $data_mname=array('type'=>'text','name'=>'middle_name','class'=>"form-control");
        echo form_input($data_mname);
        echo form_label('Last name');
        $data_lname=array('type'=>'text','name'=>'last_name','class'=>"form-control");
        echo form_input($data_lname);
        echo form_label('Qualification');
        $data_qualification=array('type'=>'text','name'=>'qualification','class'=>"form-control");
        echo form_input($data_qualification);

        echo form_label('status');
        $data_status=array('active'=>'active','inactive'=>'inactive');
        echo form_dropdown('status',$data_status,'active','class="form-control"');
        echo "</br>";
        $data_register=array('type'=>'submit','name'=>'register','value'=>'ADD','class'=>'btn btn-primary');
        echo form_input($data_register);
        echo form_close();
        ?>
        

        
    </div>
<div>

<script>
$(document).ready(function(){
    $('form[id="add_form"]').validate({
        rules:{
            
            first_name:"required",
            last_name:"required",
            qualification:"required",
        },
        messages:{
            
            first_name:"This field is required",
            last_name:"This field is required",
            qualification:"This field is required",


        },
        submitHandler: subform()
        
        /*(form){
            form.submit();
        }*/
    });
   ;
    function subform()
    {
        $('#add_form').submit(function(e) {
        e.preventDefault();
        var data=$('#add_form').serialize();
        $.ajax({
            url: "<?php echo $this->config->base_url();?>dashboard_con/add_emp", 
            type:'POST',
            data: data,
            
            success: function(response){
               
                if(response=="success")
                {   
                   
                    Swal.fire({
                    icon: 'success',
                    title: 'NEW EMPLOYEE ADDED SUCCESSFULLY',
                    showConfirmButton: false,
                    timer: 1500
                    })
                    
                    
                }
                else if(response=="error")
                {   
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error has occured while inserting the data',
                    
                    timer: 1500
                    })
                   // alert("This username is already taken!");
                }
                else
                {
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please Fill the form',
                    
                    timer: 1500
                    })
                   
                }
        }});
   
        });
    }
});

        
    
</script>

</body>
</html>
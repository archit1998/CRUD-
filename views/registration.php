<html>
<header> 
    
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url(); ?>assests/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url(); ?>assests/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

</header>
<body>

<div class="container">
    <h1 class="display-5">Registration page</h1>
    <br>
    <div class="col-md-4">
        
        <?php

        echo form_open('Login_con/new_user','id="reg_form"');

        echo form_label('Email');
        $data_name=array('type'=>'text','name'=>'username','id'=>'username','class'=>"form-control",'placeholder'=>"example@gmail.com");
        echo form_input($data_name);
        echo form_label('password');
        $data_password=array('type'=>'password','name'=>'password','id'=>'password','class'=>"form-control",'placeholder'=>"*******");
        echo form_input($data_password);
        echo form_label('First name');
        $data_fname=array('type'=>'text','name'=>'first_name','id'=>'first_name','class'=>"form-control",'placeholder'=>"First name");
        echo form_input($data_fname);
        echo form_label('Middle_name');
        $data_mname=array('type'=>'text','name'=>'middle_name','id'=>'middle_name','class'=>"form-control",'placeholder'=>"Middle name");
        echo form_input($data_mname);
        echo form_label('Last name');
        $data_lname=array('type'=>'text','name'=>'last_name','id'=>'last_name','class'=>"form-control",'placeholder'=>"Last name");
        echo form_input($data_lname);
        echo form_label('Status');
        $data_status=array('active'=>'active','inactive'=>'inactive');
        echo form_dropdown('status',$data_status,'active','class="form-control"');
        echo "<br>";
        $data_register=array('type'=>'submit','name'=>'register','value'=>'Register','class'=>'btn btn-primary');
        echo form_input($data_register);
        
        echo form_close();
        ?>
 <!--       <button class="btn btn-primary" type="submit" name="register" >Register</button> -->
        <a href="<?php echo $this->config->base_url(); ?>" >Go to Login page </a>
    </div>
    
<div>
<script>
$(document).ready(function(){
    $('form[id="reg_form"]').validate({
        rules:{
            username:{
                required:true,
                email:true,
            },
            password:{
                required:true,
                minlength:5,
                maxlength:13,
            },
            first_name:"required",
            last_name:"required",
        },
        messages:{
            username:{
                required:'This field is required',
                email:'Enter a valid email',
            },
            password:{
                required:'This field is required',
                minlength:'Password must be at least 5 characters long',
                maxlength:'Password should be less than 13 characters',
            },
            first_name:"This field is required",
            last_name:"This field is required",

        },
        submitHandler: subform()
        
        /*(form){
            form.submit();
        }*/
    });
   ;
    function subform()
    {
        $('#reg_form').submit(function(e) {
        e.preventDefault();
        var data=$('#reg_form').serialize();
        $.ajax({
            url: "<?php echo $this->config->base_url();?>Login_con/new_user", 
            type:'POST',
            data: data,
            
            success: function(response){
               
                if(response=="success")
                {   
                   
                    Swal.fire({
                    icon: 'success',
                    title: 'Registered Successfully.',
                    showConfirmButton: false,
                    timer: 1500
                    })
                    
                    
                }
                else if(response=="error")
                {   
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'This username is already taken!',
                    
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
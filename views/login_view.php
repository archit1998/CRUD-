<!DOCTYPE html>
<?php

if(isset($this->session->userdata['Logged_in']))
{
    header('location:Login_con/dashboard');
}

?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url(); ?>assests/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url(); ?>assests/css/style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>    
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    </head>
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

<div> 
    <form action="Login_con/login_validation" id="login_form" method="post">
        <div class="container">
            <h1 class="display-5"> USER LOGIN</h1>
            <div class="col-sm-3">
            
                    <hr class="mb-3">
                    <label for="user_name"><b>Username</b></label>
                    <input class="form-control" type="text" name="username" placeholder="example@gmail.com" maxlength="100" >

                    <label for="password"><b>Password</b></label>
                    <input class="form-control" type="password" name="password" placeholder="********"  >
                    <a href="<?php echo $this->config->base_url(); ?>Login_con/forget_pass" >Forget Password </a>
                    <hr class="mb-3">
                    
                    <input class="btn btn-primary" type="submit" name="login" value="Login">
                    <br><br>
                    <a class="btn btn-danger btn-lg" href="<?php echo $this->config->base_url(); ?>Login_con/registration" >Sign up</a>
            </div>
        </div>
    </form>
</div>
<script>
$(document).ready(function(){
    $('form[id="login_form"]').validate({
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
        },
        submitHandler:function(form){
            form.submit();
            
        }
    });

});
        
    
</script>   

</body>
</html>
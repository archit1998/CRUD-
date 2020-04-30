<html>
<header> 
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url(); ?>assests/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url(); ?>assests/css/style.css">  
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
<div class="container">
    <h1 class="display-5" >Forgot Password </h1>
    <br>
    <div class="col-sm-3">
        
    <?php

            echo form_open('Login_con/forget_pass_submit');

            echo form_label('username');
            $data_name=array('type'=>'text','name'=>'username','id'=>'username','class'=>"form-control");
            echo form_input($data_name);
            
            $data_register=array('type'=>'submit','name'=>'register','value'=>'submit','class'=>'btn btn-primary');
            echo form_input($data_register);

            echo form_close();
    ?>
        

        
    </div>
<div>

</body>
</html>
<!DOCTYPE html>

<html>
<head>
	<title></title>
	<!--<link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url(); ?>assests/css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url(); ?>assests/css/style.css">  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<style>
		.center {
    margin: auto;
    width: 60%;
    border: 3px solid #73AD21;
    padding: 10px;
    }
	</style>
	
</head>

<body>
<?php

if($this->session->userdata['Logged_in']['username']!='')
{	
	$username=$this->session->userdata['Logged_in']['username'];
	
	//echo 'Welcome to HONOHR  '.$username.'   ';
	
	
}
else
{
	header('location:Login_con/login');
}?>

<div class="container">
	<h1 class="display-5" style="color: black;text-align:center" >ADMIN Dashboard</h1>
	<br>
</div>
<div class="center">
      <h1>Welcome to Employee Management System</h1>
	  <p></p>
	  <div class="msg ml2 lblGreetings" style="float:left;">
	   Hello there!</div><img src="https://dev.honohr.com/assets/img/smile.png">
      <hr>
      <h3>Regards</h3>
      <p>Team HONOHR</p>
    </div>
    
  </div>
</div>

<!--
<div class="col-sm-5">
	
	<div class="text-center">
	<h4 class="text-primary">     Add Employee  
	
	<a class="btn btn-primary " href="<?php echo $this->config->base_url();?>Login_con/add_emp"> ADD</a> </h4>
	
	</div>
	
</div>
<div class="col-sm-5">
	
	<div class="text-center">
	<h4 class="text-info">    Employee Details 
	
	<a class="btn btn-info " href="<?php echo $this->config->base_url();?>dashboard_con/get_all_emp"> VIEW </a> </h4>
	
	</div>
	
</div>
-->


<?php
	//$button=array('type'=>'button','name'=>'button','id'=>'button','value'=>'Show ME','class'=>'btn btn-warning');
	//echo form_input($button);	
	
?>


	


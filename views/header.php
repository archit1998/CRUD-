<!DOCTYPE html>
<html lang="en">
<head>
  <title>HONO BOYS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url(); ?>assests/css/style.css">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    .navbar 
    {
        background-color:#00008B!important;
        color:#000000!important;
    }
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>
<?php

if($this->session->userdata['Logged_in']['username']!='')
{	
	$username=$this->session->userdata['Logged_in']['user_first_name'];
}?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
     
      <a class="navbar-brand" href="#">
	  <img src="https://dev.honohr.com/assets/img/honohr.png" alt="Logo" style="width:80px;">
	   
	   </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="<?php echo $this->config->base_url();?>Login_con/dashboard">Dashboard</a></li>
        <li><a href="<?php echo $this->config->base_url();?>dashboard_con/get_all_emp">All Employees</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
	  <li><a><?php echo 'Welcome to HONOHR  '.$username.'   '; ?></a></li>
        <li><a href="<?php echo $this->config->base_url();?>Login_con/logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
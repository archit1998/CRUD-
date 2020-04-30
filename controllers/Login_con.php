<?php

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * @package	CodeIgniter
 * @author	Archit Agrawal
 * @link	https://codeigniter.com
 * @version	3.1.11
 
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Common Functions
*
* Loads the base classes and executes the request.
*
* @package		CodeIgniter
* @subpackage	CodeIgniter
* @category	Common Functions
* @author	Archit Agrawal
* @link		https://codeigniter.com/user_guide/
*/

// ------------------------------------------------------------------------

class Login_con extends CI_Controller {

	//constructor 
	public function __construct()
	{
		parent::__construct();
		
		// Load the Login_model to make it available to *all* of the controller's actions
		$this->load->model('Login_model');
	}
	//When there is no html file specified, it automatically goes to index function 
	public function index()
	{	
		// Load the Login page
		/*	echo "<pre>";
		print_r($_SERVER);
		die();*/
		$this->load->view('header_login.php');
		$this->load->view('login_view.php');
		$this->load->view('footer.php');
	}
	public function registration()
	{
		// load the registration page for SignUp
		$this->load->view('header_login.php');
		$this->load->view('registration.php');
		$this->load->view('footer.php');
	}
	public function login()
	{
		// Load the Login page
		$this->load->view('header_login.php');
		$this->load->view('login_view.php');
		$this->load->view('footer.php');
	}
	public function dashboard()
	{	
		// Load the dashboard page through which you can add,view,edit,delete employee Details
		$this->load->view('header.php');
		$this->load->view('dashboard.php');		
		$this->load->view('footer.php');
	}
	public function add_emp()
	{
		//Add_ emp page is used to add new employee in database
		$this->load->view('header.php');
		$this->load->view('add_emp');
		$this->load->view('footer.php');
	}
	public function forget_pass()
	{
		//if someone forgot the password,then forget_pass function will sent password to user email id
		$this->load->view('header_login.php');
		$this->load->view('forget_pass');
		$this->load->view('footer.php');
	}
	
	public function login_validation()
	{
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required|min_length[5]');
		if($this->form_validation->run())
		{
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			if($this->Login_model->can_login($username,$password))
			{
				$name=$this->Login_model->can_login($username,$password);
				$session_data=array('username'=>$username,'user_first_name'=>$name[0]['user_first_name']);
				$this->session->set_userdata('Logged_in',$session_data);
				header('location:dashboard');
			}
			else
			{	
				$data=array('error'=>'Invalid username or password');
				header('location:http://architlocal.com');
			}
		}
		else
		{
			$data=array('error'=>'Validation Error');
			header('location:http://architlocal.com');
		}
	}
	
	public function new_user()
	{	
		$username=$_POST['username'];
		$password=$_POST['password'];
		$first_name=$_POST['first_name'];
		$middle_name=$_POST['middle_name'];
		$last_name=$_POST['last_name'];

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required|min_length[5]');
		$this->form_validation->set_rules('first_name','first name','required','alpha');
		$this->form_validation->set_rules('middle_name','middle name');
		$this->form_validation->set_rules('last_name','last name','required');
		
		if($this->form_validation->run())
		{	
		$data=array(
		'user_email'=>$username,
		'user_pass'=>$password,
		'user_first_name'=>$first_name,
		'user_middle_name'=>$middle_name,
		'user_last_name'=>$last_name,
		'user_status'=>$_POST['status']
			);
		/*echo "<pre>";
		print_r($data);
		die();*/
	
				if($this->Login_model->check_login($data))
				{	
					echo "success";
				//	$this->session->set_flashdata('success','Registered Successfully.');
				//	$data=array('error'=>'Registration successful');
				//	$this->load->view('registration');
				}
				else
				{	echo "error";
					//$data=array('error'=>'This username is already taken!');
					//$this->load->view('registration');
				}

		}
		else
		{	echo "error in validation";
		//	$data=array('error'=>'Validation Error');
		//	$this->load->view('registration',$data);
		}
	
		
	}
	
	
	public function logout()
	{
		$session_data=array('username'=>'');
		$this->session->unset_userdata('Logged_in','username');
		//$data=array('error'=>'Sucessfully Logout');
		$this->session->set_flashdata('success','Sucessfully Logout');
		//$this->load->view('login_view',$data);
		session_destroy();
		header('location:http://architlocal.com');
		

	}
	
	public function forget_pass_submit()
	{	
		$this->form_validation->set_rules('username','Username','required');
		if($this->form_validation->run())
		{
			$username=$this->input->post('username');
			$user_data=$this->Login_model->check_user($username);
			if($user_data != FALSE)
			{
				
				// send an email before that we need to setup the SMTP details.
				$to_email = $user_data[0]['user_email'];
				$subject = "Simple Email Test via PHP";
				$body = "Hi".$user_data[0]['user_email'].",<br/>Your password is :".$user_data[0]['user_pass']."<br/><br/>Thanks & Regards<br/>Tech Team";
				$headers = "From: shaikmuzammil481@gmail.com";
	 
				if (mail($to_email, $subject, $body, $headers)) {
					
					$data = array(
							'error_message' => "Email successfully sent to $to_email..."
					);
				}
				else
				{
					$data = array('error' => "Wrong Username");
					$this->load->view('forget_pass',$data);
				} 
			}
			else
			{
				$data=array('error'=>'Invalid username ');
				$this->load->view('forget_pass',$data);
			}
		
		}

	}
	
	
}



<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard_con extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}
    public function add_emp()
    {   
        $this->form_validation->set_rules('first_name','lang:first_name','required','alpha');
		$this->form_validation->set_rules('middle_name','lang:middle_name');
        $this->form_validation->set_rules('last_name','lang:last_name','required','alpha');
        if($this->form_validation->run())
		{	$data=array(
			'emp_first_name'=>$this->input->post('first_name'),
			'emp_middle_name'=>$this->input->post('middle_name'),
			'emp_last_name'=>$this->input->post('last_name'),
            'emp_qualification'=>$this->input->post('qualification'),
            'emp_status'=>$this->input->post('status')
			);
            if($this->Login_model->add_emp($data))
            {
                echo "success";
           //     $this->session->set_flashdata('success','NEW EMPLOYEE ADDED SUCCESSFULLY');//pending
                
            //    redirect('Login_con/add_emp');

            }
            else
            {
                echo "error";
            //    $data=array('error'=>'Error has occured while inserting the data'); //pending
			 //   redirect('Login_con/add_emp');
            }
        }
        else
        {
            echo "Validation Error";
          //  $data=array('error'=>'Validation Error');//pending
	    //		redirect('Login_con/add_emp');
        }
    }
    
    public function get_all_emp()
    {
        $data=$this->Login_model->get_all_emp();
      //  $this->load->view('header.php');
		$this->load->view('header.php');
     //  $this->load->view('breadcrumb.php');
        $this->load->view('get_all_emp',$data);
        $this->load->view('footer.php');

    }
    public function edit_emp($emp_id)
    {
        
        $data=$this->Login_model->edit_emp($emp_id);
        $this->load->view('header.php');
        $this->load->view('edit_emp',$data);
        $this->load->view('footer.php');
        
    }
    public function edit_emp_submit()
    {
        $data=array(
            'emp_first_name'=>$this->input->post('first_name'),
            'emp_middle_name'=>$this->input->post('middle_name'),
            'emp_last_name'=>$this->input->post('last_name'),
            'emp_qualification'=>$this->input->post('qualification'),
            'emp_status'=>$this->input->post('status')
        );
        if($this->Login_model->edit_emp_submit($data))
        {
            echo "success";

           
          //  $this->session->set_flashdata('success','Employee Detail updated successfully');
       //     redirect('dashboard_con/get_all_emp');   
        }
        else 
        {   echo "failure ! Nothing has been modified";
         //   $emp_id=$this->input->post('edit_id');
          //  $this->session->set_flashdata('failure','Nothing has been modified');
          //  redirect('dashboard_con/edit_emp/'.$emp_id.'');

        }
        
    }
    public function delete_emp($emp_id)
    {
        if($this->Login_model->delete_emp($emp_id))
        {
            $this->session->set_flashdata('success','Employee Detail deleted successfully');
            redirect('dashboard_con/get_all_emp');
        }   
    }
   

}
?>

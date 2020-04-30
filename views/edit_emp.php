<html>
<header> 
    <title></title>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
 
    
</header>
<body>
<?php
if(!empty($this->session->flashdata('failure')))
{
    echo $this->session->flashdata('failure');
}

?>
<ul class="breadcrumb">

<li><a href="<?php echo $this->config->base_url(); ?>Login_con/dashboard">Dashboard</a></li>
<li><a href="<?php echo $this->config->base_url(); ?>dashboard_con/get_all_emp">Employee Details</a></li>
<li><a href="#">Edit Employee</a></li>

</ul>
<div class="container">
    <h1 class="display-5" >EDIT Employee</h1>
    <br>
    <div class="col-sm-3">
        
        <?php
       
        echo form_open('dashboard_con/edit_emp_submit','id="edit_form"');

        echo form_label('First name');
        $data_fname=array('type'=>'text','name'=>'first_name','class'=>"form-control",'value'=>$emp_details[0]->emp_first_name);
        echo form_input($data_fname);
    
        echo form_label('Middle name');
        $data_mname=array('type'=>'text','name'=>'middle_name','class'=>"form-control",'value'=>$emp_details[0]->emp_middle_name);
        echo form_input($data_mname);
        echo form_label('Last name');
        $data_lname=array('type'=>'text','name'=>'last_name','class'=>"form-control",'value'=>$emp_details[0]->emp_last_name);
        echo form_input($data_lname);
        echo form_label('Qualification');
        $data_qualification=array('type'=>'text','name'=>'qualification','class'=>"form-control",'value'=>$emp_details[0]->emp_qualification);
        echo form_input($data_qualification);
        
        echo form_label('status');
        $data_status=array('active'=>'active','inactive'=>'inactive');
        echo form_dropdown('status',$data_status,$emp_details[0]->emp_status,'class="form-control"');

        echo "</br>";
        $data_register=array('type'=>'submit','name'=>'register','value'=>'Save','class'=>'btn btn-primary');
        echo form_input($data_register);

        $data_hidden=array('type'=>'hidden','name'=>'edit_id','value'=>$emp_details[0]->emp_id);
        echo form_input($data_hidden);
        echo form_close();
        ?>
        

        
    </div>
<div>
<script>
$(document).ready(function(){
    $('form[id="edit_form"]').validate({
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
        $('#edit_form').submit(function(e) {
        e.preventDefault();
        var data=$('#edit_form').serialize();
        $.ajax({
            url: "<?php echo $this->config->base_url();?>dashboard_con/edit_emp_submit", 
            type:'POST',
            data: data,
            
            success: function(response){
               
                if(response=="success")
                {    
                    Swal.fire({
                    icon: 'success',
                    title: 'Employee Detail updated successfully',
                    showConfirmButton:true,
                    timer: 1500
                    })
                    setTimeout(1500);
                    window.location.href = "http://architlocal.com/dashboard_con/get_all_emp";
                    
                 //   redirect('dashboard_con/get_all_emp');
                    
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
                    text: 'failure Nothing has been modified ',
                    
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
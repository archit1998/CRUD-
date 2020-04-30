<ul class="breadcrumb">

  <li><a href="<?php echo $this->config->base_url(); ?>Login_con/dashboard">Dashboard</a></li>
  <li><a href="#">Employee Details</a></li>
  <a class="btn btn-primary btn-lg" style="float:right" href="<?php echo $this->config->base_url();?>Login_con/add_emp">Add Employee</a>
<li> <a style="text-align: center;display:block;">All Employee Details</a></li>
</ul>


<?php 
if(!empty($this->session->flashdata('success')))
{
    echo $this->session->flashdata('success');
}

?>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
            <tr>
                
                <th>First name</th>
                <th>Middle name</th>
                <th>Last name</th>
                <th>Qualification</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if(!empty($all_emp))
        {
            foreach($all_emp as $emp)
            {
        ?>
            <tr>
                
                <td><?php echo $emp['emp_first_name'];?></td>
                <td><?php echo $emp['emp_middle_name']; ?></td>
                <td><?php echo $emp['emp_last_name']; ?></td>
                <td><?php echo $emp['emp_qualification'];?></td>
                <td><?php echo $emp['emp_status'];?></td>
                <td><a class="btn btn-primary btn-sm" href="<?php echo $this->config->base_url(); ?>dashboard_con/edit_emp/<?php echo $emp['emp_id'];?>">Edit</a>&nbsp&nbsp <a class="btn btn-danger btn-sm" href="<?php echo $this->config->base_url(); ?>dashboard_con/delete_emp/<?php echo $emp['emp_id'];?>">Delete</a></td>
            </tr>
        <?php
            }
        }
        ?>  
        </tbody>

        
    </table>
    
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url(); ?>assests/css/style.css">  
    
 <!--   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script >
    $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
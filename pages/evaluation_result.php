<?php 
    require_once '../includes/login_valid_checker.php';
	require_once '../includes/connection.php';
	require_once '../includes/session_controller.php';
	require_once '../includes/header.php';  
	require_once '../includes/navbar.php';  
	require_once '../includes/sidebar.php';
?> 

<section class="content">
	<div class="container-fluid"> 
	    <div class="block-header"> 
	       EVALUATION RESULT  
	    </div>

	    <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
            	<!-- Main Page Content --> 
            	<?php 
            		if($_SESSION["acc_type"] == "Teacher") 
            		{
            			
            		}
            	    elseif($_SESSION["acc_type"] == "Dean")  
                    { 
                       //$department = $_SESSION["department"];
                       require_once 'dean_result_dashboard_v3.php';  
                    }
                    elseif($_SESSION["acc_type"] == "Admin") 
                    {
                        require_once 'admin_result_dashboard.php'; 
                    }
                 ?>
           	</div>
        </div>
	</div> 
</section>

<?php require_once '../includes/footer.php'; ?>






<?php 

    require_once '../includes/login_valid_checker.php';
	require_once '../includes/header.php'; 
	require_once '../includes/navbar.php';
	require_once '../includes/sidebar.php';


?>

<section class="content">   
	<div class="container-fluid">
	    <div class="block-header">  
	       MAIN DASHBOARD 
	    </div> 
 
	    <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            	<!-- Main Page Content --> 
            	<?php  
            		if($_SESSION["acc_type"] == "Student") 
            		{
            			require_once("dashboard_student.php");
            		}
            	    elseif($_SESSION["acc_type"] == "Teacher") 
                    {
                        require_once 'dashboard_teacher.php';
                    } 
                    elseif($_SESSION["acc_type"] == "Dean") 
                    { 
                        require_once 'dashboard_dean.php'; 
                    }
                    elseif($_SESSION["acc_type"] == "Admin")
                    {
                        require_once 'dashboard_admin.php';
                    }
                 ?>
           	</div>
        </div>
	</div>
</section>

<?php require_once '../includes/footer.php'; ?>


<script type="text/javascript">
    
         $(document).ready(function(){

        $("#evaluate_teacher_self_form").submit(function(e){
            // alert('submit intercepted!');
              
            // alert($('input[name=q_ter_2]').val());

            var sel_Radio_Count = 0;

            $("input:radio:checked").each(function(){

                var value = $(this).val();

                sel_Radio_Count = sel_Radio_Count + 1;

                // alert(v)
                // var v = $('input[name='+name+']:checked').val()

            });


            if(sel_Radio_Count == 23)
            {
                $("#evaluate_teacher_self_form").submit();
            } 
            else
            {
                alert("You missed to select such field");  
            }

            e.preventDefault(e);

        });

        $("#evaluate_self_form").submit(function(e){
            // alert('submit intercepted!');
              
            // alert($('input[name=q_ter_2]').val());

            var sel_Radio_Count = 0;

            $("input:radio:checked").each(function(){

                var value = $(this).val();

                sel_Radio_Count = sel_Radio_Count + 1;

                // alert(v)
                // var v = $('input[name='+name+']:checked').val()

            });


            if(sel_Radio_Count == 23)
            {
                $("#evaluate_self_form").submit();
            } 
            else
            {
                alert("You missed to select such field");  
            }

            e.preventDefault(e);

        });


         $("#insert_evaluation_form_grade_lvl").submit(function(e){
            // alert('submit intercepted!');
              
            // alert($('input[name=q_ter_2]').val());

            

            var sel_Radio_Count = 0;

            $("input:radio:checked").each(function(){

                var value = $(this).val();

                sel_Radio_Count = sel_Radio_Count + 1;

                // alert(v)
                // var v = $('input[name='+name+']:checked').val()

            });


            if(sel_Radio_Count == 23)
            {
                $("#insert_evaluation_form").submit();
            } 
            else
            {
                alert("You missed to select such field");  
            }

            e.preventDefault(e);

        });

        

        $("#evaluate_self_dean_form").submit(function(e){
            // alert('submit intercepted!');
              
            // alert($('input[name=q_ter_2]').val());

            

            var sel_Radio_Count = 0;

            $("input:radio:checked").each(function(){

                var value = $(this).val();

                sel_Radio_Count = sel_Radio_Count + 1;

                // alert(v)
                // var v = $('input[name='+name+']:checked').val()

            });


            if(sel_Radio_Count == 23)
            {
                $("#evaluate_self_dean_form").submit();
            } 
            else
            {
                alert("You missed to select such field");  
            }

            e.preventDefault(e);

        });

    });


</script>






<?php 
    require_once '../includes/login_valid_checker.php';
    require_once '../includes/header.php'; 
    require_once '../includes/navbar.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/connection.php';
  
    session_start();
?>

<section class="content">
    <div class="card">
        <div class="header">  
        	<div class="row"> 

        	
            <div class="col-xs-12"> <h2>Evaluate Co-Teachers</h2> </div>
        	</div> 

            </div>  
     
        <div class="body"> 
          <?php require_once 'teacher_list_from_departmentV2.php'; ?>
        </div>
    </div>    
</section> 
 
 
<?php require_once '../includes/footer.php'; ?>

<script type="text/javascript">
    
    $(document).ready(function(){

        $("#insert_teacher_evaluation_form").submit(function(e){
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
                $("#insert_teacher_evaluation_form").submit();
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

        

        $("#evaluation_update_form").submit(function(e){
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

    });

</script>


	
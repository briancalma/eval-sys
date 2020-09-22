
<div class="card">
    <div class="header"><h2>Teacher / Faculty Evaluation Result</h2></div>
    <div class="body">
    	
    	<!-- SELECT Field What department to see -->  
  
    	<label>SELECT DEPARTMENT</label>
    	 	<div class="input-group"> 
                <select class="form-control show-tick" id="department_select" onchange="showEvalResult()">
                    <option value="">-- Please select --</option>
                    <?php 
                    	$getAllDept = $conn->query("SELECT * FROM `tbl_department`");
 
                    	while($data = $getAllDept->fetch_array()) { 
                    ?>
                    	<option value="<?php echo $data[2]; ?>"><?php echo $data[1]; ?></option> 
                            
                    <?php } ?> 
                </select>    
        </div> 

    	<!-- SELECT ALL FROM teachers where department is equal to department -->

    	<!--  The same process parin -->

    	<section id="departmentEvalOutput">
    		
    	</section>

    </div>
</div>
          
<script>
	function showEvalResult() 
	{
		var department = $("#department_select").val();

		$("#departmentEvalOutput").load("department_result_v2.php?department=" + department);
	}
</script>









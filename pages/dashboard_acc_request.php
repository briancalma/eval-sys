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
            	<div class="card">
				    <div class="header"><h2>TEACHER ACCOUNT REQUESTS</h2></div>
				    <div class="body">
				    	<div class="table-responsive">
				    		<table class="table table-bordered table-striped table-hover dataTable js-exportable">
				        		<thead>
				            		<tr>
				                		<th>Action</th>
				                		<th>Fullname</th>
				                		<th>Contact Number</th>
				                		<th>Gender</th>
				                		<th>SEM APPLYING FOR</th>
				                		<th>SY APPLYING FOR</th>
				                		<th>DEPARTMENT</th>
				            		</tr>
				        		</thead>
				     			<tbody>
				     				<?php 

				     					$sql = "SELECT * FROM `tbl_teacher_record` WHERE `STATUS` = '0'";
				     					$query = $conn->query($sql);

				     					while($row = $query->fetch_array()) {
				     				 ?>
				     				 	  <tr>
				     				 	  	  <td>
				     				 	  	  	   <a href="../controller/account_process.php?account_req=Teacher&status=1&id=<?php echo $row[0]; ?>">APPROVE</a>

				     				 	  	  	   <a href="../controller/account_process.php?account_req=Teacher&status=2&id=<?php echo $row[0]; ?>">DISAPPROVE</a>
				     				 	  	  </td>
				     				 	  	  <td><?php echo $row["firstname"]." ".$row["middlename"]." ".$row["lastname"]; ?></td>
				     				 	  	  <td><?php echo $row[8]; ?></td>
				     				 	  	  <td><?php echo $row[9]; ?></td>
				     				 	  	  <td><?php echo $row[10]; ?></td>
				     				 	  	  <td><?php echo $row[11]; ?></td>
				     				 	  	  <td><?php echo $row[12]; ?></td>
				     				 	  </tr>

				     				 <?php } ?>
				     				
				     			</tbody>
				     		</table>
				     	</div>
				    </div>
				</div>
           	</div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            	<!-- Main Page Content --> 
            	<div class="card">
				    <div class="header"><h2>DEAN ACCOUNT REQUESTS</h2></div>
				    <div class="body">
				    	<div class="table-responsive">
				    		<table class="table table-bordered table-striped table-hover dataTable js-exportable">
				        		<thead>
				            		<tr>
				                		<th>Action</th>
				                		<th>Fullname</th>
				                		<th>Contact Number</th>
				                		<th>Gender</th>
				                		<th>SEM APPLYING FOR</th>
				                		<th>SY APPLYING FOR</th>
				                		<th>DEPARTMENT</th>
				            		</tr>
				        		</thead>
				     			<tbody>
				     				<?php 

				     					$sql = "SELECT * FROM `tbl_dean_record` WHERE `STATUS` = '0'";
				     					$query = $conn->query($sql);

				     					while($row = $query->fetch_array()) {
				     				 ?>
				     				 	  <tr>
				     				 	  	  <td>
				     				 	  	  	   <a href="../controller/account_process.php?account_req=Dean&status=1&id=<?php echo $row[0]; ?>">APPROVE</a>
				     				 	  	  	   <a href="../controller/account_process.php?account_req=Dean&status=2&id=<?php echo $row[0]; ?>">DISAPPROVE</a>
				     				 	  	  </td>
				     				 	  	  <td><?php echo $row["firstname"]." ".$row["middlename"]." ".$row["lastname"]; ?></td>
				     				 	  	  <td><?php echo $row[8]; ?></td>
				     				 	  	  <td><?php echo $row[9]; ?></td>
				     				 	  	  <td><?php echo $row[10]; ?></td>
				     				 	  	  <td><?php echo $row[11]; ?></td>
				     				 	  	  <td><?php echo $row[12]; ?></td>
				     				 	  </tr>

				     				 <?php } ?>
				     				
				     			</tbody>
				     		</table>
				     	</div>
				    </div>
				</div>
           	</div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            	<!-- Main Page Content --> 
            	<div class="card">
				    <div class="header"><h2>ADMIN ACCOUNT REQUESTS</h2></div>
				    <div class="body">
				    	<div class="table-responsive">
				    		<table class="table table-bordered table-striped table-hover dataTable js-exportable">
				        		<thead>
				            		<tr>
				                		<th>Action</th>
				                		<th>Fullname</th>
				                		<th>Account Type</th>
				            		</tr>
				        		</thead>
				     			<tbody>
				     				<?php 

				     					$sql = "SELECT * FROM `tbl_admin_record` WHERE `STATUS` = 'WAITING'";
				     					$query = $conn->query($sql);

				     					while($row = $query->fetch_array()) {
				     				 ?>
				     				 	  <tr>
				     				 	  	  <td>
				     				 	  	  	   <a href="../controller/account_process.php?account_req=Admin&status=APPROVED&id=<?php echo $row[0]; ?>">APPROVE</a>
				     				 	  	  	   <a href="../controller/account_process.php?account_req=Admin&status=DISAPPROVED&id=<?php echo $row[0]; ?>">DISAPPROVE</a>
				     				 	  	  </td>
				     				 	  	  <td><?php echo $row["firstname"]." ".$row["middlename"]." ".$row["lastname"]; ?></td>
				     				 	  	  <td><?php echo $row[7]; ?></td>
				     				 	  	 
				     				 	  </tr>

				     				 <?php } ?>
				     				
				     			</tbody>
				     		</table>
				     	</div>
				    </div>
				</div>
           	</div>
        </div>
	</div>
</section>

<?php require_once '../includes/footer.php'; ?>









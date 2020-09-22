<?php 
    require_once '../includes/login_valid_checker.php';
	require_once '../includes/connection.php';
	require_once '../includes/session_controller.php';
	require_once '../includes/header.php'; 
	require_once '../includes/navbar.php';
	require_once '../includes/sidebar.php';
?>


	<div class="container-fluid">
	    <div class="block-header"> 
	      ADMIN ACCOUNTS PROCESS
	    </div>

	    <div class="row clearfix"> 
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            	<!-- Main Page Content --> 
            	<section class="content">
                    <div class="container-fluid">
                        <div class="block-header">
                           ADMIN ACCOUNTS
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <!-- Main Page Content --> 
                                <div class="card">
                                    <div class="header">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h2>ADMIN ACCOUNT LIST</h2>
                                            </div>
                                            <div class="col-sm-6">
                                                <center>
                                                    <button class="btn btn-success btn-sm" style="width: 200px;" onclick="showAddAdminAccModal()">Add New User</button>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                <thead>
                                                    <tr>
                                                        <th>Action</th>
                                                        <th>User</th>
                                                        <th>Type</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $sql = "SELECT * FROM `tbl_admin_record` WHERE `status` = 'APPROVED'";
                                                        $query = $conn->query($sql);

                                                        while($row = $query->fetch_array()) {
                                                     ?>
                                                        <tr>
                                                            <td>
                                                                <button class="btn btn-primary btn-sm" onclick="showChangeAccTypeModal('<?php echo $row["username"]; ?>','<?php echo $row["acc_type"]; ?>')">Change Privilage</button>
                                                                <a href="../controller/drop_user.php?id=<?php echo $row["username"]; ?>" class="btn btn-danger btn-sm">DELETE USER</a>
                                                            </td>
                                                            <td><?php echo $row["username"]; ?></td>
                                                            <td><?php echo $row["acc_type"]; ?></td>
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
            </div>
    	</div>

         <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- Main Page Content --> 
                <section class="content">
                    <div class="container-fluid">
                        <div class="block-header">
                           DEAN ACCOUNTS
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <!-- Main Page Content --> 
                                <div class="card">
                                    <div class="header">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h2>DEAN APPROVED ACCOUNT LIST</h2>
                                            </div>
                                            <div class="col-sm-6">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                <thead>
                                                    <tr>
                                                        <th>Dean ID</th>
                                                        <th>Full Name</th>
                                                        <th>Department</th>
                                                        <th>SY</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $sql = "SELECT * FROM `tbl_dean_record` WHERE `status` = 1";
                                                        $query = $conn->query($sql);

                                                        while($row = $query->fetch_array()) {
                                                     ?>
                                                        <tr>
                                                            <td><?php echo $row["username"]; ?></td>
                                                            <td><?php echo $row["firstname"]." ".$row["middlename"]." ".$row["lastname"]; ?></td>
                                                            <td><?php echo $row["department"]; ?></td>
                                                            <td><?php echo $row["sy"]; ?></td>
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
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- Main Page Content --> 
                <section class="content">
                    <div class="container-fluid">
                        <div class="block-header">
                           TEACHER ACCOUNTS
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <!-- Main Page Content --> 
                                <div class="card">
                                    <div class="header">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h2>TEACHER APPROVED ACCOUNT LIST</h2>
                                            </div>
                                            <div class="col-sm-6">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                <thead>
                                                    <tr>
                                                        <th>TEACHER ID</th>
                                                        <th>Full Name</th>
                                                        <th>Department</th>
                                                        <th>SY</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $sql = "SELECT * FROM `tbl_teacher_record` WHERE `status` = 1";
                                                        $query = $conn->query($sql);

                                                        while($row = $query->fetch_array()) {
                                                     ?>
                                                        <tr>
                                                            <td><?php echo $row["username"]; ?></td>
                                                            <td><?php echo $row["firstname"]." ".$row["middlename"]." ".$row["lastname"]; ?></td>
                                                            <td><?php echo $row["department"]; ?></td>
                                                            <td><?php echo $row["sy"]; ?></td>
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
            </div>
        </div>
    </div>




<div class="modal fade" id="changeAccTypeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form method="POST" action="../controller/update_user_acc.php">
                <div class="modal-header">
                   <p class="font-24">CHANGE <span id="adminUsernameLbl" class="badge bg-cyan"></span> FROM <span id="adminAccTypeLbl" class="badge bg-orange"></span> TO :</p>
                </div>     
                <hr>
                <div class="modal-body">
                    <input type="hidden" name="acc_id" id="acc_id_txt">
                    <label>SELECT ACCOUNT TYPE:</label>
                    <div class="input-group">
                        <select class="form-control show-tick" id="acc_type_sel" name="acc_type" required>
                            <option value="">-- Please select --</option>
                            <option value="super_admin">Super Admin</option>
                            <option value="admin">Ordinary Admin</option>
                        </select>
                    </div> 
                    
                </div>      
                <div class="modal-footer">
                     <button type="submit" class="btn btn-lg waves-effect bg-green">Update</button>
                     <button type="button" class="btn btn-lg waves-effect bg-red" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="addNewAdminAccountModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form method="POST" action="../controller/add_new_user_acc.php">
                <div class="modal-header">
                   <p class="font-24">ADD NEW ADMIN ACCOUNT</p>
                </div>     
                <hr>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">person</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="admin_id" placeholder="ADMIN ID" required autofocus>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="input-group">   
                                <span class="input-group-addon">
                                    <i class="material-icons">person</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="admin_username" placeholder="Username" required autofocus>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock</i>
                                </span>
                                <div class="form-line">
                                    <input type="password" class="form-control" name="admin_password" minlength="6" placeholder="Password" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label>SELECT ACCOUNT TYPE:</label>
                            <div class="input-group">
                                <select class="form-control show-tick" name="acc_type_sel">
                                    <option value="">-- Please select --</option>
                                    <option value="super_admin">Super Admin</option>
                                    <option value="admin">Ordinary Admin</option>
                                </select>
                            </div> 
                        </div>
                    </div>
                </div>      
                <div class="modal-footer">
                     <button type="submit" class="btn btn-lg waves-effect bg-blue">ADD NEW ADMIN ACCOUNT</button>
                </div>
            </form>
        </div>
    </div>
</div>

   

<?php require_once '../includes/footer.php'; ?>

<script>
    function showChangeAccTypeModal(admin_id,acc_type) 
    {
        $("#changeAccTypeModal").modal();
        $("#adminUsernameLbl").text(admin_id);
        $("#adminAccTypeLbl").text(acc_type);
        $("#acc_id_txt").val(admin_id);
    }

    function showAddAdminAccModal() 
    {
        $("#addNewAdminAccountModal").modal();
    }
</script>






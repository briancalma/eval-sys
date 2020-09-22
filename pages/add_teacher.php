<?php 
    require_once '../includes/login_valid_checker.php';
	require_once '../includes/header.php'; 
	require_once '../includes/navbar.php';
	require_once '../includes/sidebar.php';
	require_once '../includes/connection.php';

	session_start();
?>

<section class="content">
	<div class="container-fluid">
	    <div class="block-header">
	       TEACHER PROCESSES
	    </div>  

	    <div class="row clearfix"> 
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            	<!-- Main Page Content --> 
            	<div class="card">
            		 <div class="header"><h2>ADD NEW TEACHER</h2></div>
				     <div class="body">
				         <section id="teacher_signup_content">
                            <h4>TEACHER ACCOUNT INFO</h4> <hr>
                            <form method="POST" action="../controller/insert_teacher_acc_req.php">
                                 <div class="row">
                                    <div class="col-xs-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="teacher_id" placeholder="Teacher ID" required autofocus>
                                            </div>
                                        </div>  
                                    </div>
                                   <!--  <div class="col-xs-4">
                                        <div class="input-group">   
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-xs-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <section id="teacher_personal_info">
                                    <div class="row">
                                        <h3 style="text-indent: 15px;">Personal Information</h3><br>
                                        <div class="col-xs-4">
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="firstname" placeholder="First Name" required autofocus>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="middlename" placeholder="Middle Name" required autofocus>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="lastname" placeholder="Last Name" required autofocus>
                                                </div>
                                            </div>
                                        </div>
                                    </div>     
                                    <br><br><br><br>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <input type="number" class="form-control" min="15" max="100" name="age" placeholder="Age" required autofocus>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-4">
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="contact_number" placeholder="Contact Number" required autofocus>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-4">
                                            <div class="input-group">
                                                <div class="form-line">
                                                   <select class="form-control show-tick" name="gender">
                                                        <option value="">-- GENDER --</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br><br><br>
                                    <div class="row">
                                        <div class="col-xs-4">
                                                <div class="input-group">   
                                                    <span class="input-group-addon">
                                                       
                                                    </span>
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" name="sem">
                                                            <option value="">-- SEMESTER --</option>
                                                            <option value="1st Sem">1st Sem</option>
                                                            <option value="2nd Sem">2nd Sem</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="col-xs-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                       
                                                    </span>
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" name="school_year">
                                                            <option value="">-- School Year --</option>
                                                            <option value="2017 - 2018">2017-2018</option>
                                                            <option value="2018 - 2019">2018-2019</option>
                                                            <option value="2019 - 2020">2019-2020</option>
                                                            <option value="2020 - 2021">2020-2021</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                       
                                                    </span>
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" name="department">
                                                            <option value="">-- Department --</option>
                                                            <?php 
                                                            $getAllDept = $conn->query("SELECT * FROM `tbl_department`");

                                                            while($data = $getAllDept->fetch_array()) {
                                                            ?>
                                                             <option value="<?php echo $data[2]; ?>"><?php echo $data[1]; ?></option>

                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </section>

                                <button type="submit" class="btn btn-lg bg-green waves-effect">Sign Up</button>
                            </form>
                        </section>
                    </div>
			    </div>
		  </div>
        </div>
    </div>    
</section>

<?php require_once '../includes/footer.php'; ?>

<script>
    
</script>
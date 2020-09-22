<?php 
		
	$acc_type = $_GET["acc_type"];

	/*
	if($acc_type == "Student") 
	{

	}
	elseif($acc_type == "Dean")
	{

	}
	elseif($acc_type == "Admin") 
	{

	}
	elseif($acc_type == "Teacher")
	{

	}
	*/
 ?>


 <!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>BCEVALSYSTEM</title>
    <!-- Favicon-->
    <link rel="icon" href="../images/bcLogo.jpg" type="image/icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../template/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../template/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../template/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../template/css/style.css" rel="stylesheet">

</head>

<?php require_once '../includes/connection.php'; ?>

<body class="login-page" style="max-width: 480px;">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">BCEval <b>SYSTEM</b></a>
            <small>Bicol College Faculty Evaluation System</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="../controller/login_process.php">
                    <!-- <div class="msg">Sign in to start your session</div> -->
                    <center><img src="../images/bcLogo.jpg" width="100px" height="100px"></center> <br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <select class="form-control show-tick" name="acc_type" onchange="checkAccountType()" id="sel_acc_type">
                               <option value="">-- SELECT ACCOUNT TYPE --</option>
                               <?php 
                                    $mysqli = $conn->query("SELECT * FROM `tbl_user_list`");
                                    while ($row = $mysqli->fetch_array()) { 
                                ?>
                                 <option value="<?php echo $row[1]; ?>"><?php echo $row[1]; ?></option>
                                <?php } 
                                    $mysqli = "";
                                    $row = "";
                                ?>
                            </select>
                        </div>
                    </div>
                    <hr>   

                    <section id="dynamicFields_enrolledAs" style="display: none;"> 
                         <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <select class="form-control show-tick" name="student_type" onchange="checkStudentType()" id="student_type_sel" required="true">
                                   <option value="">-- Enrolled As --</option>
                                   <option value="Elementary">Elementary Student</option>
                                   <option value="High School Primary">Grade 7 - 10 / High School Student</option>
                                   <option value="High School Secondary">Grade 11 - Grade 12 / Junior High - Senior High Student</option>
                                   <option value="College">College Student</option>
                                   <option value="Graduate School">Graduate School Student</option>
                                </select>
                            </div>
                        </div>
                    </section>

                    
                    <div class="input-group" id="sem_select" style="display:none;">
                        <span class="input-group-addon">
                            <i class="material-icons">date_range</i>
                        </span>
                        <div class="form-line">
                            <select class="form-control show-tick" name="semester" required="true">
                                <option value="">-- SELECT SEMESTER --</option>                                
                                <?php 
                                    $mysqli = $conn->query("SELECT * FROM `tbl_semester`");
                                    while ($row = $mysqli->fetch_array()) { 
                                ?>
                                 <option value="<?php echo $row[1]; ?>"><?php echo $row[1]; ?></option>
                                <?php } 
                                    $mysqli = "";
                                    $row = "";
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="input-group" id="sy_select" style="display:none;">
                        <span class="input-group-addon">
                            <i class="material-icons">date_range</i>
                        </span>
                        <div class="form-line">
                            <select class="form-control show-tick" name="school_year" required="true">
                               <option value="">-- SELECT SCHOOL YEAR --</option>
                                <?php 
                                    $mysqli = $conn->query("SELECT * FROM `tbl_school_year`");
                                    while ($row = $mysqli->fetch_array()) { 
                                ?>
                                 <option value="<?php echo $row[1]; ?>"><?php echo $row[1]; ?></option>
                                <?php } 
                                    $mysqli = "";
                                    $row = "";
                                ?>
                            </select>
                        </div>
                    </div>
                  

                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <button class="btn btn-block bg-green waves-effect" type="submit">LOG IN</button>
                        </div>
                        <div class="col-xs-6">
                            <center>
                                <div class="btn-group dropup">
                                    <button type="button" class="btn btn-block btn-info waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">REGISTER NOW</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="signup_page.php?acc_type=Student">Student</a></li>
                                        <li><a href="signup_page.php?acc_type=Dean">Dean</a></li>
                                        <li><a href="signup_page.php?acc_type=Admin">Admin</a></li>
                                        <li><a href="signup_page.php?acc_type=Teacher">Teacher</a></li>
                                    </ul>
                                </div>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="../template/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../template/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../template/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="../template/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="../template/js/admin.js"></script>
    <script src="../template/js/pages/examples/sign-in.js"></script>
</body>

</html>

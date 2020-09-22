<!DOCTYPE html>
<html>
 
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>BCEVALSYSTEM</title>
 
     
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css"> 
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css"> 
         
    <!-- Favicon-->  
    <link rel="icon" href="../images/bcLogo.jpg" type="image/icon"> 
 
    <!-- Bootstrap Core Css -->
    <link href="../template/plugins/bootstrap/css/bootstrap.css" rel="stylesheet"> 
 
    <!-- Waves Effect Css -->
    <link href="../template/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../template/plugins/animatete-css/animate.css" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet" />


    <!-- Slimscroll Plugin Js -->
    <script src="../template/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <script src="../template/plugins/bootstrap-notify/bootstrap-notify.js"></script>
 
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
                            <input type="text" class="form-control" id="usernameTxt" name="username" placeholder="USER ID" required autofocus>
                        </div>
                    </div>
                    <br><br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="passwordTxt" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <br>
                  
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <button class="btn btn-block btn-lg bg-green waves-effect" type="submit">LOG IN</button>
                        </div>
                        <div class="col-xs-6">
                            <center>
                                <div class="btn-group dropup">
                                    <button type="button" class="btn btn-block btn-lg btn-info waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">REGISTER NOW</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0);" onclick="openSignupModal('Student')">Student</a></li>
                                        <li><a href="javascript:void(0);" onclick="openSignupModal('Dean')">Dean</a></li>
                                        <li><a href="javascript:void(0);" onclick="openSignupModal('Admin')">Admin</a></li>
                                        <li><a href="javascript:void(0);" onclick="openSignupModal('Teacher')">Teacher</a></li>
                                    </ul>
                                </div>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Signup Student -->
    <div class="modal fade" id="signupModalStudent" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>SIGNUP</h3>
                </div>
                <form method="POST" action="../controller/signup.php?acc_type=Student">
                    <!-- Max Length 100  -->
                    <div class="modal-body">
                       <h4>STUDENT ACCOUNT INFO</h4> <hr>    
                       <div class="row"> 
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">person</i>
                                    </span>
                                    <div class="form-line">    
                                        <input type="number" class="form-control" id="student_id" min="0" name="student_id" placeholder="STUDENT ID" required autofocus onchange="checkIfAccountExist('Student')"> 
                                                                    
                                    </div>
                                </div>
                            </div>
                            <!-- 
                            <div class="col-xs-4">
                                <div class="input-group">   
                                    <span class="input-group-addon">
                                        <i class="material-icons">person</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="student_username" name="student_username" placeholder="Username"
                                         minlength="6" onmouseout="checkIfAccountExist('Student-Username')" required autofocus>
                                    </div>
                                </div>
                            </div>
                             -->
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="student_password" minlength="6" 
                                        placeholder="Password" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Student ID EXIST NOTIFCATION -->
                        <div class="row">
                            <div class="col-xs-12">                           
                                 <div class="alert alert-danger" id="userExistNotify" style="display: none;">
                                    <strong>Oh snap!</strong> STUDENT ID / USERNAME Already Exist!
                                </div>
                            </div>
                        </div> 
                        
                        <section style="display: none;" id="sec_stud_personal_info">
                            <div class="row">
                                <h3 style="text-indent: 15px;">Personal Information</h3>
                                <div class="col-xs-4">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="student_firstname" placeholder="First Name" required autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="student_middlename" placeholder="Middle Name" required autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="student_lastname" placeholder="Last Name" required autofocus>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input  name="student_age" maxlength="3" type="text" class="form-control" min="5" max="100" placeholder="Age" id="student_age_txt" onchange="handleChange(this);" required autofocus>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="student_contact_number" placeholder="Contact Number"  minlength="11" maxlength="11" placeholder="Contact Number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required autofocus>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="input-group">
                                        <div class="form-line">
                                           <select class="form-control show-tick" name="student_gender" required autofocus>
                                                <option value="">-- GENDER --</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
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
                                            <select class="form-control show-tick" name="student_type_sel_signup" onchange="showStudentSignUpContents()" id="student_type_sel_signup" required="true">
                                               <option value="">-- SELECT STUDENT TYPE --</option>
                                               <option value="Elementary">Elementary Student</option>
                                               <option value="High School Primary">Grade 7 - 10 / High School Student</option>
                                               <option value="High School Secondary">Grade 11 - Grade 12 / Junior High - Senior High Student</option>
                                               <option value="College">College Student</option>
                                               <option value="Graduate School">Graduate School Student</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <section id="student_signup_content_holder"></section>
                        </section>    
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-link bg-green waves-effect">Sign Up</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Signup Student -->

    <!-- Signup Admin -->
    <div class="modal fade" id="signupModalAdmin" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>SIGNUP</h3>
                </div>
                <form method="POST" action="../controller/signup.php?acc_type=Admin">
                    <div class="modal-body">
                        <h4>ADMIN ACCOUNT INFO</h4> <hr>
                        <div class="row">
                            <!-- <div class="col-xs-4">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">person</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="admin_id" placeholder="ADMIN ID" id="admin_id" onmouseout="checkIfAccountExist('Admin')" minlength="9" required autofocus>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-xs-6">
                                <div class="input-group">   
                                    <span class="input-group-addon">
                                        <i class="material-icons">person</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="admin_username" name="admin_username" placeholder="Username"  minlength="6" onchange="checkIfAccountExist('Admin')" required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
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
                        <hr>

                        <div class="row">
                            <div class="col-xs-4">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">person</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="admin_firstname" placeholder="First Name" id="firstnameTxt" required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="input-group">   
                                    <span class="input-group-addon">
                                        <i class="material-icons">person</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="admin_middlename" placeholder="Middle Name" required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="admin_lastname" placeholder="Last Name" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">                           
                                 <div class="alert alert-danger" id="userExistNotifyAdmin" style="display: none;">
                                    <strong>Oh snap!</strong> ADMIN ID Already Exist!
                                </div>
                            </div>
                        </div> 

<!--                         <h4>Personal Information</h4> -->

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-link bg-green waves-effect">Sign Up</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Signup Admin -->


    <!-- Signup Teacher -->
    <div class="modal fade" id="signupModalTeacher" tabindex="-1" role="dialog">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>SIGNUP</h3>
                </div>
                <form method="POST" action="../controller/signup.php?acc_type=Teacher">
                    <div class="modal-body">
                        <h4>TEACHER ACCOUNT INFO</h4> <hr>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">person</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="teacher_id" id="teacher_id" placeholder="TEACHER ID" onchange="checkIfAccountExist('Teacher')" required autofocus>
                                    </div>
                                </div>
                            </div>
                            <!-- 
                                <div class="col-xs-4">
                                    <div class="input-group">   
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="teacher_username" name="teacher_username" placeholder="Username" onmouseleave="checkIfAccountExist('Teacher-Username')" required autofocus>
                                        </div>
                                    </div>
                                </div> 
                            -->
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="teacher_password" minlength="6" placeholder="Password" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">                           
                                 <div class="alert alert-danger" id="userExistNotifyTeacher" style="display: none;">
                                    <strong>Oh snap!</strong> Teacher ID / Username Already Exist!
                                </div>
                            </div>
                        </div> 

                        <section style="display: none;" id="sec_teacher_personal_info">
                            <div class="row">
                                <h3 style="text-indent: 15px;">Personal Information</h3>
                                <div class="col-xs-4">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="teacher_firstname" placeholder="First Name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="teacher_middlename" placeholder="Middle Name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="teacher_lastname" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="number" class="form-control" min="15" max="100" name="teacher_age" placeholder="Age" id="teacher_age_txt" onchange="handleChange(this);"  required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="teacher_contact_number" minlength="11" maxlength="11" placeholder="Contact Number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- 09393345751 -->

                                <div class="col-xs-4">
                                    <div class="input-group">
                                        <div class="form-line">
                                           <select class="form-control show-tick" name="teacher_gender" required>
                                                <option value="">-- GENDER --</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                              <div class="col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                      
                                        </span>
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="teacher_department" id="teacher_department" onchange="showInfo()"  required>
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

                            <div class="row">
                                <div class="col-xs-6" style="display: none;" id="teacher_sem_sec">
                                        <div class="input-group">   
                                            <span class="input-group-addon">
                                               
                                            </span>
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="teacher_sem" id="teacher_sem">
                                                    <option value="">-- SEMESTER --</option>
                                                    <option value="1st Sem">1st Sem</option>
                                                    <option value="2nd Sem">2nd Sem</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="col-xs-6" style="display: none;" id="teacher_school_year_sec">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                               
                                            </span>
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="teacher_school_year" id="teacher_school_year">
                                                    <option value="">-- School Year --</option>
                                                    <option value="2017 - 2018">2017 - 2018</option>
                                                    <option value="2018 - 2019">2018 - 2019</option>
                                                    <option value="2019 - 2020">2019 - 2020</option>
                                                    <option value="2020 - 2021">2020 - 2021</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </section> 
                    </div>   
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-link bg-green waves-effect">Sign Up</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
             </div>          
         </div>  
    </div>
    <!-- Signup Teacher -->

    <!-- Signup Dean -->
    <div class="modal fade" id="signupModalDean" tabindex="-1" role="dialog">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>SIGNUP</h3>
                </div>
                <form method="POST" action="../controller/signup.php?acc_type=Dean">
                    <div class="modal-body">
                        <h4>DEAN ACCOUNT INFO</h4> <hr>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">person</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" minlength="8" maxlength="8" id="dean_id" name="dean_id" placeholder="DEAN ID" onchange="checkIfAccountExist('Dean')" required autofocus>
                                    </div>
                                </div>
                            </div>
                            <!-- 
                                <div class="col-xs-4">
                                    <div class="input-group">   
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="dean_username" name="dean_username" placeholder="Username" onmouseleave="checkIfAccountExist('Dean-Username')" required autofocus>
                                        </div>
                                    </div>
                                </div> 
                            -->
                            <div class="col-xs-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="dean_password" minlength="6" placeholder="Password" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">                           
                                 <div class="alert alert-danger" id="userExistNotifyDean" style="display: none;">
                                    <strong>Oh snap!</strong> DEAN ID / Useraname Already Exist!
                                </div>
                            </div>
                        </div> 

                        <section style="display: none;" id="sec_dean_personal_info">

                            <div class="row">
                                <h3 style="text-indent: 15px;">Personal Information</h3>
                                <div class="col-xs-4">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="dean_firstname" placeholder="First Name" required autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="dean_middlename" placeholder="Middle Name" required autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="dean_lastname" placeholder="Last Name" required autofocus>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="number" class="form-control" min="15" max="100" name="dean_age" placeholder="Age" id="dean_age_txt" onchange="handleChange(this);"  required autofocus>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="dean_contact_number" placeholder="Contact Number"   minlength="11" maxlength="11" placeholder="Contact Number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required autofocus>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4">
                                    <div class="input-group">
                                        <div class="form-line">
                                           <select class="form-control show-tick" name="dean_gender" required>
                                                <option value="">-- GENDER --</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-4">
                                        <div class="input-group">   
                                            <span class="input-group-addon">
                                               
                                            </span>
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="dean_sem" required>
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
                                                <select class="form-control show-tick" name="dean_school_year" required>
                                                    <option value="">-- School Year --</option>
                                                    <option value="2017 - 2018">2017 - 2018</option>
                                                    <option value="2018 - 2019">2018 - 2019</option>
                                                    <option value="2019 - 2020">2019 - 2020</option>
                                                    <option value="2020 - 2021">2020 - 2021</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                               
                                            </span>
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="dean_department" required>
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
                    </div>   
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-link bg-green waves-effect">Sign Up</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
             </div>          
         </div>  
    </div>
    <!-- Signup Dean -->

    <!-- Jquery Core Js -->
    <script src="../template/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../template/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../template/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="../template/plugins/jquery-validation/jquery.validate.js"></script>

     <!-- Slimscroll Plugin Js -->
    <script src="../template/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

     <!-- Bootstrap Notify Plugin Js -->
    <script src="../template/plugins/bootstrap-notify/bootstrap-notify.js"></script>

     <script src="../template/js/pages/ui/modals.js"></script>

    <!-- Custom Js -->
    <script src="../template/js/admin.js"></script>
    <script src="../template/js/pages/examples/sign-in.js"></script>
</body>

</html>

<script>

    $("#dynamicFields_enrolledAs").hide();
    
    function checkAccountType()
    {
       // alert("Hello!");
        var acc_type = $("#sel_acc_type").val();

    
        if(acc_type == "Student")
        {
            $("#dynamicFields_enrolledAs").show();
            hideFields();
        }
        else if(acc_type == "Teacher")
        {
            $("#dynamicFields_enrolledAs").hide();
            $("#sem_select").show();
            $("#sy_select").show();
        }
        else if(acc_type == "Dean")
        {
            $("#dynamicFields_enrolledAs").hide();
            $("#sem_select").show();
            $("#sy_select").show();
        }
        else if(acc_type == "Admin")
        {   
            $("#dynamicFields_enrolledAs").hide();
            hideFields();
            // $("#dynamicFields_OtherInfo").show();
        }
    }   


    function checkStudentType()
    {

        var student_type = $("#student_type_sel").val();

        var username = $("#usernameTxt").val();

        var password = $("#passwordTxt").val();

        var dest = "../controller/student_record.php?student_type=" + student_type + "&username=" + username + "&password=" + password;

        // alert(dest)

         $.ajax({
                  url : dest,
                  success: function(result)
                  {
                    data = result.split(",");

                    // alert(data)

                    if(student_type == "College" || student_type == "Graduate School" || student_type == "High School Secondary")
                    {
                        // $("#usernameTxt").val(data[0]);

                        $("#sem_select").show();
                        $("#sy_select").show();

                        $("#sem_select_txt").val(data[0]).change();
                        $("#sy_select_txt").val(data[1]).change();

                    }
                    else if (student_type == "Elementary" || student_type == "High School Primary")
                    {
                        $("#sy_select").show();
                        $("#sy_select_txt").val(data[1]).change();
                    } 
                 }
        });
                            

    }

    function hideFields() 
    {
        $("#sem_select").hide();
        $("#sy_select").hide();
    }

    function openSignupModal(acc_type) 
    {
       
        if(acc_type == "Admin") 
        {
            $("#signupModalAdmin").modal();
        }

        if(acc_type == "Teacher") 
        {
            $("#signupModalTeacher").modal();
        }

        if(acc_type == "Dean") 
        {
            $("#signupModalDean").modal();
        }

        if(acc_type == "Student")
        {
            $("#signupModalStudent").modal();
            $("#sec_stud_personal_info").hide();
        }
    }

    function checkIfAccountExist(acc_type)
    {
        if(acc_type == "Student")
        {   
           var student_id = $("#student_id").val();
           
           if(student_id != "") 
           {

               if(student_id.length < 9 || student_id.length > 9)
               {
                    alert("Student ID must contain 9 digits!");
                     $("#sec_stud_personal_info").hide();
               }
               else
               {
                   var dest = "../controller/account_checker.php?acc_type=Student&student_id=" + student_id;

                   $.ajax({
                            url : dest,
                            success: function(result) 
                            {
                               if(result == "ACCOUNT EXIST")
                               {
                                 //alert("Account Exist! Pls Choose another unique STUDENT ID");
                                 $("#sec_stud_personal_info").hide();
                                 $("#userExistNotify").show('1000');
                               }
                               else
                               {
                                 $("#sec_stud_personal_info").show();
                                 $("#userExistNotify").hide('1000');
                               }
                            }
                    });
               } 
              
           }
           else 
           {
                $("#sec_stud_personal_info").hide();
                alert("Please Fill Up the student Id!");
                // $("#userExistNotify").show('1000');
           }
        }
        else if(acc_type == "Student-Username") 
        {
           var username = $("#student_username").val();

           var dest = "../controller/account_checker.php?acc_type=Student&username=" + username;

           $.ajax({
                    url : dest,
                    success: function(result) 
                    {
                        // alert(result);
                       if(result == "ACCOUNT EXIST")
                       {
                         // alert("Username Exist! Pls Choose another unique username!");
                         $("#sec_stud_personal_info").hide();
                         $("#userExistNotify").show('1000');
                       }
                       else
                       {
                         $("#sec_stud_personal_info").show();
                         $("#userExistNotify").hide('1000');
                       }
                    }
                });
        }
        else if(acc_type == "Dean")
        {
           var dean_id = $("#dean_id").val();

           
           if(dean_id != "") 
           {

               if(dean_id.length < 8 || dean_id.length > 8)
               {
                    alert("DEAN ID must contain 8 digits or letters!");
                    $("#sec_dean_personal_info").hide();
               }
               else
               {
                    var dest = "../controller/account_checker.php?acc_type=Dean&dean_id=" + dean_id;

                   $.ajax({
                            url : dest,
                            success: function(result) 
                            {
                               if(result == "ACCOUNT EXIST")
                               {
                                 //alert("Account Exist! Pls Choose another unique STUDENT ID");
                                 $("#userExistNotifyDean").show('1000');
                                 $("#sec_dean_personal_info").hide();
                               }
                               else
                               {
                                 $("#sec_dean_personal_info").show();
                                 $("#userExistNotifyDean").hide('1000');
                               }           
                            }
                        });
               }

               
           }
           else 
           {
                $("#sec_dean_personal_info").hide();
           }
        }
        else if(acc_type == "Dean-Username") 
        {
            var dean_username = $("#dean_username").val();

           if(dean_username != "") 
           {
               var dest = "../controller/account_checker.php?acc_type=Dean&dean_username=" + dean_username;

               $.ajax({
                        url : dest,
                        success: function(result) 
                        {
                           if(result == "ACCOUNT EXIST")
                           {
                             //alert("Account Exist! Pls Choose another unique STUDENT ID");
                             $("#userExistNotifyDean").show('1000');
                             $("#sec_dean_personal_info").hide();
                           }
                           else
                           {
                             $("#sec_dean_personal_info").show();
                             $("#userExistNotifyDean").hide('1000');
                           }           
                        }
                    });
           }
           else 
           {
                $("#sec_dean_personal_info").hide();
           }
        }
        else if(acc_type == "Teacher") 
        {
           var teacher_id = $("#teacher_id").val();

           
           if(teacher_id != "") 
           {
               if(teacher_id.length < 8 || teacher_id.length > 8)
               {
                    alert("Teacher ID must contain 8 digits or letters!");
                    $("#sec_teacher_personal_info").hide();
               }
               else
               {
                   var dest = "../controller/account_checker.php?acc_type=Teacher&teacher_id=" + teacher_id;

                   $.ajax({
                            url : dest,
                            success: function(result) 
                            {
                               if(result == "ACCOUNT EXIST")
                               {
                                 //alert("Account Exist! Pls Choose another unique STUDENT ID");
                                 $("#sec_teacher_personal_info").hide();
                                 $("#userExistNotifyTeacher").show('1000');
                               }
                               else
                               {
                                 $("#sec_teacher_personal_info").show();
                                 $("#userExistNotifyTeacher").hide('1000');
                               }           
                            }
                        });
               }
               
           }
           else 
           {
                $("#sec_teacher_personal_info").hide();
           }
        }
        else if(acc_type == "Teacher-Username") 
        {
           var teacher_id = $("#teacher_username").val();

           if(teacher_id != "") 
           {
               var dest = "../controller/account_checker.php?acc_type=Teacher&teacher_username=" + teacher_id;

               $.ajax({
                        url : dest,
                        success: function(result) 
                        {
                           if(result == "ACCOUNT EXIST")
                           {
                             //alert("Account Exist! Pls Choose another unique STUDENT ID");
                             $("#userExistNotifyTeacher").show('1000');
                             $("#sec_teacher_personal_info").hide();
                           }
                           else
                           {
                             $("#sec_teacher_personal_info").show();
                             $("#userExistNotifyTeacher").hide('1000');
                           }           
                        }
                    });
           }
           else 
           {
                $("#sec_teacher_personal_info").hide();
           }
        }
        else if(acc_type == "Admin") 
        {
           var admin_id = $("#admin_username").val();

           if(admin_id != "") 
           {
               var dest = "../controller/account_checker.php?acc_type=Admin&admin_id=" + admin_id;

           
                $.ajax({
                    url : dest,
                    success: function(result) 
                    {
                       // alert(result)

                       if(result == "ACCOUNT EXIST")
                       {
                         //alert("Account Exist! Pls Choose another unique STUDENT ID");
                         $("#userExistNotifyAdmin").show('1000');
                       }
                       else
                       {
                         // $("#sec_teacher_personal_info").show();
                         $("#userExistNotifyAdmin").hide('1000');
                       }           
                    }
                });

           }
        }
    }

    function showOtherInfo() 
    {
        var student_type = $("#student_signup_type").val();

        if(student_type == "Elementary") 
        {
            $("#elementary_signup_info").show();
            $("#hsprimary_signup_info").hide();
            $("#hssecondary_signup_info").hide();
            $("#college_signup_info").hide();
        }

        if(student_type == "High School Primary") 
        {

            $("#elementary_signup_info").hide();
            $("#hsprimary_signup_info").show();
            $("#hssecondary_signup_info").hide();
            $("#college_signup_info").hide();
        }

        if(student_type == "High School Secondary") 
        {
            $("#elementary_signup_info").hide();
            $("#hsprimary_signup_info").hide();
            $("#hssecondary_signup_info").show();
            $("#college_signup_info").hide();
        }

        if(student_type == "College") 
        {
            $("#elementary_signup_info").hide();
            $("#hsprimary_signup_info").hide();
            $("#hssecondary_signup_info").hide();
            $("#college_signup_info").show();
        }

    }

    function showStudentSignUpContents()
    {
        var student_type = $("#student_type_sel_signup").val();

        if(student_type == "Elementary") 
        {
            
            $("#student_signup_content_holder").load("student_signup_section_manipulator.php?student_type=Elementary");
            /*
            $("#signup_content_elementary").show();
            $("#signup_content_hsprimary").hide();
            $("#signup_content_hssecondary").hide();
            $("#signup_content_college").hide();]
            */
        }

        if(student_type == "High School Primary") 
        {
            /*
            $("#signup_content_elementary").hide();
            $("#signup_content_hsprimary").show();
            $("#signup_content_hssecondary").hide();
            $("#signup_content_college").hide();
            */

            $("#student_signup_content_holder").load("student_signup_section_manipulator.php?student_type=HSPrim");
        }

        if(student_type == "High School Secondary")            
        {   
            $("#student_signup_content_holder").load("student_signup_section_manipulator.php?student_type=HSSec");
            /*
            $("#signup_content_elementary").hide();
            $("#signup_content_hsprimary").hide();
            $("#signup_content_hssecondary").show();
            $("#signup_content_college").hide();
            */
        }

        if(student_type == "College" || student_type == "Graduate School" )
        {
            $("#student_signup_content_holder").load("student_signup_section_manipulator.php?student_type=College");
            /*
            $("#signup_content_elementary").hide();
            $("#signup_content_hsprimary").hide();
            $("#signup_content_hssecondary").hide();
            $("#signup_content_college").show();
            */
        }


    }

    function showInfo()
    {
        var txt = $("#teacher_department").val();

        if(txt == "CCS" || txt == "BSBA" || txt == "EDUC" || txt == "CRIM" || txt == "HS-Sec" || txt == "Accountancy" || txt == "Nursing" || txt == "Grad-School")
        {
            $("#teacher_sem_sec").show();
            $("#teacher_school_year_sec").show();
        }
        else
        {
            $("#teacher_school_year_sec").show();
            $("#teacher_sem_sec").hide();
        }
    }

    function getAllCouseByDept() 
    {
        var department = $("#student_department_sel_col").val();

        // alert(department);

        $("#dynamicCourseSec").load("../controller/getAllCourseByDept.php?department=" + department);
    }

    function checkAgeField(user_type) 
    {
        if(user_type == "Dean") 
        {
            var age = $("#dean_age_txt").val();

            if(age > 100 || age < 1) 
            {
                alert("Invalid Age Please input a value raging from 20 to 100!");
                $("#dean_age_txt").val("");
            }
        }
        else if (user_type == "Teacher") 
        {
            var age = $("#teacher_age_txt").val();

            if(age > 100 || age < 1) 
            {
                alert("Invalid Age Please input a value raging from 20 to 100!");
                $("#teacher_age_txt").val("");
            }
        }
        else if(user_type == "Student")
        {
            var age = $("#student_age_txt").val();

            if(age > 100 || age < 1) 
            {
                alert("Invalid Age Please input a value raging from 5 to 100!");
                $("#student_age_txt").val("");
            }
        }
    }

</script>


<script>
  function handleChange(input) {
    if (input.value < 0) 
    {
        input.value = "";
        alert('Age value is invalid!');
    }

    if (input.value > 100)
    { 
        input.value = "";
        alert('Age value is invalid!') 
    }
  }
</script>
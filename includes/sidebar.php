<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar"> 
            <!-- User Info -->
            <div class="user-info bg-red" style="background-image: none;height: 200px;">
                <div class="image">
                    <?php  
                        $pic = $_SESSION["acc_type"];

                        $pic .= ".png";

                        $src = "../images/".$pic; 
                     ?> 
                    <img src="<?php echo $src; ?>" width="48" height="48" alt="User" />
                </div> 
                <div class="info-container"> 
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo ucfirst($_SESSION["username"]); ?></div>
 
                    <?php 
                        if($_SESSION["acc_type"] == "Student") 
                        {
                    ?>
                            <p>Fullname : <?php echo $_SESSION["fullname"]; ?></p>
                            <?php if($_SESSION["student_type"] != "College") { ?>
                                <p>Grade Level : <?php echo $_SESSION["grade_lvl"]; ?></p>
                            <?php } else { ?>
                                <p>Course And Year : <?php echo $_SESSION["year"]." - ".$_SESSION["course"]; ?></p>
                            <?php } ?>
                            <p>Department : <?php echo $_SESSION["department"]; ?></p>

                    <?php } ?>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="../pages/main_page.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>

                    <?php if ($_SESSION["acc_type"] == "Student") { ?>
                        <li>
                            <a href="../pages/student_show_subject_list.php">
                                <i class="material-icons">assessment</i>
                                <span>CURRICULUM SUBJECTS</span>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if ($_SESSION["acc_type"] == "Dean") { ?>

                       <!-- 
                            <li>
                                <a href="../pages/dean_main_eval_page.php">
                                    <i class="material-icons">supervisor_account</i>
                                    <span>Evaluate Teachers</span>
                                </a>
                            </li>
                        -->
                        
                        <li>
                            <a href="../pages/evaluation_result.php">
                                <i class="material-icons">assessment</i>
                                <span>View Faculty Evaluation Result</span>
                            </a>
                        </li>

                         <li>
                            <a href="../pages/add_teacher.php">
                                <i class="material-icons">face</i>
                                <span>Account Process</span>
                            </a>
                        </li>

                    <?php } ?>

                     <?php if ($_SESSION["acc_type"] == "Admin") { ?>
                         <li>
                            <a href="../pages/dashboard_acc_request.php">
                                <i class="material-icons">assignment_late</i>
                                <span>Account Request</span>
                            </a>
                        </li>
                        <li>
                            <a href="../pages/evaluation_result.php">
                                <i class="material-icons">assessment</i>
                                <span>Evaluation Result</span>
                            </a>
                        </li>
                        <li>
                            <a href="../pages/admin_student_process.php">
                                <i class="material-icons">assignment_ind</i>
                                <span>Student Process</span>
                            </a>
                        </li>

                        <?php if ($_SESSION["admin_type"] == "super_admin") {?>
                        <li>
                            <a href="../pages/admin_acc_list.php">
                                <i class="material-icons">assignment_ind</i>
                                <span>User Accounts</span>
                            </a>
                        </li>
                        <?php } ?>
                     <?php } ?>

                     <?php if ($_SESSION["acc_type"] == "Teacher") { ?>
                        
                        <!-- 
                            <li>
                                <a href="../pages/teacher_main_evaluation_page.php">
                                    <i class="material-icons">supervisor_account</i>
                                    <span>Evaluate Peers</span>
                                </a>
                            </li> 
                        -->
                    <?php } ?>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 - 2018 <a href="javascript:void(0);">BCEVALSYSTEM</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 0.0.2
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">Account Actions</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li>
                            <a href="../controller/logout_process.php">Logout</a>
                        </li>
                    </ul>
                </div>
               
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>
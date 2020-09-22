<?php 
    require_once '../includes/connection.php'; 
    session_start();
?>

<?php if($_GET["student_type"] == "Elementary") { ?>
 
<section id="signup_content_elementary">
    <h4 style="text-indent: 15px;">Elementary Information</h4> <hr>
    <div class="row">                            
        <div class="col-xs-4">
            <div class="input-group"> 
                <span class="input-group-addon">
                   
                </span>
                <div class="form-line">
                    <select class="form-control show-tick" name="student_elementary_grade_level" required>
                        <option value="">-- GRADE LEVEL --</option>
                        <?php for($i = 1; $i <= 6; $i++) { ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div> 

        <div class="col-xs-4">
            <div class="input-group">
                <span class="input-group-addon">
                </span>
                <div class="form-line">
                    <select class="form-control show-tick" name="student_elementary_school_year" required>
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

<?php } elseif($_GET["student_type"] == "HSPrim") { ?>

<section id="signup_content_hsprimary">
    <h4 style="text-indent: 15px;">High School Information</h4><hr>
    <div class="row">
        <div class="col-xs-4">
            <div class="input-group">
                <span class="input-group-addon">
                   
                </span>
                <div class="form-line">
                    <select class="form-control show-tick" name="student_hsprimary_grade_level" required>
                        <option value="">-- GRADE LEVEL --</option>
                        <?php for($i = 7; $i <= 10; $i++) { ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="col-xs-4">
            <div class="input-group">
                <span class="input-group-addon">
                </span>
                <div class="form-line">
                    <select class="form-control show-tick" name="student_hsprimary_school_year" required>
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


<?php } elseif($_GET["student_type"] == "HSSec") { ?>

<section id="signup_content_hssecondary">
                                <h4 style="text-indent: 15px;">High School Information</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="input-group">   
                                            <span class="input-group-addon">
                                               
                                            </span>
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="student_hssecondary_sem" required>
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
                                                <select class="form-control show-tick" name="student_hssecondary_school_year" required>
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
                                                <select class="form-control show-tick" name="student_hssecondary_year_level" required>
                                                    <option value="">-- YEAR LEVEL --</option>
                                                    <?php for($i = 11; $i <= 12; $i++) { ?>
                                                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </div>
</section>
    
<?php } elseif($_GET["student_type"] == "College") { ?>
<section id="signup_content_college">
    <h4 style="text-indent: 15px;">COLLEGE Information</h4> <hr>
    <div class="row">
         <div class="col-xs-4">
            <div class="input-group">
                <span class="input-group-addon">
                   
                </span>
                <div class="form-line">
                    <select class="form-control show-tick" name="student_department" id="student_department_sel_col" onchange="getAllCouseByDept()" required>
                        <option value="">-- Department --</option>
                        <?php 
                            $getAllDept = $conn->query("SELECT * FROM `tbl_department`");

                            while($data = $getAllDept->fetch_array()) {

                            if($data["department_code"] != "High School Primary" && $data["department_code"] != "High School Secondary" &&  $data["department_code"] != "Elementary")  {


                        ?>
                             <option value="<?php echo $data[2]; ?>"><?php echo $data[1]; ?></option>

                        <?php
                            }
                         } ?>
                    </select>
                </div>
            </div>
        </div>

       <!--  
            <div class="col-xs-4">
                <div class="input-group">
                    <div class="form-line">
                        <input type="text" class="form-control" name="college_course" placeholder="Course *" required   autofocus>
                    </div>
                </div>
            </div> 
        -->
        <div id="dynamicCourseSec">
        </div>

        <div class="col-xs-4">
            <div class="input-group">   
                <span class="input-group-addon">
                   
                </span>
                <div class="form-line">
                    <select class="form-control show-tick" name="student_college_sem" required>
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
                    <select class="form-control show-tick" name="student_college_school_year" required>
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
                    <select class="form-control show-tick" name="student_college_year_level" required>
                        <option value="">-- YEAR LEVEL --</option>
                        <?php for($i = 1; $i <= 4; $i++) { ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>
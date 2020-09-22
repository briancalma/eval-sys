<?php require_once 'connection.php'; ?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>BCEVALSYSTEM</title>
	<!-- Favicon-->
	<link rel="icon" href="../images/bcLogo.jpg" type="image/icon">  

	 
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css"> 

	<!-- Bootstrap Core Css -->
	<link href="../template/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

	 <!-- Bootstrap Select Css -->
    <link href="../template/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

	<!-- Waves Effect Css -->
	<link href="../template/plugins/node-waves/waves.css" rel="stylesheet" />

	<!-- Animation Css -->
	<link href="../template/plugins/animate-css/animate.css" rel="stylesheet" />

	 <link href="../template/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

	   <!-- Slimscroll Plugin Js -->
    <script src="../template/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="../template/plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Light Gallery Plugin Css -->
    <link href="../template/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">

	<!-- Custom Css -->
	<link href="../template/css/style.css" rel="stylesheet">

	<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
	<link href="../template/css/themes/all-themes.css" rel="stylesheet" />
	</head>


<?php if($_SESSION["acc_type"] == "Student") {?>
	<body class="theme-green">
<?php } ?>

<?php if($_SESSION["acc_type"] == "Admin"){ ?>
	<body class="theme-indigo">
<?php } ?>

<?php if($_SESSION["acc_type"] == "Dean"){ ?>
	<body class="theme-teal">
<?php } ?>

<?php if($_SESSION["acc_type"] == "Teacher"){ ?>
	<body class="theme-red">
<?php } ?>
	<!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

<?php if($_GET["acc_type"] != "Student") { ?>

<script>
	alert("Sign Up Success! Your Account Request is waiting for approval!");
	window.location = "../pages/login_user.php";
</script>

<?php } else { ?>

<script>
	alert("Sign Up Success! You can now Login!");
	window.location = "../pages/login_user.php";
</script>

<?php } ?>
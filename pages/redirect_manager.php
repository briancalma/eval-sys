<?php 
	
	// $user = $_GET["user"];

	$str = $_GET["str"];
 
	if($_GET["process"] == "evaluation_insert" || $_GET["process"] == "evaluation_update") 
	{

 ?>

<script type="text/javascript">
	alert('<?php echo $str ?>');

	window.location = "main_page.php";
</script>
 
<?php 
	} 


	if($_GET["process"] == "notvalid")
	{
?>
		<script type="text/javascript">
			alert("Cannot Print! Make sure all of your teacher data is greater than zero!");

			window.location = "evaluation_result.php";
		</script>
<?php
	}
?>
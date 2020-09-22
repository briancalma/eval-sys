<?php 
	
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "bcevalsys_db";

	$conn = new mysqli($host,$user,$pass,$db);

	$query = $conn->query("SELECT * FROM `tbl_questions`");

	$db = "bcevalsystem_db";

	$newConn =  new mysqli($host,$user,$pass,$db);

	while ($row = $query->fetch_array())
	{
		$question = $row[1];
		$section = $row[2];

		$sql = "INSERT INTO `tbl_eval_items_record` (`section_id`,`content`) VALUES('$section','$question')";
		$q = $newConn->query($sql);
	}
 ?>
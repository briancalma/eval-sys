<?php 
	
	require_once '../includes/connection.php';

	session_start();

	$process = $_GET["process"];

	if($process == "insert") 
	{
		$news_feed = $_POST["news_feed"];

		$user = $_SESSION["username"];

		$sql = "INSERT INTO `tbl_news_feed`(`post_content`,`post_creator`) VALUES ('$news_feed','$user')";

		$query = $conn->query($sql);

		header("location:../pages/main_page.php");
	}
	elseif ($process == "delete") 
	{
		$post_id = $_GET["id"];

		$sql = "DELETE FROM `tbl_news_feed` WHERE `id` = '$post_id'";

		$query = $conn->query($sql);

		if($query)
		{
			echo "ok";
		}
	}
	elseif ($process == "update") 
	{
		$post_id = $_POST["post_id"];

		$news_feed = $_POST["news_feed"];

		$sql = "UPDATE `tbl_news_feed` SET `post_content`='$news_feed' WHERE `id` = '$post_id'";

		$query = $conn->query($sql);
		
		header("location:../pages/main_page.php");
	}



 ?>
<?php 
	$ope = $_GET["operation"];
	
	if($ope != "daya") 
	{
		$max = $_GET["max"];

		$i = random_int(1, $max);

		echo $i."<h1>Congrats!</h1>";	
	}
	else
	{
		

		$array = [5,4,10,17];

		$i = random_int(0,sizeof($array) - 1);

		echo $array[$i];
	}

	
 ?>
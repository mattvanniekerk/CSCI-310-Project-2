<?php
	
	require_once('../class.paper.php');

	$papers = [];
	$file;

	for ($i = 1; $i <= 10; $i++) {
		$file = file_get_contents("database/papers/paper".$i.".txt");
		$papers[$i] = new Paper();
		echo $file;
	}
?>
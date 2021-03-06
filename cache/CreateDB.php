<html>
<head>
	<title></title>
</head>
<body>
	<?php
	
		require_once('/var/www/html/project/class.paper.php');

		$num_papers = 12;

		$papers = [];
		$file;

		for ($i = 0; $i < $num_papers; $i++) {
			$file = file_get_contents("cache/papers/paper".($i+1).".txt");
			$sections = explode("(/section)", $file);
			
			$papers += ["paper".($i+1) => [
				"title" => $sections[0],
				"authors" => explode(", ", $sections[1]),
				"conference" => $sections[2],
				"abstract" => $sections[3],
				"keywords" => explode(", ", $sections[4]),
				"content" => $sections[5],
				"link" => $sections[6],
				"bibtex" => $sections[7]
				]];
		}

		file_put_contents('cache/papers.json', json_encode($papers));
	?>
</body>
</html>
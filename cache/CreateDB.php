<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	
		require_once('/var/www/html/project/class.paper.php');

		$papers = [];
		$file;



		for ($i = 0; $i < 10; $i++) {
			$file = file_get_contents("database/papers/paper".($i+1).".txt");
			$sections = explode("(/section)", $file);
			
			$papers[$i] = new Paper();
			$papers[$i]->setTitle($sections[0]);
			$papers[$i]->setAuthors(explode(", ", $sections[1]));
			$papers[$i]->setConference($sections[2]);
			$papers[$i]->setAbstract($sections[3]);
			$papers[$i]->setContent($sections[4]);
			$papers[$i]->setLink($sections[5]);
			$papers[$i]->setBibtex($sections[6]);
			/*
			echo $papers[$i]->getTitle();
			for ($j; $j <= count($papers[$i]->getAuthors()); $j++) {
				echo $papers[$i]->getAuthors()[$j];
			}
			echo $papers[$i]->getConference();
			echo $papers[$i]->getAbstract();
			echo $papers[$i]->getContent();
			echo $papers[$i]->getLink();
			echo $papers[$i]->getBibtex();
			*/
		}
		
		$p = [
			"paper1" => [
				"title" => $papers[0]->getTitle(),
				"authors" => $papers[0]->getAuthors(),
				"conference" => $papers[0]->getConference(),
				"abstract" => $papers[0]->getAbstract(),
				"content" => $papers[0]->getContent(),
				"link" => $papers[0]->getLink(),
				"bibtex" => $papers[0]->getBibtex()
			],
			"paper2" => [
				"title" => $papers[1]->getTitle(),
				"authors" => $papers[1]->getAuthors(),
				"conference" => $papers[1]->getConference(),
				"abstract" => $papers[1]->getAbstract(),
				"content" => $papers[1]->getContent(),
				"link" => $papers[1]->getLink(),
				"bibtex" => $papers[1]->getBibtex()
			]
		];

		for ($i = 0; $i < 10; $i++) {
			array_push($p, $papers[$i]);
		}

		file_put_contents('cache/papers.json', json_encode($p));
		/*
		$cache = fopen('papers.json', 'w');
		fwrite($cache, json_encode($papers));
		fclose($cache);
		*/
	?>
</body>
</html>
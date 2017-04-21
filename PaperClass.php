<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	
	class Paper {
		private $title;
		private $authors = [];
		private $conference;
		private $abstract;
		private $content;

		public function getTitle(){
			return $this->title;
		}

		public function setTitle($title){
			$this->title = $title;
		}

		public function getAuthors(){
			return $this->authors;
		}

		public function setAuthors($authors){
			$this->authors = $authors;
		}

		public function getConference(){
			return $this->conference;
		}

		public function setConference($conference){
			$this->conference = $conference;
		}

		public function getAbstract(){
			return $this->abstract;
		}

		public function setAbstract($abstract){
			$this->abstract = $abstract;
		}

		public function getContent(){
			return $this->authors;
		}

		public function setContent($authors){
			$this->authors = $authors;
		}
	}

?>
</body>
</html>
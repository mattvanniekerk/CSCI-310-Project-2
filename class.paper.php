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
		private $keywords = [];
		private $content;
		private $link;
		private $bibtex;

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

		public function getKeywords(){
			return $this->keywords;
		}

		public function setKeywords($keywords){
			$this->keywords = $keywords;
		}

		public function getContent(){
			return $this->content;
		}

		public function setContent($content){
			$this->content = $content;
		}

		public function getLink(){
			return $this->link;
		}

		public function setLink($link){
			$this->link = $link;
		}

		public function getBibtex(){
			return $this->bibtex;
		}

		public function setBibtex($bibtex){
			$this->bibtex = $bibtex;
		}
	}

?>
</body>
</html>
<?PHP
	class post{
		private $id;
		private $name;
		private $titre;
		private $text;		

		
		function __construct($id, $name, $titre, $text )
        {
			$this->id = $id;
            $this->name = $name;
            $this->titre = $titre;
            $this->text = $text;
		}
		
		function getID(){
			return $this->id;
		}
		function getName(){
			return $this->name;
		}
		function getTitre(){
			return $this->titre;
		}
		function getText(){
			return $this->text;
		}
		
		function setName($name): void{
			$this->name=$name;
		}
		function setMail($titre): void{
			$this->titre=$titre;
		}
		function setType($text): void{
			$this->text=$text;
		}

	}

?>
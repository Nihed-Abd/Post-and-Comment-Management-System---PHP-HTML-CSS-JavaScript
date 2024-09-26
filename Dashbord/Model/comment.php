<?PHP
	class comment{
		private $id;
		private $name;
		private $comment;	
		private $idPost;
		
		function __construct($name, $comment ,$idPost)
        {
            $this->name = $name;
			$this->comment = $comment;
			$this->idPost = $idPost;
		}
		
		function getName(){
			return $this->name;
		}
		function getComment(){
			return $this->comment;
		}
		function getidPost(){
			return $this->idPost;
		}
		
		function setName($comment): void{
			$this->comment=$comment;
		}
		function setComment($comment): void{
			$this->comment=$comment;
		}
		function setIdPost($comment): void{
			$this->comment=$comment;
		}
	}

?>
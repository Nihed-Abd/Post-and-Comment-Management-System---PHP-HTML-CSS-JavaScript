<?PHP
	
	include_once ("D:/xampp/htdocs/forum/config.php");
	include ("Dashbord/Model/post.php");

	class postC {
		function ajouterPost($post){
			 $sql="INSERT INTO post (id, name, titre, text )
			 VALUES (:id,:name, :titre, :text)";
			 $db = new config();
             $conn=$db->getConnexion();
			 try{
			 	$query = $conn->prepare($sql);
			 	$query->execute([
				'id' => $post->getID(),
				'name' => $post->getName(),
				'titre' => $post->getTitre(),
		 		'text' => $post->getText()
			]);			
			}
			catch (Exception $e){
			echo 'Erreur: '.$e->getMessage();
			}
		}
		
		function afficherPost(){
			$sql="SELECT * FROM post";
			$conn = new config();
            $db=$conn->getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
			
		}


        function supprimerPost($idd){
			$sql="DELETE FROM post WHERE id= :id";
			$conn = new config();
            $db=$conn->getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$idd);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

        function modifierPost($post, $idPost){
			
			try {
				
				$conn = new config();
            	$db=$conn->getConnexion();
				$query = $db->prepare(
					"UPDATE post SET 
						name = :name,
						titre = :titre,
						text = :text
					    WHERE id = :id"
				);
				$query->execute([
					'name' => $post->getName(),
					'titre' => $post->getTitre(),
					'text' => $post->getText(),			
					'id' => $idPost
				]);
				echo $query->execute;
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}


        function recupererPost($idPost){
			$sql="SELECT * from post where id=$idPost";
			$conn = new config();
            $db=$conn->getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$post=$query->fetch();
				return $post;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

	}

?>
<?PHP
	include ("Dashbord/Controller/commentC.php");

	$commentC=new commentC();
	$listeComment=$commentC->afficherCommentPost($_GET['id']);
    
if(isset($_POST['submit']))
{
    $listeComment=$commentC->afficherCommentPost($_GET['id']);
}

if(isset($_POST['ajout']))
{
    header ('Location:../forum/addcomment.php');
}

?>

<!doctype html>
<html lang="en">
  <head>
  	<title> </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="scss/style.css">

	</head>

	<body>
	<section class="ftco-section">
		<div class="container">
            <h3 class="mb-4 text-center"><FONT COLOR="WHITE"><strong>Comments</strong></FONT></h3>
            <br>
            <br>
            <div class="form-group">
                <a href="http://localhost/forum/addpost.php">
                    <button type="ajout" name="actualiser" value="Ajouter" class="btn btn-primary">
                        ADD NEW POST 
                    </button>
                </a>
                <a href="http://localhost/forum/addcomment.php">
                    <button type="ajout" name="actualiser" value="Ajouter" class="btn btn-primary">
                        ADD NEW COMMENT 
                    </button>
                </a>
                <a href="forum.html">
                    <button type="ajout" name="actualiser" value="Ajouter" class="btn btn-primary">
                        HOME 
                    </button>
                </a>
            </div>
            <table id="myTable" class="table table-striped" >  
                <thead>
                    <th><FONT COLOR="WHITE">ID</FONT></th>
                    <th><FONT COLOR="WHITE">Name</FONT></th>
                    <th><FONT COLOR="WHITE">Comment</FONT></th>
                    <th><FONT COLOR="WHITE">ID post commentée</FONT></th>
                    <th><FONT COLOR="WHITE"></FONT></th>
                    <th><FONT COLOR="WHITE"></FONT></th>
                </thead>
                <tbody>
                    <?PHP
				        foreach($listeComment as $comment){
			        ?>
                    <tr>
                        <td class="align-img">
                            <FONT COLOR="WHITE"><?PHP echo $comment['id']; ?></FONT>
                        </td>
                        <td class="align-img">
                            <FONT COLOR="WHITE"><?PHP echo $comment['name']; ?></FONT>
                        </td>
                        <td class="align-img">
                            <FONT COLOR="WHITE"><?PHP echo $comment['comment']; ?></FONT>
                        </td>
                        <td class="align-img">
                            <FONT COLOR="WHITE"><?PHP echo $comment['idPost']; ?></FONT>
                        </td>
                        <td>
                            <div class="form-group">
                                <form method="POST" action="deletecomment.php">
                                    <input type="submit" name="Supprimer" value="Supprimer" class="btn btn-primary">
                                    <input type="hidden" value=<?PHP echo $comment['id']; ?> name="id">
                                </form>
                            </div>
                        </td>
                        
                    </tr>
                    <?PHP
				        }
			        ?>
                </tbody>
            </table>
            
		</div>
	</section>


	<script src="js/jquery.min.js"></script>
  	<script src="js/popper.js"></script>
  	<script src="js/bootstrap.min.js"></script>
  	<script src="js/jquery.validate.min.js"></script>
  	<script src="js/main.js"></script>

	</body>
</html>
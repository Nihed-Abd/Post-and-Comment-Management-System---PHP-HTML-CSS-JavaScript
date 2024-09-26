<?PHP
	include ("Dashbord/Controller/postC.php");

	$postC=new postC();
	$listePost=$postC->afficherPost();
    
if(isset($_POST['submit']))
{
    $listePost=$postC->afficherPost();
}

if(isset($_POST['ajout']))
{
    header ('Location:../forum/addpost.php');
}

?>

<!doctype html>
<html lang="en">
  <head>
  	<title>forum</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="scss/style.css">

	</head>

	<body>
	<section class="ftco-section">
		<div class="container">
            <h3 class="mb-4 text-center"><FONT COLOR="WHITE"><strong>forum</strong></FONT></h3>
            <br>
            <br>
            <div class="form-group">
                <a href="http://localhost/forum/addpost.php">
                    <button type="ajout" name="actualiser" value="Ajouter" class="btn btn-primary">
                        ADD NEW Post
                    </button>
                </a>
                <a href="forum.html">
                    <button type="home" name="actualiser" value="home" class="btn btn-primary">
                        HOME
                    </button>
                </a>
            </div>
            <table id="myTable" class="table table-striped" >  
                <thead>
                    <th><FONT COLOR="WHITE">ID</FONT></th>
                    <th><FONT COLOR="WHITE">Name</FONT></th>
                    <th><FONT COLOR="WHITE">Titre</FONT></th>
                    <th><FONT COLOR="WHITE">Text</FONT></th>
                    <th><FONT COLOR="WHITE"></FONT></th>
                    <th><FONT COLOR="WHITE"></FONT></th>
                </thead>
                <tbody>
                    <?PHP
				        foreach($listePost as $post){
			        ?>
                    <tr>
                        <td class="align-img">
                            <FONT COLOR="WHITE"><?PHP echo $post['id']; ?></FONT>
                        </td>
                        <td class="align-img">
                            <FONT COLOR="WHITE"><?PHP echo $post['name']; ?></FONT>
                        </td>
                        <td class="align-img">
                            <FONT COLOR="WHITE"><?PHP echo $post['titre']; ?></FONT>
                        </td>
                        <td class="align-img">
                            <FONT COLOR="WHITE"><?PHP echo $post['text']; ?></FONT>
                        </td>
                        <td>
                            <div class="form-group">
                                <form method="POST" action="../forum/delete.php">
                                    <input type="submit" name="Supprimer" value="Supprimer" class="btn btn-primary">
                                    <input type="hidden" value=<?PHP echo $post['id']; ?> name="id">
                                </form>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <a href="../forum/tablecomment.php?id=<?PHP  echo $post['id']?>">
                                    <input type="submit" value="consulter" class="btn btn-primary">
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <a href="../forum/modifypost.php?id=<?PHP echo $post['id']; ?>">
                                    <input type="submit" value="Modfier" class="btn btn-primary">
                                </a>
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
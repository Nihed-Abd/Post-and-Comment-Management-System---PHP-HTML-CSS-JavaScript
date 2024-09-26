<?php
    require_once 'Dashbord/Controller/commentC.php';
    require_once 'Dashbord/Model/comment.php';
    require_once 'Dashbord/Controller/postC.php';

    $error = "";
    // create user
    $comment = null;
    // create an instance of the controller
    $postC= new postC();
    $commentC = new commentC();
    if (
        isset($_POST["name"]) &&
        isset($_POST["comment"]) &&
        isset($_POST["idPost"]) 
        
    ) {
        if (
            !empty($_POST["name"])  && 
            !empty($_POST["comment"])  && 
            !empty($_POST["idPost"])
            
        )
         {
            $comment = new comment(
                $_POST['name'], 
                $_POST['comment'], 
                $_POST['idPost']
            );
			$commentC->ajouterComment($comment);
            header ('Location:tableforum.php');
        }
        else
            $error = "Missing information";
    }  

    $liste=$postC->afficherPost();
?>

<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Forum</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    
    <form method="POST">
      <h1>ADD COMMENT</h1>
      <div class="separation"></div>
        <div class="corps-formulaire">
          <div class="gauche">
            <div class="groupe">
             <!-- <label>ID</label>
              <input type="text" autocomplete="off" placeholder="" name="id"/>
                        </div>-->
                        <div class="groupe">
            <label>YOUR NAME :</label>
            <input type="text" autocomplete="off" placeholder="Name" name="name" id="name"/>
            <i class="fas fa-user"></i>
          </div>
                        <div class="groupe">
              <label>Your comment :</label>
             <textarea type="text" autocomplete="off" placeholder="Comment" name="comment"></textarea>
            </div>
            <div class="groupe">
              <label>ID Post à commenter :</label>
              <br>
              <select name="idPost" class="form-control p-6">
                <option value="">Select An ID</option>
                <?php foreach($liste as $post){ ?>
                <option value="<?php echo $post['id'] ?>"><?php echo $post['id'] ?></option>
                <?php } ?>
              </select>
            </div>
                </div>
            <div class="gauche">
              <div class="pied-formulaire" align="center" name="submit" min="1" max="500" required >
                <a href="../forum/tableforum.php"><button>ADD</button></a>
              </div>
            </div>
                </div>
          </div>
        </div>
      </div>
    </form>
  </body>
</html>

<?php
	include 'Dashbord/Controller/postC.php';
  	include_once 'Dashbord/Model/post.php';


	$postC = new postC();
	$error = "";
	
	if (
    isset($_POST["id"]) &&
    isset($_POST["name"]) &&
    isset($_POST["titre"]) &&
    isset($_POST["text"]) 
       
	){
		if (
      !empty($_POST["id"]) && 
      !empty($_POST["name"]) &&
      !empty($_POST["titre"]) &&
      !empty($_POST["text"])
        ) {
            $post = new post(
              $_POST['id'], 
              $_POST['name'],
              $_POST['titre'],
              $_POST['text']
			);
			
            $postC->modifierPost($post, $_GET['id']);
            header ('Location:../forum/adminpost.php');
        }
        else
        $error = "Missing information";
	}

?>

<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Crud</title>
    <link rel="stylesheet" href="css/style.css" />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
  <?php 
			if (isset($_GET['id'])){
			$post = $postC->recupererPost($_GET['id']);
		?>
    <form method="POST">
      <h1>MODIFY POST</h1>
      <div class="corps-formulaire">
        <div class="gauche">
          <div class="groupe">
          <div class="separation"></div>
    <div class="corps-formulaire">
        <div class="gauche">
          <div class="groupe">
            <label>Identifiant :</label>
            <input type="text" autocomplete="off" placeholder="Identifiant" value="<?php echo $post['id'];?>" name="id" id="id"/>
            <i class="fas fa-user"></i>
          </div>
          <div class="groupe">
            <label>YOUR NAME :</label>
            <input type="text" autocomplete="off" placeholder="Name" value="<?php echo $post['name'];?>" name="name" id="name"/>
            <i class="fas fa-user"></i>
          </div>
          <div class="groupe">
            <label>TITRE :</label>
            <input type="text" autocomplete="off" placeholder="titre" value="<?php echo $post['titre'];?>" name="titre" id="titre"/>
          </div>
        </div>
        <div class="droite">
          <div class="groupe">
            <label>MESSAGE</label>
            <textarea placeholder="Saisissez ici..." name="text" id="text"><?php echo  $post['text'];?></textarea>
          </div>
        </div>
      </div>
      <?php
											}
										?>
      </div>
      <div class="gauche">
        <div class="pied-formulaire" align="center" id="message" name="modifier" min="1" max="500" required >
        <button>Modify post</button>
        </div>
    </form>
    
  </body>
</html>

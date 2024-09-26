<?php
    require_once 'Dashbord/Controller/postC.php';
    require_once 'Dashbord/Model/post.php';

    $error = "";
    // create user
    $post = null;
    // create an instance of the controller
    $postC = new postC();
    if (
        isset($_POST["id"]) &&
        isset($_POST["name"]) &&
        isset($_POST["titre"]) &&
        isset($_POST["text"]) 
        )
        
     {
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
    <link rel="stylesheet" href="css/style.css"/>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
      rel="stylesheet"
    />
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  <body>
    <form method="POST" name="form">
      <h1>ADD FORUM</h1>
      <div class="separation"></div>
      <div class="corps-formulaire">
        <div class="gauche">
          <div class="groupe">
            <label>Identifiant :</label>
            <input type="text" autocomplete="off" placeholder="Identifiant" name="id" id="id"/>
            <i class="fas fa-user"></i>
          </div>
          <div class="groupe">
            <label>YOUR NAME :</label>
            <input type="text" autocomplete="off" placeholder="Nom" name="name" id="name"/>
            <i class="fas fa-user"></i>
          </div>
          <div class="groupe">
            <label>SUJET :</label>
            <input type="text" autocomplete="off" placeholder="Votre sujet" name="titre" id="titre"/>
          </div>
        </div>
        <div class="droite">
          <div class="groupe">
            <label>POST :</label>
            <textarea placeholder="Saisissez ici..." name="text" id="text"></textarea>
          </div>
        </div>
      </div>
      <div class="gauche">
        <div class="pied-formulaire" align="center" value="ok" min="1" max="500" required >
        <div class="g-recaptcha"  data-sitekey="6LcI7D0jAAAAAEP-FxFE0uq6F-4MZB-LcJO8jKlj"></div>
           <a><button type="submit" name="submit" >ADD </button></a>
        </div> 
        </form>
  </body>
</html>

<?php
if(isset($_POST['submit']))
{

function CheckCaptcha($userResponse) {
        $fields_string = '';
        $fields = array(
            'secret' => '6LcI7D0jAAAAAJ7FIG5kFJlWgaDHOdn8G-GrE1SD',
            'response' => $userResponse
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $res = curl_exec($ch);
        curl_close($ch);

        return json_decode($res, true);
    }


    // Call the function CheckCaptcha
    $result = CheckCaptcha($_POST['g-recaptcha-response']);
    if ($result['success']) {
      $postC->ajouterPost($post);
      header('Location:../forum/tableforum.php');
    }
    else{ 
      echo '<script>alert("error message !")</script>';
    }
}
?>

<?php session_start();
include_once 'config/connect.php';
include_once 'function/connexion.class.php';
$bdd = bdd();
if(isset($_POST['pseudo']) AND isset($_POST['mdp'])){
    $connexion = new connexion($_POST['pseudo'],$_POST['mdp']);
    // echo "<pre>";
    // var_dump($connexion);die;
    $verif = $connexion->verif();
    if($verif == "ok"){
      if($connexion->session()){
          header('Location: index.php');
      }
    }
    else {
        $erreur = $verif;
    }
}
?>
<!DOCTYPE html>
<meta charset='utf-8' />
<title>Mon super forum !</title>
<link rel="stylesheet" type="text/css" href="assets/style.css" />
<link rel="shortcut icon" href="images/favicon.ico" />
<link href='http://fonts.googleapis.com/css?family=Karla' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<body>
  <div class="container">
  <div class="row">
    <div class="col-lg-10 col-xl-9 mx-auto">
      <div class="card card-signin flex-row my-5">
        <div class="card-img-left d-none d-md-flex">
           <!-- Background image for card set in CSS! -->
        </div>
        <div class="card-body">
          <h5 class="card-title text-center">Connexion</h5>
          <form class="form-signin" method="post" action="connexion.php">
            <div class="form-label-group">
              <input name="pseudo" type="text" id="inputUserame" class="form-control" placeholder="Pseudo" required autofocus>
            </div>
            <div class="form-label-group">
              <input name="mdp" type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
            </div>
            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Connexion</button>
            <a class="d-block text-center mt-2 small" href="inscription.php">Inscription</a>
            <?php
                if(isset($erreur)){
                    echo $erreur;
                }
                ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>

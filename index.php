<?php session_start();
include_once 'config/connect.php';
include_once 'function/addPost.class.php';
$bdd = bdd();

/* Si nous ne somme pas connecté */
  if(!isset($_SESSION['id'])){
      header('Location: inscription.php');
  }
  else {
      if(isset($_POST['name']) AND isset($_POST['sujet'])){
      $addPost = new addPost($_POST['name'],$_POST['sujet']);
      $verif = $addPost->verif();
      if($verif == "ok"){
          if($addPost->insert()){

          }
      }
      else { /* Si nous avons une erreur */
          $erreur = $verif;
          }
      }
      ?>
<?php include 'layouts/header.php'; ?>
<body>
    <div id="Cforum">
        <?php
        if(isset($_GET['categorie'])){ /* Si on est dans une categorie */
            $_GET['categorie'] = htmlspecialchars($_GET['categorie']);
            ?>
            <a href="index.php">Retour aux catégories</a>
            <a href="addSujet.php?categorie=<?php echo $_GET['categorie']; ?>">Ajouter un sujet</a>
            <div class="categories">
              <h2>Catégorie : <?php echo $_GET['categorie']; ?></h2>
            </div>
            <div class="container">
                <div class="card-deck">
            <?php
            $requete = $bdd->prepare('SELECT * FROM sujet WHERE categorie = :categorie ');
            $requete->execute(array('categorie'=>$_GET['categorie']));
            while($reponse = $requete->fetch()){
            ?>
                <div class="card mb-4">
                    <img class="card-img-top" style="width: 253px;" src="assets/images/<?php echo $reponse[3]; ?>" class="mr-3" alt="...">
                    <div class="card-body">
                        <a class="card-title" href="index.php?sujet=<?php echo $reponse['name'] ?>"><h1><?php echo $reponse['name'] ?></h1></a>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <?php
                    }
                ?>
                </div>
          </div>
          <?php
          }
        else if(isset($_GET['sujet'])){ /* Si nous sommes dans un sujet */
            $_GET['sujet'] = htmlspecialchars($_GET['sujet']);

            ?>
            <h5><a href="index.php">Retour aux catégories</a></h5>
            <div class="  ">
              <div class="container categories">
                <h2>Titre du sujet : <?php echo $_GET['sujet']; ?></h2>
                <img style="width: 100px;" src="assets/images/<?php echo $reponse[3]; ?>" class="mr-3" alt="...">
              </div>

          <?php
          $requete = $bdd->prepare('SELECT * FROM postSujet WHERE sujet = :sujet ');
          $requete->execute(array('sujet'=>$_GET['sujet']));
          while($reponse = $requete->fetch()){
              ?>
              <div class="mb-3 container">
                  <div class="panel panel-default">
                  <?php
                   $requete2 = $bdd->prepare('SELECT * FROM membres WHERE id = :id');
                   $requete2->execute(array('id'=>$reponse['propri']));
                   $membres = $requete2->fetch();
                   echo '<div class="panel-heading">';
                   echo '<strong>'; echo $membres['pseudo']; echo '</strong> '; echo '<span class="text-muted">commenté le '; echo date_format(new DateTime($reponse['date']), 'd/m/Y à H:i'); echo '</span>';
                   echo '</div>';
                   echo '<div class="panel-body">';
                   echo $reponse['contenu'];
                  ?>
                      </div>
                  </div>
              </div>
            </div>
        <?php
        }
        ?>
            <form method="post" action="index.php?sujet=<?php echo $_GET['sujet']; ?>">
              <div class="form-group container">
                <textarea class="form-control" rows="4" name="sujet" placeholder="Votre message..." ></textarea>
                <input type="hidden" name="name" value="<?php echo $_GET['sujet']; ?>" />
                <button type="submit" class="mt-3 btn btn-primary">Ajouter un commentaire</button>
                <?php
                if(isset($erreur)){
                    echo $erreur;
                }
                ?>
              </div>
            </form>
        <?php
        } else { /*Si on est sur la page normal*/
          if ($_SESSION['admin'] == 1) {
            ?><a href="addCategorie.php?categorie">Ajouter une categorie</a>
          <?php
        } else {
          ?><h2>Liste des categories :</h2><?php
        }
          ?>
                <ul class="list-unstyled">
                <?php $requete = $bdd->query('SELECT * FROM categories');
                while($reponse = $requete->fetch()){
                ?>
                    <li class="media d-flex align-items-center">
                      <img style="width: 100px;" src="assets/images/<?php echo $reponse[2]; ?>" class="mr-3" alt="...">
                      <div class="media-body d-flex align-items-center">
                        <h5><a href="index.php?categorie=<?php echo $reponse['name']; ?>"><?php echo $reponse['name']; ?></a></h5><button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      </div>
                    </li>
                    </ul>
                <?php

            }
        }
        ?>
      </ul>
    </div>
</body>
</html>
    <?php
}
?>

<?php session_start();
include_once 'config/connect.php';
include_once 'function/addCategorie.class.php';
$bdd = bdd();

// if(isset($_POST['name'])){
//     $addCategorie = new addCategorie($_POST['name']);
//         if($addCategorie->insert()){
//             header('Location: index.php');
//         }
// }
if(isset($_POST['name']) AND isset($_POST['moveFile'])){
  $image_categorie = $_FILES['image_categorie']['name'];
  $tempName = $_FILES['image_categorie']['tmp_name'];
  if (isset($image_categorie)) {
    if (!empty($image_categorie)) {
      $location = "assets/images/";
      if (move_uploaded_file($tempName, $location.$image_categorie)) {
      $addCategorie = new addCategorie($_POST['name'], $_FILES['image_categorie']);
          if($addCategorie->insert()){
              header('Location: index.php');
          }
        }
    }
  }
}

?>
<?php include 'layouts/header.php'; ?>
<body>
    <a href="index.php">Accueil</a>
 <h1>Ajouter une categorie</h1>
            <div id="Cforum">
                <form method="post" action="addCategorie.php?categorie=<?php echo $_GET['categorie']; ?>" enctype="multipart/form-data">
                    <p>
                        <br><input type="text" name="name" placeholder="Nom de la categorie" required/><br>
                        <input type="file" name="image_categorie" value="">
                        <input type="hidden" value="<?php echo $_GET['categorie']; ?>" name="categorie" />
                        <input type="submit" name="moveFile"value="Ajouter la categorie" />
                        <?php
                        if(isset($erreur)){
                            echo $erreur;
                        }
                        ?>
                    </p>
                </form>
            </div>
</body>
</html>

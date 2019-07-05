<?php session_start();
include_once 'config/connect.php';
include_once 'function/addSujet.class.php';
$bdd = bdd();


// if(isset($_POST['name']) AND isset($_POST['sujet'])){
//     $addSujet = new addSujet($_POST['name'],$_POST['sujet'],$_POST['categorie']);
//     $verif = $addSujet->verif();
//     if($verif == "ok"){
//         if($addSujet->insert()){
//             header('Location: index.php?sujet='.$_POST['name']);
//         }
//     }
//     else {/*Si on a une erreur*/
//         $erreur = $verif;
//     }
// }
if(isset($_POST['name']) AND isset($_POST['sujet']) AND isset($_POST['moveFile'])){
  $image_sujet = $_FILES['image_sujet']['name'];
  $tempName = $_FILES['image_sujet']['tmp_name'];
  if (isset($image_sujet)) {
    if (!empty($image_sujet)) {
      $location = "assets/images/";
      if (move_uploaded_file($tempName, $location.$image_sujet)) {
      $addSujet = new addSujet($_POST['name'],$_POST['sujet'],$_POST['categorie'], $_FILES['image_sujet']);
          if($addSujet->insert()){
              header('Location: index.php');
        }
      }
    }
  }
  else {/*Si on a une erreur*/
        $erreur = $verif;
    }
}

?>
<?php include 'layouts/header.php'; ?>
<body>
    <a href="index.php">Accueil</a>
    <div class="container">
	<div class="row">
	    <div class="col-md-8 col-md-offset-2">
    		<h1>Ajouter un sujet</h1>
    		<form method="post" action="addSujet.php?categorie=<?php echo $_GET['categorie']; ?>" enctype="multipart/form-data">
    		    <div class="form-group">
    		        <label for="title">Titre <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="name" />
    		    </div>
            <label for="title">Image du sujet</label>
          <div class="custom-file">
            <input type="file" name="image_sujet" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
    		    <div class="form-group">
    		        <label for="description">Description</label>
    		        <textarea rows="5" class="form-control" name="sujet" ></textarea>
    		    </div>
    		    <div class="form-group">
    		        <p><span class="require">*</span> - Champs requis</p>
    		    </div>
    		    <div class="form-group">
    		        <input type="hidden" value="<?php echo $_GET['categorie']; ?>" name="categorie" />
                <button type="submit" name="moveFile" class="btn btn-primary">Ajouter le sujet</button>
    		        <button class="btn btn-default"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour</a></button>
    		    </div>
    		</form>
		</div>
	</div>
</div>
</body>
</html>

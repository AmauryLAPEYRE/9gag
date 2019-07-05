<?php include_once 'config/connect.php';

class addSujet {
    private $name;
    private $sujet;
    private $categorie;
    private $bdd;
    private $image_sujet;
    public function __construct($name,$sujet,$categorie,$image_sujet) {
        $this->name = htmlspecialchars($name);
        $this->sujet = htmlspecialchars($sujet);
        $this->categorie = htmlspecialchars($categorie);
        $this->image_sujet = $image_sujet;
        $this->bdd = bdd();
    }
    public function verif(){
        if(strlen($this->name) > 5 AND strlen($this->name) < 60 ){ /*Si le nom du sujet est bon**/
            if(strlen($this->sujet) > 0){ /*Si on a bien un sujet*/
                return 'ok';
            }
            else {/*Si on a pas de contenu*/
                $erreur = 'Veuillez entrer le contenu du sujet';
                return $erreur;
            }
        }
        else { /*Si le nom du sujet est mauvais*/
            $erreur = 'Le nom du sujet doit contenir entre 5 et 20 caractères';
            return $erreur;
        }
    }
    public function insert(){
        $requete = $this->bdd->prepare('INSERT INTO sujet(name,categorie,image_sujet) VALUES(:name,:categorie,:image_sujet)');
        $requete->execute(array(
          'name'=> $this->name,
          'categorie'=> $this->categorie,
          'image_sujet' => $this->image_sujet['name'],
        ));
        $requete2 = $this->bdd->prepare('INSERT INTO postSujet(propri,contenu,date,sujet,image_sujet) VALUES(:propri,:contenu,NOW(),:sujet,:image_sujet)');
        $requete2->execute(array(
          'propri'=> $_SESSION['id'],
          'contenu'=>  $this->sujet,
          'sujet'=>  $this->name,
          'image_sujet' => $this->image_sujet['name'],
        ));
        return true;
    }
}

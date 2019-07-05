<?php include_once 'config/connect.php';

class connexion{

    private $pseudo;
    private $mdp;
    private $admin;
    private $bdd;

  public function __construct($pseudo,$mdp/*,$admin*/) {
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
        //$this->admin = $admin;
        $this->bdd = bdd();
    }

    public function verif(){
        $requete = $this->bdd->prepare('SELECT * FROM membres WHERE pseudo = :pseudo');
        $requete->execute(array(
          'pseudo'=> $this->pseudo
        ));
        $reponse = $requete->fetch();
        $this->admin = $reponse['admin'];
        //var_dump($this->admin);die;
        if($reponse){
            if($this->mdp == $reponse['mdp']){
                return 'ok';
            }
            else {
                $erreur = '<div class="mt-3 alert alert-danger" role="alert">Le mot de passe est incorrecte</div>';
                return $erreur;
            }
        }
        else {
          $erreur = '<div class="mt-3 alert alert-danger" role="alert">Le pseudo est innexistant</div>';
          return $erreur;
         }
    }

    public function session(){
        $requete = $this->bdd->prepare('SELECT id FROM membres WHERE (pseudo, admin) = (:pseudo, :admin) ');
        $requete->execute(array(
          'pseudo'=>  $this->pseudo,
          'admin' => $this->admin
        ));
        $requete = $requete->fetch();
        $_SESSION['id'] = $requete['id'];
        $_SESSION['pseudo'] = $this->pseudo;
        $_SESSION['admin'] = $this->admin;
        return 1;
    }


}

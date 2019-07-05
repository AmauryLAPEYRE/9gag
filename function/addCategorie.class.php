<?php include_once 'config/connect.php';

class addCategorie{

    private $name;
    private $image_categorie;
    private $bdd;
    public function __construct($name, $image_categorie) {
        $this->name = htmlspecialchars($name);
        $this->image_categorie = $image_categorie;
        $this->bdd = bdd();
    }
    public function insert(){
        $requete2 = $this->bdd->prepare('INSERT INTO categories(name, image_categorie) VALUES(:name, :image_categorie)');
        $requete2->execute(array(
          'name' =>  $this->name,
          'image_categorie' =>  $this->image_categorie['name'],
        ));
        return 1;
    }
}

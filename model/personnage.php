<?php
//Je créer ma classe personnage dont le nommage par convention fera reference à l'entité SQL sur laquelle de modéle repose 
class personnage extends database
{
    //Je déclare les attributs de mon modéle qui feront reference aux propriétés de L'entité SQL concerné 
    public $id = 0;
    public $surname = "";
    public $atk = 0;
    public $life = "";
    public $color = "";

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Method qui retourne un TOKEN 
     * @return HASH
     */
    public function generateCSRFToken()
    {
        $length = 10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ%=';
        $character = strlen($characters);
        $token = '';
        for ($i = 0; $i < $length; $i++) {
            $token .= $characters[mt_rand(0, $character - 1)];
        }
        return $token;
    }

    /**
     * Method qui permet d'inseret un personnage en base de donnée
     *  @return bool
     */
    public function createPersonnage()
    {
        $req = 'INSERT INTO `personnages`(`surname`, `atk`, `life`, `color`) VALUES (:surname , :atk , :life ,:color);';
        $insertPersonnage = $this->db->prepare($req);
        $insertPersonnage->bindValue(':surname', $this->surname, PDO::PARAM_STR);
        $insertPersonnage->bindValue(':atk', $this->atk, PDO::PARAM_INT);
        $insertPersonnage->bindValue(':life', $this->life, PDO::PARAM_STR);
        $insertPersonnage->bindValue(':color', $this->color, PDO::PARAM_STR);
        return $insertPersonnage->execute();
    }

    /**
     * Method qui permet de recuperer la liste des personnages
     * @return type SELECT
     */
    public function getAllPersonnages()
    {
        $query = 'SELECT * FROM `personnages`;';
        //Ma Query execute ma requete SQL
        $perso = $this->db->query($query);
        //FetchAll Retourne le resultat de l'execution de ma erquete
        return $perso->fetchAll(PDO::FETCH_OBJ);
    }


    /**
     * Method qui permet d'afficher un personnage ainsi que ses caractéritisques
     * @return bool
     */
    public function getPersonnageById()
    {
        $query = 'SELECT * FROM `personnages` WHERE `id`=:id ;';
        $find = $this->db->prepare($query);
        $find->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($find->execute()) {
            return $find->fetch(PDO::FETCH_OBJ);
        }
    }


    /**
     * Method  Qui permet de modifier un personnage
     * @return bool
     */
    public function updatePersonnage()
    {
        $req = 'UPDATE `personnages` SET `surname`=:surname , `atk`=:atk , `life`=:life , `color`=:color WHERE `id`=:id;';
        $personnage = $this->db->prepare($req);
        $personnage->bindValue(':surname', $this->surname, PDO::PARAM_STR);
        $personnage->bindValue(':atk', $this->atk, PDO::PARAM_INT);
        $personnage->bindValue(':life', $this->life, PDO::PARAM_STR);
        $personnage->bindValue(':color', $this->color, PDO::PARAM_STR);
        $personnage->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $personnage->execute();
    }

    /**
     * Method qui permet d'effacer un personnage
     * @return type DELETE
     */
    public function deletePersonnage()
    {
        $query = 'DELETE FROM `personnages` WHERE `id`=:id;';
        $article = $this->db->prepare($query);
        $article->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $article->execute();
    }

    public function isAlive($name)
    {
        if ($this->life != 0) {
            echo "Le personnage " . $name->surname . " est vivant ";
        } else {
            echo "Le personnage " . $name->surname . " est mort ";
        }
    }

    public function superAttack($cible)
    {
        return $cible->life = 10;
    }

    public function attack($cible)
    {
        return $cible->life = 50;
    }

    public function deadAttack($cible)
    {
        $req = 'UPDATE `personnages` SET `life`=:life  WHERE `id`=:id;';
        $personnage = $this->db->prepare($req);
        $personnage->bindValue(':life', $this->life = 0, PDO::PARAM_STR);
        $personnage->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $personnage->execute();
    }

    public function regenere($cible)
    {
        $req = 'UPDATE `personnages` SET `life`=:life  WHERE `id`=:id;';
        $personnage = $this->db->prepare($req);
        $personnage->bindValue(':life', $this->life = 100, PDO::PARAM_STR);
        $personnage->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $personnage->execute();
    }
    public function courrir()
    {
        echo $this->surname . ' est en train de courrir ';
    }
    public function marcher()
    {
        echo $this->surname . ' est en train de marcher ';
    }
}

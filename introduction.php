<?php

abstract class Humain
{
    public $nom;
    public $prenom;
    protected $age;

    public function __construct($prenom, $nom, $age)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->setAge($age);
    }

    abstract public function travailler();

    public function setAge($age)
    {
        if (is_int($age) && $age >= 1 && $age <= 120){
            $this->age = $age;
        }else{
            throw new Exception("L'age d'un employé devrait un entier entre  1 et 120!");
        }
    }
    public function getAge()
    {
        return $this->age;
    }
}

class Employe extends Humain
{

    public function travailler()
    {
        return   " je suis un employe et je travaille";
    }
    public function presentation()
    {
        var_dump("Salut, je suis $this->prenom $this->nom et j'ai $this->age ans");
    }
}

class Patron extends Employe
{
    public $voiture;

    public function __construct($prenom, $nom, $age, $voiture)
    {
        parent::__construct($prenom, $nom, $age);

        $this->voiture = $voiture;
    }
    public function presentation()
    {
        var_dump("Bonjour, je suis $this->prenom $this->nom et j'ai $this->age ans et j'ai une voiture!");
    }
    public function rouler()
    {
        var_dump("Bonjour, je roule avec ma $this->voiture");
    }
    public function travailler()
    {
        return "Je suis le patron et je travaille aussi";
    }
}

$employe1 = new Employe("Thery","Rodrigue",37);
$employe2 = new Employe("Ensenat","Stephanie",36);
$employe1->presentation();

$patron = new Patron("John","Doe",54,"Mercedes");
$patron->presentation();
$patron->rouler();

class Etudiant extends Humain
{
    public function travailler()
    {
        return "Je suis un etudiant et je revise";
    }
}


faireTravailler($employe1);
faireTravailler($patron);


function faireTravailler(Humain $objet)
{
    var_dump("travail en cours : {$objet->travailler()}");
}

// $employe1->setAge(50);


<?php
// classe/Contact_lp.php
namespace classe;

class Contact_lp {
    private $id;
    private $nom;
    private $email;
    private $objet;
    private $message;
    private $date_envoi;

    public function __construct($id = null, $nom = "", $email = "", $objet = "", $message = "", $date_envoi = "") {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->objet = $objet;
        $this->message = $message;
        $this->date_envoi = $date_envoi;
    }

    public function __get($property) {
        if (property_exists($this, $property)) return $this->$property;
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) $this->$property = $value;
    }
}

?>
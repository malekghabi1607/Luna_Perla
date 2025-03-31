<?php
namespace classe;

class Contact // declaration  de la class et ces attribus
{
    private int $id_contact;
    private string $nom;
    private string $prenom;
    private string $email;
    private string $objet;
    private string $message;
    private ?\DateTime $date_envoi;

    public function __construct( // le constructeur initialise tous les attributs avec les valeurs passées lors de la création de l’objet.
       // Si date_envoi n’est pas donnée, elle sera null par défaut.
        
        int $id_contact,
        string $nom,
        string $prenom,
        string $email,
        string $objet,
        string $message,
        ?\DateTime $date_envoi = null
    ) {
        $this->id_contact = $id_contact;
        $this->nom        = $nom;
        $this->prenom     = $prenom;
        $this->email      = $email;
        $this->objet      = $objet;
        $this->message    = $message;
        $this->date_envoi = $date_envoi;
    }

    public function __get(string $propriete) // methode git permet d'autoriser l'accees a une propriete meme si elle est prive
    {
        if (property_exists($this, $propriete)) {
            return $this->$propriete;
        }
        return null;
    }

    public function __set(string $propriete, $valeur): void // permet d'autouriser la modification d'une prioriter prive depuis l'exterieur
    {
        if (property_exists($this, $propriete)) {
            $this->$propriete = $valeur;
        }
    }

    public function __toString(): string // permet d'afficher un objet ici c'est contact
    {
        return "[Contact] {$this->nom} {$this->prenom} - {$this->email}";
    }
}
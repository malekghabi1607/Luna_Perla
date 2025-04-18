<?php
// classe/ProduitUserPanier_lp.php
namespace classe;

class ProduitUserPanier_lp {
    private $produit_id;
    private $user_id;
    private $date_sold;
    private $sold;
    private $quantite;
    private $couleur;
    private $produit; 

    
    public function __construct($produit_id = null, $user_id = null, $date_sold = "", $sold = false, $quantite = 1, $couleur = "") {
        $this->produit_id = $produit_id;
        $this->user_id = $user_id;
        $this->date_sold = $date_sold;
        $this->sold = $sold;
        $this->quantite = $quantite;
        $this->couleur = $couleur;
    }

    public function __get($property) {
        if (property_exists($this, $property)) return $this->$property;
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) $this->$property = $value;
    }

    public function __toString() {
        return "Produit ID: $this->produit_id, User ID: $this->user_id, Quantity: $this->quantite, Color: $this->couleur, Sold: " . ($this->sold ? "Yes" : "No") . ", Date Sold: $this->date_sold";
    }
}
?>
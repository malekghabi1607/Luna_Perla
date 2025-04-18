<?php
namespace classe;

class Produit_lp {
    private $id;
    private $base_id;
    private $collection_id;
    private $specific_name;
    private $prix;
    private $stock;
    private $image;
    private $created_at;
    private $availability;
    private $description;

    public function __construct(
        $id = null,
        $base_id = null,
        $collection_id = null,
        $specific_name = "",
        $prix = 0.0,
        $stock = 0,
        $image = null,
        $created_at = "",
        $availability = true,
        $description = ""
    ) {
        $this->id = $id;
        $this->base_id = $base_id;
        $this->collection_id = $collection_id;
        $this->specific_name = $specific_name;
        $this->prix = $prix;
        $this->stock = $stock;
        $this->image = $image;
        $this->created_at = $created_at;
        $this->availability = $availability;
        $this->description = $description;
    }

    public function __get($property) {
        if (\property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (\property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

    public function __toString() {
        return "Produit ID: $this->id, Nom: $this->specific_name, Prix: $this->prix €, Stock: $this->stock, Disponible: " . ($this->availability ? "Oui" : "Non");
    }
}
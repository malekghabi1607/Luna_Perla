<?php
// classe/ImagesProduitLP.php
namespace classe;

class ImagesProduitLP {
    private $id;
    private $produit_id;
    private $image_path;

    public function __get($property) {
        if (property_exists($this, $property)) return $this->$property;
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) $this->$property = $value;
    }
}

?>
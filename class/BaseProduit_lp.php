<?php
// classe/BaseProduit_lp.php
namespace classe;

class BaseProduit_lp {
    private $id;
    private $name;
    private $multicolor;
    private $description;

    public function __construct($id = null, $name = "", $multicolor = "", $description = "") {
        $this->id = $id;
        $this->name = $name;
        $this->multicolor = $multicolor;
        $this->description = $description;
    }

    public function __get($property) {
        if (property_exists($this, $property)) return $this->$property;
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) $this->$property = $value;
    }

    public function __toString() {
        return "Base Product: $this->name, Multicolor: $this->multicolor, Description: $this->description";
    }
}

?>
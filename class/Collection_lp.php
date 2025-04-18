<?php
// classe/Collection_lp.php
namespace classe;

class Collection_lp {
    private $id;
    private $collection_name;
    private $description;
    private $created_at;

    public function __construct($id = null, $collection_name = "", $description = "", $created_at = "") {
        $this->id = $id;
        $this->collection_name = $collection_name;
        $this->description = $description;
        $this->created_at = $created_at;
    }

    public function __get($property) {
        if (property_exists($this, $property)) return $this->$property;
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) $this->$property = $value;
    }

    public function __toString() {
        return "Collection: $this->collection_name, Created At: $this->created_at";
    }
}

?>
<?php
// User_lp.php
namespace classe;

require_once 'Person_lp.php';

class User_lp extends Person_lp {
    private $phone;
    private $shipping_address;

    public function __construct($id = null, $username = "", $password_hash = "", $email = "", $phone = "", $shipping_address = "") {
        parent::__construct($id, $username, $password_hash, $email);
        $this->phone = $phone;
        $this->shipping_address = $shipping_address;
    }

    public function __get($property) {
        return property_exists($this, $property) ? $this->$property : parent::__get($property);
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        } else {
            parent::__set($property, $value);
        }
    }

    public function __toString() {
        return parent::__toString() . ", Phone: $this->phone, Address: $this->shipping_address";
    }
}

?>
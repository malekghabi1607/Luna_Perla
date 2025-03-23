<?php
namespace classe;

class Person_lp {
    protected $id;
    protected $username;
    protected $password_hash;
    protected $email;

    // Constructor
    public function __construct($id = null, $username = "", $password_hash = "", $email = "") {
        $this->id = $id;
        $this->username = $username;
        $this->password_hash = $password_hash;
        $this->email = $email;
    }

    // Magic Getter
    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    // Magic Setter
    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

    // Convert object to string
    public function __toString() {
        return "Person ID: $this->id, Username: $this->username, Email: $this->email";
    }
}
?>
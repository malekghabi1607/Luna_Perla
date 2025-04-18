<?php
// Person_lp.php
namespace classe;

class Person_lp {
    protected $id;
    protected $username;
    protected $password_hash;
    protected $email;
    protected $role;

    public function __construct($id = null, $username = "", $password_hash = "", $email = "", $role = "user") {
        $this->id = $id;
        $this->username = $username;
        $this->password_hash = $password_hash;
        $this->email = $email;
        $this->role = $role;
    }

    public function __get($property) {
        return property_exists($this, $property) ? $this->$property : null;
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

    public function __toString() {
        return "Person ID: $this->id, Username: $this->username, Email: $this->email, Role: $this->role";
    }
}
?>
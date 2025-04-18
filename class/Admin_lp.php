<?php

// Admin_lp.php
namespace classe;

require_once 'Person_lp.php';

class Admin_lp extends Person_lp {
    private $permissions;
    private $department;

    public function __construct($id = null, $username = "", $password_hash = "", $email = "", $permissions = "", $department = "") {
        parent::__construct($id, $username, $password_hash, $email, 'admin');
        $this->permissions = $permissions;
        $this->department = $department;
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
        return parent::__toString() . ", Permissions: $this->permissions, Department: $this->department";
    }
}

?>

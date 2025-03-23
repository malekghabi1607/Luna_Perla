<?php
namespace classe;

class Contact_lp {
    private $id;
    private $user_id;
    private $sujet;
    private $message;
    private $date_envoi;

    public function __construct($id = null, $user_id = null, $sujet = "", $message = "", $date_envoi = "") {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->sujet = $sujet;
        $this->message = $message;
        $this->date_envoi = $date_envoi;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

    public function __toString() {
        return "Contact ID: $this->id, User ID: $this->user_id, Subject: $this->sujet, Message: $this->message, Date Sent: $this->date_envoi";
    }
}
?>
<?php 
// classe/Message.php
namespace classe;

class Message {
    private $message_id;
    private $message;
    private $date;
    private $user_id;

    public function __construct($message = null, $user_id = null) {
        $this->message = $message;
        $this->user_id = $user_id;
        $this->date = date('Y-m-d H:i:s');
    }

    public function __get($property) {
        if (property_exists($this, $property)) return $this->$property;
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) $this->$property = $value;
    }
}

?>
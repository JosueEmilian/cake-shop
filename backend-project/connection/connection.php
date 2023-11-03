<?php 
class Connection extends Mysqli {
    function __construct(){
        parent::__construct('localhost', 'root', 'root', 'DB_CAKE_SHOP');
        $this->set_charset('utf8');
        if ($this->connect_error) {
            die('error: ' . $this->connect_error);
        }
    }
}

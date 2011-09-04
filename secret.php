<?php

class User {
  public $username;
  public $password;
  
  public function __construct($u, $p){
    $this->username = $u;
    $this->password = $p;
  }
}

?>
<?php

require_once('config.php');

class User {
  public $username;
  public $password;
  
  public function __construct($u, $p){
    $this->username = $u;
    $this->password = $p;
  }
}

class Song {
  public $url;
  public $artist;
  public $title;

  public function __construct($artist,$title,$url) {

    $this->artist = $artist;
    $this->title = $title;
    $this->url = $url;
  }

  public function by() {
    return "{$this->title} by {$this->artist}";
  }  

  public function toXml() {
    return "<song>\n<artist>{$this->artist}</artist>\n<title>{$this->title}</title>\n<url>{$this->url}</url>\n</song>";
  }

}
?>
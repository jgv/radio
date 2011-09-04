<?php

$credentials = new User($my_username, $my_password);

function pc_validate($user,$pass) {
  global $credentials;
  if (isset($credentials->username) && ($credentials->password == $pass)) {
    return true;
  } else {
    return false;
  }
}

if (! pc_validate($_SERVER['PHP_AUTH_USER'],$_SERVER['PHP_AUTH_PW'])) { 
  $realm = 'My Website for '.date('Y-m-d'); 
  header("WWW-Authenticate: Basic realm={$realm}"); 
  header('HTTP/1.0 401 Unauthorized'); 
  echo "You need to enter a valid username and password."; exit; }

?>
<?php

$my_username = 'test';
$my_password = 'test';

require_once('secret.php');
require_once('authenticate.php');

?>

<!doctype html>
<html>
  <head>
    <meta charset='UTF-8' />
  </head>
  <body>
    <form action="handle.php" method="post">
      <input name="song" />
      <input type="submit" value="Submit" />
  </form>
</bod>
</html>
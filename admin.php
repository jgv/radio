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
    <form action="handle.php" method="post" id="song-form">
<?php 
  if (file_exists('songs.xml')) {
    $xml = simplexml_load_file("songs.xml");
    foreach($xml->children() as $child) {
      echo "<input name='song[]' value='{$child}'>";
    }
  } else {
    echo '<input name="song" />';
  }
?>
      <input type="submit" value="Submit" />
    </form>
    <button id="add-song">      
    <script>
      window.onload = (function() {
        var trigger = document.getElementById('add-song');
        trigger.addEventListener('click',
          function() {
          var input = document.createElement('input');
          input.name = 'song[]';
          var form = document.getElementById('song-form');
          form.appendChild(input);
          }, false);
      })();
      
    </script>
  </body>
</html>
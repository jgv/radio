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

    foreach ($xml as $song) {
      echo $song->uri;
      echo "<input name='song[]' value='{$song->url}'>";
    }

    foreach($xml->children()->song as $song) {

    }
  } else {
    echo '<input name="song[]" />';
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
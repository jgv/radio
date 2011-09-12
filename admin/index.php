<?php

$handler = '../lib/handle.php';
$xmlPath = '../db/songs.xml';

?>

<!doctype html>
<html>
  <head>
    <meta charset='UTF-8' />
  </head>
  <body>
    <form action="<?php echo $handler ?>" method="post" id="song-form">
<?php 
  if (file_exists($xmlPath)) {
    $xml = simplexml_load_file($xmlPath);
    foreach ($xml as $song) {
      echo $song;
      echo $song->url;
      echo "<input name='song[]' value='{$song->url}'>\n";
    }
  } else {
    echo '<input name="song[]" />';
  }
?>
      <input type="submit" value="Submit" />
    </form>
    <button id="add-song">+</button>
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
<!doctype html>
<html>
  <head>
    <meta charset='utf-8' />
    <title>Radio</title>
  </head>
  <body>
    
    <h1>Radio</h1>

    <?php
    if (file_exists('songs.xml')) {
      echo "<audio controls preload='auto' autobuffer>";
      $xml = simplexml_load_file("songs.xml");
      foreach($xml as $song) {
        echo "<source src='{$song->url}' />";    
      }
      echo "</audio>";
    } else {
      echo 'no songs yet';
    }            
    ?>
  </body>
</html>
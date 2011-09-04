<!doctype html>
<html>
  <head>
    <meta charset='utf-8' />
    <title>Radio</title>
  </head>
  <body>
    
    <h1>Radio</h1>
    <audio controls preload='auto' autobuffer>

    <?php

      if (file_exists('songs.xml')) {
        $xml = simplexml_load_file("songs.xml");
        foreach($xml->children() as $child) {
          echo "<source src='{$child}' />";    
        }
      } else {
        echo 'no songs yet';
      }      
      
    ?>
    </audio>
  </body>
</html>
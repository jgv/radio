<?php

require_once('getid3/getid3.php');

$data = $_POST['song'];

$file_handle = fopen('songs.xml','w+');
$content = '<?xml version="1.0"?>
<songs>';

foreach ($data as $uri) {
  $filename = tempnam('/tmp','getid3');
  if (file_put_contents($filename, file_get_contents($uri, false, null, 0, 32768))) {
    $getID3 = new getID3;
    $song = $getID3->analyze($filename);
    $content .= "<song>\n<artist>".$song['tags']['id3v2']['artist'][0]."</artist>
<title>".$song['tags']['id3v2']['title'][0]."</title>
<url>".$uri."</url>\n</song>";
    unlink($filename);
  }
}

$content .="</songs>";
fwrite($file_handle,$content);
fclose($file_handle);


?>
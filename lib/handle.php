<?php

error_reporting (E_ALL ^ E_NOTICE);

require_once(dirname(__FILE__) . '/getid3/getid3.php');
require_once(dirname(__FILE__) . '/radio.php');

$data = $_POST['song'];

$file_handle = fopen('../db/songs.xml','w+');
$content = "<?xml version='1.0'?>\n<songs>";

foreach ($data as $url) {
  $filename = tempnam('/tmp','getid3');
  if (file_put_contents($filename, file_get_contents($url, false, null, 0, 32768))) {
    $getID3 = new getID3;
    $getID3->encoding = 'UTF-8';
    try {
      $song = $getID3->analyze($filename);
      $artist = $song['tags']['id3v2']['artist'][0];
      $title = $song['tags']['id3v2']['title'] ? $song['tags']['id3v2']['title'][0] : 'cant find a title';  
      $radio = new Song($artist,$title,$url);
      $content .= $radio->toXml();
      echo $content;
    } catch (Exception $e) {
      echo 'An error occured: ' .  $e->message;
    }
    unlink($filename);
  }
}

$content .="</songs>";
fwrite($file_handle,$content);
fclose($file_handle);


header("Location: http://{$_SERVER['SERVER_NAME']}");

?>
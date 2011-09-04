<?php

require_once('getid3/getid3.php');

$data = htmlspecialchars($_POST['song']);


$filename = tempnam('/tmp','getid3');
if (file_put_contents($filename, file_get_contents($data, false, null, 0, 32768))) {
  $getID3 = new getID3;
  $ThisFileInfo = $getID3->analyze($filename);
  unlink($filename);
}

$songs = array($ThisFileInfo['tags']['id3v2']);

$file_handle = fopen('songs.xml','w+');
$content = '<?xml version="1.0"?>
<songs>';
foreach ($songs as $song) {
  $content .= "\n<artist>".$song['artist'][0]."</artist>\n
<url>".$data."</url>\n"
    ;
}
$content .="</songs>";
fwrite($file_handle,$content);
fclose($file_handle);

header("Location: http://google.com");

?>
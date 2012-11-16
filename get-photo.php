<?php

require_once('gallery.inc.php');

header("Content-Type: text/plain; charset=UTF-8");

$id = intval(@$_GET['id']);
if ($id <= 0 || $id > count($gallery)) {
  echo "";
  exit;
}

$result = array(
  'id' => $id,
  'filename' => "gallery/" . $gallery[$id-1]['photo'],
  'caption' => $gallery[$id-1]['caption'],
  'first' => !!($id === 1),
  'last' => !!($id === count($gallery))
);

print json_encode($result);

?>

<?php

require_once('gallery.inc.php');

$id = intval(@$_GET['id']);
if ($id <= 0 || $id > count($gallery)) {
  $id = null;
} else {
  $filename = "../gallery/" . $gallery[$id-1]['photo'];
  $caption = $gallery[$id-1]['caption'];
}

?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>London photos</title>
    <link rel="stylesheet" href="../photos.css" type="text/css">
  </head>
  <body>
    <h1>London photos</h1>
<?php if ($id): ?>
    <p class="introduction">
      These are some photos I took last week in London. And, actually, this 
      introduction is just here to make the page longer so you can see what 
      happens when you scroll the page.
    </p>
    <div class="content">
      <nav class="photo-nav">
<?php if ($id === 1): ?>
        <a><div class="prev disabled">
<?php else: ?>
        <a href="<?php echo $id - 1 ?>"><div class="prev">
<?php endif; ?>
          &larr; Prev</div></a><?php
if ($id === count($gallery)): ?>
<a><div class="next disabled">
<?php else: ?>
<a href="<?php echo $id + 1 ?>"><div class="next">
<?php endif; ?>
          Next &rarr;</div></a>
      </nav>
      <figure>
        <img src="<?php echo $filename ?>" alt="<?php echo $caption ?>">
        <figcaption>
          <?php echo $caption . "\n" ?>
        </figcaption>
      </figure>
    </div>
<?php else: ?>
    <div class="error">
      Image not found.
    </div>
<?php endif; ?>
  </body>
</html>

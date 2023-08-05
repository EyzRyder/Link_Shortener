<?php
$link;
$formUrl = $_GET['url'];
$db = new PDO('sqlite:db.db', '', '', [
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);

$query = $db->prepare("insert into urls(hash,original_url,created_at) values(:hash, :original_url, :created_at)");

$prepare = $db->prepare("select rowid,* from urls where hash = :hash");
$prepare->execute(['hash' => $formUrl]);

foreach ($prepare as $key => $url) {
  $link = $url->original_url;
  header("Location: {$link}");
};

exit();

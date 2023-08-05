<?php
// functions
function generateCode()
{
  $text = '';
  $possible = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  for ($index = 0; $index <= 6; $index++) {
    $text = $text . substr($possible, floor(rand(0, strlen($possible) - 1)), 1);
  }
  return $text;
}

if (isset($_GET['url'])) {
  $formUrl = $_GET['url'];
  $hash = generateCode();
  $created_at = date("Y-m-d");

  $db = new PDO('sqlite:db.db', '', '', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
  ]);

  $query = $db->prepare("insert into urls(hash,original_url,created_at) values(:hash, :original_url, :created_at)");

  $data = $query->execute([
    'hash' => $hash,
    'original_url' => $formUrl,
    'created_at' => $created_at
  ]);
}
if (isset($_POST['url'])) {
  $formUrl = $_POST['url'];
  $hash = generateCode();
  $created_at = date("Y-m-d");

  $db = new PDO('sqlite:db.db', '', '', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
  ]);

  $query = $db->prepare("insert into urls(hash,original_url,created_at) values(:hash, :original_url, :created_at)");

  $data = $query->execute([
    'hash' => $hash,
    'original_url' => $formUrl,
    'created_at' => $created_at
  ]);

}
header("Location: index.php");
exit();

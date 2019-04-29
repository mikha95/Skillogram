<?php 
session_start();
print_r($_SERVER['DOCUMENT_ROOT']);
$id = $_SESSION['id'];
include ("db.php");
$login = $_SESSION['login'];
$result = $db->query("SELECT * FROM posts");
$posts = $result->fetchAll(PDO::FETCH_UNIQUE);
//print_r($posts);

foreach($posts as $post) {
	//foreach($array as $key => $value) {
	//echo $post['login'];
	//echo $post['description'];
	
	
}

$subscribes = $db->prepare("SELECT subscribe_id FROM subscribes WHERE user_id=:user_id");
$subscribes->execute([
  'user_id' => $_SESSION['id'],
]);
$q = $subscribes->fetchAll(PDO::FETCH_COLUMN);
//print_r($q);
$login = 'test';



?>

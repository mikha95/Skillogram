<?php //обработчик регистрации пользователя

$post = $_POST;

if (isset($post['exampleInputLogin'])) {
	$login = $post['exampleInputLogin'];
	if ($login =='') {unset($login);}
}

if (isset($post['exampleInputPassword'])) {
	$password = $post['exampleInputPassword'];
	if ($password =='') {unset($password);}
}

if (empty($login) or empty($password)) {
	exit ("Вы ввели не всю информацию!");
}

$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);

$login = trim($login);
$password = trim($password);

include ("../db.php");

$result = $db->prepare("SELECT id FROM users WHERE login=:login");
$result->execute([
	'login' => $login
]);
$myRow = $result->fetch(PDO::FETCH_ASSOC);
if(!empty($myRow)) {
	exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин");
}

$result2 = $db->prepare("INSERT INTO users (login, password) VALUES (:login, :password)");
$result2->execute([
	'login' => $login,
	'password' => $password
]);
if(!($result2=='FALSE')) {
	echo "Вы успешно зарегистрированы!";
	echo "<p><a href='../index.php'>Главная</a></p>";
}
else {
	echo "Ошибка! Вы не зарегистрированы";
}
?>

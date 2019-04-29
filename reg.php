<!DOCTYPE html PUBLIC>
<html>
	<head>
		<title>Регистрация</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">		<link rel="shortcut icon" href="images/favicon.ico">
		<link rel="shortcut icon" href="images/favicon.ico">
	</head>
	<body>
		<p><a href="index.php">Главная</a></p>
		<p><a href="auth.php">Вход</a></p>
		<p>Регистрация</p>
		<form action="handlers/save_user.php" method="post">
			<div class="form-group">
				<label for="exampleInputLogin">Логин</label>
				<input type="text" class="form-control" id="exampleInputLogin" name="exampleInputLogin" placeholder="Введите ваш логин">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Пароль</label>
				<input type="password" class="form-control" id="exampleInputPassword" name="exampleInputPassword" placeholder="Введите пароль">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Повторите пароль</label>
				<input type="password" class="form-control" id="exampleInputPassword1" name="exampleInputPassword1" placeholder="Введите пароль ещё раз">
			</div>
			
				<button type="submit" class="btn btn-primary">Зарегистрироваться</button>
		 </form>
	</body>
</html>

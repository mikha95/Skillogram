<!DOCTYPE html PUBLIC>
<html>
	<head>
		<title>Вход</title>
		<meta charset="utf-8">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">		
		<link rel="shortcut icon" href="images/favicon.ico">
	</head>
	<body class="">
		<p><a href="index.php">Главная</a></p>
		<p><a href="reg.php">Регистрация</a></p>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-md-4">
					<form action="handlers/testreg.php" method="post" class="px-auto">
						<h1 class="h3 mb-3 font-weight-normal"> Вход </h1>
						<div class="form-group">
							<label for="inputLogin" class="sr-only">Ваш логин</label>
							<input type="text" class="form-control" id="inputLogin" name="login" placeholder="Введите логин">
						</div>
						<div class="form-group">
							<label for="inputPassword" class="sr-only">Пароль</label>
							<input type="password" class="form-control" id="inputPassword" name="password" placeholder="Введите пароль">
						</div>
						<button type="submit" class="btn btn-primary">Войти</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>

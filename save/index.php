<?php
session_start();
include ("db.php");
if (isset($_SESSION['login'])) {
	$result = $db->query("SELECT * FROM posts ORDER BY date DESC");
	$posts = $result->fetchAll(PDO::FETCH_UNIQUE); 
}
?>
<!DOCTYPE html PUBLIC>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="shortcut icon" href="/project/images/favicon.ico">
		<title>Skillogram</title>
		<style>
			button.no_subscribe {
				display: none!important;
			}
		</style>
	</head>
	<body>
		<header>
			<div class="navbar navbar-dark bg-dark mb-3">
				<div class="container d-flex justify-content-between">
					<img src="/project/images/Header_logo2.jpg" class="img-fluid">
					<?php	if (empty($_SESSION['login'])) { ?>
						<p><a href='reg.php' class='btn btn-primary'>Регистрация</a></p>
						<p><a href='auth.php' class='btn btn-primary'>Вход</a></p>
						<?php } else { ?>
						<p><a href='feed.php' class='btn btn-primary'>Новости</a></p>
						<p><a href='mypage.php' class='btn btn-primary'>Моя страница</a></p>
						<p><a href='new_post.php' class='btn btn-primary'>Добавить пост</a></p>
						<p><a href='exit.php' class='btn btn-primary'>Выйти</a></p>
				</div>
			</div> 
		</header>
		<div class="container">
			<div name="post" class="row"> <?php
				foreach($posts as $post) { ?>			
					<div class="col-12 col-md-4">
						<div class="card mb-4">
							<img src="/project/users_images/<?php echo $post['image_name']; ?>" class="card-img-top" alt="image">
							<div class="card-body">
							<?php ($post['login'] == $_SESSION['login']) ? $ref = 'mypage.php' : $ref = 'user.php?login=' . $post['login']; ?>
								<p class="card-text font-weight-bold">
									<a href='<?php echo $ref;?>'><?php echo $post['login'];?></a>
								</p>			
								<p class="card-text"><?php echo $post['description']; ?></p>
							</div>
						</div>
					</div>
				<?php
				}
				?> 
				</div> <?php
			}
			?>
		</div>
		<script>
			function subscribe(a) {
				var xhr = new XMLHttpRequest();
				xhr.open("POST",'subscribe.php',true);
				xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				var body = 'author_id=' + a;
				xhr.send(body);
				xhr.onreadystatechange = function(){
					if (this.readyState == 4 && this.status == 200) {
						
						console.log('успешно');
						var author = '.author' + a;
						var f = document.querySelectorAll(author);
						f.forEach(function(element) {
							element.innerHTML = 'Вы подписаны';
							element.disabled = true;
						});
					} 
				}
				
				
			}

	</script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>

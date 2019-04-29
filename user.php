<?php
session_start();
$path = __FILE__;
$pathParts = pathinfo($path);
$filePath = $pathParts['filename'];
$get = $_GET;
include realpath(dirname(__FILE__).'/./controller/controller.php');
include('templates/head.php');
include('templates/body/header1.php');
if (empty($_SESSION['login'])) { ?>
    <p><a href='reg.php' class='btn btn-primary'>Регистрация</a></p>
    <p><a href='auth.php' class='btn btn-primary'>Вход</a></p>
<?php } else { ?>
	<p><a href='index.php' class='btn btn-primary'>Главная</a></p>
    <p><a href='feed.php' class='btn btn-primary'>Новости</a></p>
    <p><a href='mypage.php' class='btn btn-primary'>Моя страница</a></p>
    <p><a href='handlers/exit.php' class='btn btn-primary'>Выйти</a></p>
<?php
include('templates/body/header2.php');
include('templates/body/user_info.php');
include('templates/body/container.php');
}
?> 
<script src=/project/js/scripts.js></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php
include('templates/body/footer.php');?>
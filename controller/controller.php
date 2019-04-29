<?php 

spl_autoload_register(function($class) {
    include realpath(dirname(__FILE__).'/../model/' . $class . '.class.php');
});

include realpath(dirname(__FILE__).'/../model/db.php');
$model = new DataOperations($db);

if ($filePath == 'user') { // страница пользователя
    //получение id пользователя
    $id = $db->prepare("SELECT user_id FROM posts WHERE login=:login");
    $id->execute([
        'login' => $get['login'],
    ]);
    $user_id = $id->fetchColumn();
    //проверка подписки на этого пользователя
    $checkSub = $db->prepare("SELECT subscribe_id FROM subscribes WHERE (user_id=:user_id AND subscribe_id=:subscribe_id)");
    $checkSub->execute([
        'user_id' => $_SESSION['id'],
        'subscribe_id' => $user_id,
    ]);
    $sub = $checkSub->rowCount();
    //получение массива постов пользователя
    if (isset($_SESSION['login'])) {
        $result = $db->prepare("SELECT * FROM posts WHERE login=:login ORDER BY date DESC");
        $result->execute([
            'login' => $get['login'],
        ]);
        $posts = $result->fetchAll(PDO::FETCH_UNIQUE); 
    }
} 

if ($filePath == 'feed') { //новости
    if (isset($_SESSION['login'])) {
        $result = $db->prepare("SELECT * FROM posts p LEFT OUTER JOIN subscribes s ON p.user_id=s.subscribe_id WHERE (s.user_id = :user_id_1 OR p.user_id = :user_id_2) ORDER BY date DESC");
        $result->execute([
            'user_id_1' => $_SESSION['id'],
            'user_id_2' => $_SESSION['id'],
        ]);
        $posts = $result->fetchAll(PDO::FETCH_UNIQUE); ; 
    }
}

if ($filePath == 'mypage') { // личная страница пользователя
    if (isset($_SESSION['login'])) {
        $result = $db->prepare("SELECT * FROM posts WHERE login=:login ORDER BY date DESC");
        $result->execute([
            'login' => $_SESSION['login'],
            ]);
        $posts = $result->fetchAll(PDO::FETCH_UNIQUE); 
    }
}

if ($filePath == 'index') { // главная страница
    if (isset($_SESSION['login'])) {
        $result = $db->query("SELECT * FROM posts ORDER BY date DESC");
        $posts = $result->fetchAll(PDO::FETCH_UNIQUE); 
    }
}

if ($filePath == 'save_post') { // добавление записи
    $model->savePost();
}

if ($filePath == 'subscribe') { // подписка
    $model->subscribe($_POST['author_id']);
}

if ($filePath == 'unsubscribe') { // отписка
    $model->unsubscribe($_POST['author_id']);
}

if ($filePath == 'testreg') { // проверка регистрации
    $model->testReg();
}

if ($filePath == 'exit') { //выход из учётной записи
    unset($_SESSION['login']);
    unset($_SESSION['password']);
    unset($_SESSION['id']);
    echo "Вы успешно вышли!";
    echo "<p><a href='../index.php'>Главная</a></p>";
    echo "<p><a href='../auth.php'>Вход</a></p>";
    echo "<p><a href='../reg.php'>Регистрация</a></p>";
}
?>
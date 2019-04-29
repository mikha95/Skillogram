<?php 

class DataOperations {
    private $db;
    function __construct($db) {
        $this->db = $db;
    }

    //сохранение новых постов    
    public function savePost() {
        $timestamp = time();
        $uploadDir = '/home/misha_m/lessons/OOP/users_images/';
        $imageName = $_SESSION['id'] . "_" . basename($_FILES['image']['name']);
        $uploadFile = $uploadDir . $imageName;
        
        $newPost = $this->db->prepare("INSERT INTO posts (user_id, login, image_name, description, date) VALUES (:id, :login, :imageName, :description, :timestamp)");
        $newPost->execute([
            'id' => $_SESSION['id'],
            'login' => $_SESSION['login'],
            'imageName' => $imageName,
            'description' => $_POST['description'],
            'timestamp' => $timestamp,
        ]);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            echo "Файл корректен и был успешно загружен.\n";
        } else {
            echo "Возможная атака с помощью файловой загрузки!\n";
        }
        if (!($newPost=='FALSE')) {
            echo "Новый пост успешно добавлен!";
            echo "<p><a href='../index.php'>Главная</a></p>";
        } else {
            echo "Произошла ошибка";
        }
    }
    //сохранение пользователей
    public function saveUser() {
        $post = $_POST;
        $login;
        $password;
        
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

        $result = $this->db->prepare("SELECT id FROM users WHERE login=:login");
        $result->execute([
            'login' => $login
        ]);
        $myRow = $result->fetch(PDO::FETCH_ASSOC);
        if(!empty($myRow)) {
            exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин");
        }

        $result2 = $this->db->prepare("INSERT INTO users (login, password) VALUES (:login, :password)");
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
    }
    //подписки
    public function subscribe($a) {
        $subscribe = $this->db->prepare("INSERT INTO subscribes (user_id, subscribe_id) VALUES (:user_id, :subscribe_id)");
        $subscribe->execute([
            'user_id' => $_SESSION['id'],
            'subscribe_id' => $a,
        ]);
    }
    //проверка валидности
    public function testReg() {
        $post = $_POST;

        if (isset($post['login'])) {
            $login = $post['login'];
            if ($login == '') {unset($login);}
        }

        if (isset($post['password'])) {
            $password = $post['password'];
            if ($password == '') {unset($password);}
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

        $result = $this->db->prepare("SELECT * FROM users WHERE login=:login");
        $result->execute([
            'login' => $login
        ]);
        $myRow = $result->fetch(PDO::FETCH_ASSOC);
        if (empty($myRow['password'])) {
            exit("Извините, введённый вами логин или пароль неверный!");
        } else {
            if ($myRow['password'] == $password) {
                $_SESSION['login'] = $myRow['login'];
                $_SESSION['password'] = $myRow['password'];
                $_SESSION['id'] = $myRow['id'];
                echo "Вы успешно вошли на сайт!";
                echo "<p><a href='../index.php'>Главная</a></p>";
            } else {
                print_r($post);
                print_r($_SESSION);
                exit("Извините, введённый вами логин или пароль неверный!");
                
            }
        }
    }
    //отписки
    public function unsubscribe($a) {
        $unsubscribe = $this->db->prepare("DELETE FROM subscribes WHERE user_id=:user_id AND subscribe_id=:subscribe_id");
        $unsubscribe->execute([
            'user_id' => $_SESSION['id'],
            'subscribe_id' => $a,
        ]);
    }
}


?>
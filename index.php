<?php
    session_start();
    $login = isset($_COOKIE['identifier']) ? $_COOKIE['identifier'] : '';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
</head>
<body>
    <h1>Главная страница</h1>
    <?php
        if (!empty($login)){
            echo 
            "<p>Вы вошли как $login </p> 
            <p><a href='logout.php'>Выйти</a></p> 
            <p><a href='profile.php'>Страница профиля</a></p>";
        }else {
            echo '<p><a href="authorization.php">Войти</a></p> <p><a href="registration.php">Зарегистрироваться</a></p>'; 
        }
            
    ?>
</body>
</html>
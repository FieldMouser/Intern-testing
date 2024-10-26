<?php

    session_start();

    $serverName = "localhost";
    $username = "u2852904_Login_E";
    $password = "Adm1n_L0g1n_3254";
    $dbName = "u2852904_default";

// Подключение к базе данных
$conn = new mysqli($serverName, $username, $password, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $passwordConfirm = trim($_POST['passwordConfirm']);

    // Проверка на пустые поля
    if (empty($name) || empty($phone) || empty($email) || empty($password) || empty($passwordConfirm)) {
        $errorMessage = "Все поля обязательны для заполнения!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Неверный формат email!";
    } elseif ($password !== $passwordConfirm) {
        $errorMessage = "Пароли не совпадают!";
    } else {
        $sql = "INSERT INTO users_for_test (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            setcookie("name", $name, time() + 604800, "/");
            header("Location: index.php");
            exit(); // Обязательно завершай выполнение скрипта после переадресации
        } else {
            $errorMessage = "Ошибка при регистрации: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница регистрации</title>
</head>
<body>
    <h1>Регистрация</h1>
    <p>Для регистрации пользователя, введите необходимую информацию ниже</p>
    <form action="registration.php" method="post">
        <label for="username">Введите имя пользователя</label>
        <input type="text" id="username" name="name" required minlength="6" maxlength="30" pattern="[a-zA-Z0-9!@#$%^&*()_+-=]+">
        <br>
        <label for="phone">Введите номер телефона</label>
        <input type="tel" id="phone" name="phone" pattern="\+7\(\d{3}\)-\d{3}-\d{2}-\d{2}" placeholder="+7(123)-456-78-90" required maxlength="17" minlength="17">
        <small>Формат: +7(123)-456-78-90</small>
        <br>
        <label for="email">Введите адрес эл.почты</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Введите пароль</label>
        <input type="password" id="password" name="password" required minlength="8" maxlength="30" pattern="[a-zA-Z0-9!@#$%^&*()_+-=]+">
        <br>
        <label for="passwordConfirm">Повторите пароль</label>
        <input type="password" id="passwordConfirm" name="passwordConfirm" required minlength="8" maxlength="30" pattern="[a-zA-Z0-9!@#$%^&*()_+-=]+">
        <br>
        <?php if (!empty($errorMessage)): ?>
            <div style="color: red;"><?= htmlspecialchars($errorMessage) ?></div>
        <?php endif; ?>
        <button type="submit">Зарегистрироваться</button>
    </form>


</body>
</html>

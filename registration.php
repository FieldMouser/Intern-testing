<?php

    session_start();

    $serverName = "...";
    $username = "...";
    $password = "...";
    $dbName = "...";

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

    if (empty($name) || empty($phone) || empty($email) || empty($password) || empty($passwordConfirm)) {
        $errorMessage = "Все поля обязательны для заполнения!";
    } elseif ($password !== $passwordConfirm) {
        $errorMessage = "Пароли не совпадают!";
    } else {
        $sql = "SELECT * FROM users_for_test WHERE name = '$name' OR phone = '$phone' OR email = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $errorMessage = "Пользователь с таким именем, телефоном или email уже существует!";
        } else {
            $sql = "INSERT INTO users_for_test (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$password')";
            if ($conn->query($sql) === TRUE) {
                setcookie("identifier", $name, time() + 604800, "/");
                header("Location: index.php");
                exit();
            } else {
                $errorMessage = "Ошибка при регистрации: " . $conn->error;
            }
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

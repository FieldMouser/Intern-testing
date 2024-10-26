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
    $identifier = $_POST['identifier'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users_for_test WHERE (phone = '$identifier' OR email = '$identifier') AND password = '$password'";
        
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        setcookie("identifier", $user['name'], time() + 604800, "/");
        header("Location: index.php");
    } else {
        $errorMessage = "Неверные данные пользователя";
    }

    
}
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница авторизации</title>
</head>
<body>
<body>
    <div class="container">
        <h2>Авторизация</h2>
        <form action="authorization.php" method="post">
            <input type="text" name="identifier" placeholder="Телефон или email" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <?php if (!empty($errorMessage)): ?>
                <div style="color: red;"><?= htmlspecialchars($errorMessage) ?></div>
            <?php endif; ?>
            <button type="submit">Войти</button>
        </form>
    </div>
</body>
</body>
</html>
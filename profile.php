<?php

    if (!isset($_COOKIE['identifier'])) {
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница профиля</title>
</head>
<body>
    <form action="changeName.php" method="post">
        <label for="username">Измените имя пользователя</label>
        <input type="text" id="username" name="name" required minlength="6" maxlength="30" pattern="[a-zA-Z0-9!@#$%^&*()_+-=]+">
        <button type="submit">Сменить имя</button>
        <br>
    </form>
    
    <form action="changeNumber.php" method="post">
        <label for="phone">Измените номер телефона</label>
        <input type="tel" id="phone" name="phone" pattern="\+7\(\d{3}\)-\d{3}-\d{2}-\d{2}" placeholder="+7(123)-456-78-90" required maxlength="17" minlength="17">
        <small>Формат: +7(123)-456-78-90</small>
        <br>
        <button type="submit">Сменить номер телефона</button>
        <br>
    </form>

    <form action="changeEmail.php" method="post">
        <label for="email">Измените адрес эл.почты</label>
        <input type="email" id="email" name="email" required>
        <br>
        <button type="submit">Сменить почту</button>
    </form>

    <form action="changePassword.php" method="post">
    <label for="password">Измените пароль</label>
        <input type="password" id="password" name="password" required minlength="8" maxlength="30" pattern="[a-zA-Z0-9!@#$%^&*()_+-=]+">
        <br>
        <label for="passwordConfirm">Повторите пароль</label>
        <input type="password" id="passwordConfirm" name="passwordConfirm" required minlength="8" maxlength="30" pattern="[a-zA-Z0-9!@#$%^&*()_+-=]+">
        <br>
        <?php if (!empty($errorMessage)): ?>
            <div style="color: red;"><?= htmlspecialchars($errorMessage) ?></div>
        <?php endif; ?>
        <button type="submit">Сменить пароль</button>
    </form>
</body>
</html>
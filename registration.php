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
    <form action="registration" method="post">
        <label for="username">Введите имя пользователя</label>
        <input type="text" id="username" name="name" required> <br>
        <label for="phone">Введите номер телефона</label>
        <input type="tel" id="phone" name="phone" pattern="\+7\(\d{3}\)-\d{3}-\d{2}-\d{2}" placeholder="+7(123)-456-78-90" required maxlength="16" minlength="16">
        <small>Формат: +7(123)-456-78-90</small> <br>
        <label for="email">Введите адрес эл.почты</label>
        <input type="email" id="email" name="email" required> <br>
        <label for="password">Введите пароль</label>
        <input type="password" id="password" name="password" required> <br>
        <label for="passwordConfirm">Повторите пароль</label>
        <input type="password" id="passwordConfirm" name="passwordConfirm" required> <br>
        <button type="submit">Зарегистрироваться</button>
    </form>
</body>
</html>

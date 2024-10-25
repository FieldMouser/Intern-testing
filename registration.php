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
        Введите имя пользователя <input type="text" name="name"> <br>

        <label for="phone">Введите номер телефона </label>
        <input type="tel" id="phone" name="phone" pattern="\+7\(\d{3}\)-\d{3}-\d{2}-\d{2}" placeholder="+7(123)-456-78-90" required maxlength="16" minlength="16">
        <small>Формат: +8(123)-456-78-90</small> <br>

        Введите адрес эл.почты <input type="email" name="email"> <br>
        Введите пароль <input type="password" name="password" id=""> <br>
        Повторите пароль <input type="password" name="passwordConfirm"> <br>
        <button type="submit">Зарегистрироваться</button>
        
    </form>
</body>
</html>
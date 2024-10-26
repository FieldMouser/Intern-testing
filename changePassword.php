<?php

    session_start();

    $serverName = "...";
    $username = "...";
    $password = "...";
    $dbName = "....";

$conn = new mysqli($serverName, $username, $password, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = trim($_POST['password']);
    $passwordConfirm = trim($_POST['passwordConfirm']);
    $pos = $_COOKIE['identifier'];

    if ($password !== $passwordConfirm) {
        $errorMessage = "Пароли не совпадают!";
    } else {
        $sql = "UPDATE users_for_test SET password='$password' WHERE name = '$pos'";

        if ($conn->query($sql) === TRUE) {
            echo "Запись успешно обновлена";
        } else {
            echo "Ошибка обновления: " . $conn->error;
        }
    }

$conn->close();
}
?>

<br>
<a href="index.php"><button>Вернуться на главную страницу</button></a>
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
    $phone = trim($_POST['phone']);
    $pos = $_COOKIE['identifier'];

    $sql = "UPDATE users_for_test SET phone='$phone' WHERE name = '$pos'";

    if ($conn->query($sql) === TRUE) {
        echo "Запись успешно обновлена";
    } else {
        echo "Ошибка обновления: " . $conn->error;
    }

$conn->close();
}
?>

<br>
<a href="index.php"><button>Вернуться на главную страницу</button></a>
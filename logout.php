<?php
    setcookie("identifier", "", time() - 3600, "/");
    header("Location: index.php")
?>